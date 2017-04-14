<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#persones {
			margin-left:10px;
		}
		#persones td{
			padding:0 0.4em;
		}
		#navbar div[pagina=persones]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Persones</h1>

<!--resum-->
<table id=persones>
	<?php
			$sql="
				SELECT p.id, p.nom, rel.id AS cas_id, rel.nom AS cas
				FROM persones AS p
				LEFT JOIN 
					(
						SELECT casos.nom, casos.id, relacions_persona_cas.persona_id
						FROM casos, relacions_persona_cas 
						WHERE casos.id=relacions_persona_cas.cas_id
					) AS rel
				ON p.id=rel.persona_id
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

				//pot ser que la persona no estigui vinculada a cap cas
				if(empty($cas))$cas="<i style=color:#999>~cap vinculació</i>";

				echo "
					<tr>
						<td><a href=persona.php?id=$id>$nom</a>
						<td>$cas
				";
			}
	?>
</table>
