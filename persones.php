<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		/*treu els marges a portrait*/
		@media only screen and (min-width:560px) { 
			#persones {
				margin-left:10px;
			}
		}
		#persones td{
			padding:0 0.4em;
		}
		#navbar div[pagina=persones]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Persones
</h1>

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
				ORDER BY nom
				";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span style=color:#666>~No hi ha resultats</span>";
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

				echo "
					<tr>
						<td><a href=persona.php?id=$id>$nom</a>
						<td><a href=cas.php?id=$cas_id>$cas</a>
						<td><a href=partit.php?id=$partit_id>$partit</a>
						<td><a href=empresa.php?id=$empresa_id>$empresa</a>
				";
			}
	?>
</table>
