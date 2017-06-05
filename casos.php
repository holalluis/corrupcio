<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=casos]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Casos de corrupció
</h1>

<div> <p class=descripcio>Casos de corrupció ordenats per nombre de persones implicades</p> </div>

<!--resum-->
<table id=casos>
	<?php
			$sql="
				SELECT c.id, c.nom, c.any, COUNT(rel.id) AS implicats 
				FROM casos AS c 
				LEFT JOIN relacions_persona_cas AS rel
				ON c.id=rel.cas_id
				GROUP BY nom
				ORDER BY implicats DESC,nom
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
				$any=$row['any'];
				$implicats=$row['implicats'];
				echo "
					<tr>
						<td><a href=cas.php?id=$id>$nom</a>
						<td>$any
						<td class=numero>$implicats implicats
				";
			}
	?>
</table>

</div id=root>
