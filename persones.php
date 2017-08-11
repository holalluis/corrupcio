<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=persones]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Persones
</h1>

<div class=portrait_marge>
	<p class=descripcio>Persones relacionades amb casos de corrupció</p>
</div>

<?php
	if($edit_mode)
	{
		?>
		<p class=descripcio style=background:yellow;padding:1em>Nota edit mode: les persones sense cas vinculat estan marcades amb groc</p>
		<?php
	}
?>

<!--resum-->
<table id=persones>
	<?php
			$sql="
				SELECT 
					p.id, p.nom, 
					rel.id  AS cas_id,     rel.nom  AS cas, 
					rel2.id AS partit_id,  rel2.nom AS partit, 
					rel3.id AS empresa_id, rel3.nom AS empresa
				FROM persones AS p
				LEFT JOIN 
					(
						SELECT casos.nom, casos.id, relacions_persona_cas.persona_id
						FROM casos, relacions_persona_cas 
						WHERE casos.id=relacions_persona_cas.cas_id
					) AS rel
				ON p.id=rel.persona_id
				LEFT JOIN 
					(
						SELECT partits.nom, partits.id, relacions_persona_partit.persona_id
						FROM partits, relacions_persona_partit 
						WHERE partits.id=relacions_persona_partit.partit_id
					) AS rel2
				ON p.id=rel2.persona_id
				LEFT JOIN 
					(
						SELECT empreses.nom, empreses.id, relacions_persona_empresa.persona_id
						FROM empreses, relacions_persona_empresa 
						WHERE empreses.id=relacions_persona_empresa.empresa_id
					) AS rel3
				ON p.id=rel3.persona_id
				GROUP BY nom
				ORDER BY nom,cas
				";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span class=blanc>no hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$cas=$row['cas'];
				$cas_id=$row['cas_id'];
				$partit=$row['partit'];
				$partit_id=$row['partit_id'];
				$empresa=$row['empresa'];
				$empresa_id=$row['empresa_id'];

				//ajunta les relacions en un sol string
				$relacions=[];
				if($cas!=""){
					$relacions[]="<a href=cas.php?id=$cas_id>$cas</a>";
				}
				if($partit!=""){
					$relacions[]="<a href=partit.php?id=$partit_id>$partit</a>";
				}
				if($empresa!=""){
					$relacions[]="<a href=empresa.php?id=$empresa_id>$empresa</a>";
				}

				#marca visualment les persones sense cas associat
				$style= ($cas=="" and $edit_mode)?"style=background:yellow":"";

				echo "
					<tr $style>
						<td><a href=persona.php?id=$id>$nom</a>
						<td style=font-size:11px>".join(', ',$relacions)."
				";
			}
	?>
</table>

</div id=root>
