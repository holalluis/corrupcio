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
				SELECT c.id, c.nom, c.any, c.implicats, COUNT(rel.id) AS registrats 
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
			while($row=mysqli_fetch_assoc($res)) {
				$id=$row['id'];
				$nom=$row['nom'];
				$any=$row['any'];
				$registrats=$row['registrats'];
				$implicats=$row['implicats'];
				$percentatge = $implicats==0 ? 0 : 100*$registrats/$implicats;
				echo "
					<tr>
						<td><a href=cas.php?id=$id>$nom</a>
						<td class=numero>$any
						<td class=numero>$registrats 
						de $implicats persones
						<td><progress max=100 value=$percentatge></progress>
						<td align=right>".number_format($percentatge,1,",",".")." % 
				";
			}
	?>
</table>

</div id=root>
