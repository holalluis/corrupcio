<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#partits {
			margin-left:10px;
		}
		#navbar div[pagina=partits]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Partits
</h1>

<!--resum-->
<table id=partits>
	<?php
			$sql="
				SELECT p.id, p.nom, p.nom_llarg, COUNT(rel.id) AS persones
				FROM partits AS p
				LEFT JOIN relacions_persona_partit AS rel
				ON p.id=rel.partit_id
				GROUP BY nom
				ORDER BY nom
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$nom_llarg=$row['nom_llarg'];
				$persones=$row['persones'];
				echo "
					<tr>
						<td><a href=partit.php?id=$id>$nom</a>
						<td>$nom_llarg
						<td class=numero>$persones persones
				";
			}
	?>
</table>
