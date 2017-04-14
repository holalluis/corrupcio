<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		table[id^="relacions"] td {
			padding:0 0.2em;
		}
		#navbar div[pagina=relacions]{color:black}

		/*treu els marges a portrait*/
		@media only screen and (min-width:560px) { 
			table[id^="relacions"]{
				margin-top:0.5em;
				margin-bottom:2em;
				margin-left:10px;
			}
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Connexions
</h1>

<div id=root>

<h3>Persona &rarr; Cas</h3>

<table id=relacions_persona_cas>
	<?php
			$sql="
				SELECT *, persones.id AS persona_id, persones.nom AS persona, casos.id AS cas_id, casos.nom AS cas 
				FROM relacions_persona_cas AS rel, persones , casos
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.cas_id = casos.id
				ORDER BY persones.nom
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span style=color:#666>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$cas=$row['cas'];
				$cas_id=$row['cas_id'];

				$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
				echo "<tr> 
					<td><a href=persona.php?id=$persona_id>$persona</a> 
					<td>&rarr; 
					<td><a href=cas.php?id=$cas_id>$cas</a>
					<td><span class=descripcio>$descripcio";
			}
	?>
</table>

<h3>Persona &rarr; Partit</h3>
<table id=relacions_persona_partit>
	<?php
			$sql="
				SELECT *, persones.id AS persona_id, persones.nom AS persona, partits.id AS partit_id, partits.nom AS partit 
				FROM relacions_persona_partit AS rel, persones , partits
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.partit_id = partits.id
				ORDER BY persones.nom
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span style=color:#666>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$partit=$row['partit'];
				$partit_id=$row['partit_id'];
				$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
				echo "<tr>
					<td><a href=persona.php?id=$persona_id>$persona</a>
					<td>&rarr;
					<td><a href=partit.php?id=$partit_id>$partit</a>
					<td><span class=descripcio>$descripcio";
			}
	?>
</table>

<h3>Persona &rarr; Empresa</h3>
<table id=relacions_persona_empresa>
	<?php
			$sql="
				SELECT *, 
					persones.id AS persona_id, persones.nom AS persona, 
					empreses.id AS empresa_id, empreses.nom AS empresa 
				FROM relacions_persona_empresa AS rel, persones , empreses
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.empresa_id = empreses.id
				ORDER BY persones.nom
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span style=color:#666>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$empresa=$row['empresa'];
				$empresa_id=$row['empresa_id'];
				$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
				echo "<tr>
					<td><a href=persona.php?id=$persona_id>$persona</a>
					<td>&rarr;
					<td><a href=empresa.php?id=$empresa_id>$empresa</a>
					<td><span class=descripcio>$descripcio";
			}
	?>
</table>

</div>
