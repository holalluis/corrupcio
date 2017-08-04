<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=relacions]{color:black}

		#root button.toggleVisib {
			border:1px solid #ccc;
			background:linear-gradient(#fafafa,#eee);
			outline:none;
			width:25px;
		}
		#root button.toggleVisib:hover {
			background:linear-gradient(#eee,#fafafa);
		}
		#root button.toggleVisib:before {
			content:'v';
		}
		#root button.toggleVisib.plegat:before {
			content:'>';
		}
		#root h3 {
			margin-bottom:5px;
			margin-top:10px;
		}
		#root div.invisible {
			display:none;
		}
	</style>
	<script>
		//fes visible o invisible la taula id
		function toggleVisib(table_id,btn) {
			qs('#root table#'+table_id).parentNode.classList.toggle('invisible');
			btn.classList.toggle('plegat');
		}
	</script>
</head><body>
<?php include'navbar.php'?>

<!--root container-->
<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Connexions
</h1>

<div class=portrait_marge>
	<p class=descripcio>Connexions entre persones amb casos, partits i/o empreses</p>
</div>

<h3 class=portrait_marge>
	<button class=toggleVisib onclick=toggleVisib('relacions_persona_cas',this)></button>
	Persona &rarr; Cas
</h3>

<div>
<table id=relacions_persona_cas>
	<?php
			$sql="
				SELECT 
					persones.nom AS persona, 
					persones.id AS persona_id, 
					casos.nom AS cas,
					casos.id AS cas_id, 
					rel.descripcio
				FROM relacions_persona_cas AS rel, persones , casos
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.cas_id = casos.id
				ORDER BY cas, persona
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$cas=$row['cas'];
				$cas_id=$row['cas_id'];
				$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
				echo "<tr> 
					<td><a href=persona.php?id=$persona_id>$persona</a> 
					<td><a href=cas.php?id=$cas_id>$cas</a>
					<td><span class='descripcio' onclick=this.classList.toggle('nowrap')>$descripcio";
			}
	?>
</table>
</div>

<h3 class=portrait_marge>
	<button class=toggleVisib onclick=toggleVisib('relacions_persona_partit',this)></button>
	Persona &rarr; Partit 
</h3>
<div>
<table id=relacions_persona_partit>
	<?php
			$sql="
				SELECT 
					persones.id AS persona_id, 
					persones.nom AS persona, 
					partits.id AS partit_id, 
					partits.nom AS partit,
					rel.descripcio
				FROM relacions_persona_partit AS rel, persones , partits
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.partit_id = partits.id
				ORDER BY partit, persona
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$partit=$row['partit'];
				$partit_id=$row['partit_id'];
				$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
				echo "<tr>
					<td><a href=persona.php?id=$persona_id>$persona</a>
					<td><a href=partit.php?id=$partit_id>$partit</a>
					<td><span class=descripcio>$descripcio";
			}
	?>
</table>
</div>

<h3 class=portrait_marge>
	<button class=toggleVisib onclick=toggleVisib('relacions_persona_empresa',this)></button>
	Persona &rarr; Empresa
</h3>
<div>
<table id=relacions_persona_empresa>
	<?php
			$sql="
				SELECT
					persones.id AS persona_id, persones.nom AS persona, 
					empreses.id AS empresa_id, empreses.nom AS empresa,
					rel.descripcio
				FROM relacions_persona_empresa AS rel, persones , empreses
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.empresa_id = empreses.id
				ORDER BY empresa, persona
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$empresa=$row['empresa'];
				$empresa_id=$row['empresa_id'];
				$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
				echo "<tr>
					<td><a href=persona.php?id=$persona_id>$persona</a>
					<td><a href=empresa.php?id=$empresa_id>$empresa</a>
					<td><span class=descripcio>$descripcio
				";
			}
	?>
</table>
</div>

</div root>
