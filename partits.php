<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=partits]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Partits
</h1>

<div class=portrait_marge>
	<p class=descripcio>Partits polítics afectats per casos de corrupció</p>
</div>

<!--resum-->
<table id=partits>
	<style>
		#partits td:nth-child(n+2){
			font-size:11px;
		}
	</style>
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
			if(mysqli_num_rows($res)==0) {
				echo "<tr><td><span class=blanc>no hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res)) {
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

</div id=root>
