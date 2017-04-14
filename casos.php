<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#casos {
			margin-left:10px;
		}
		#casos td{
			padding:0 0.4em;
		}
		#navbar div[pagina=casos]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Casos de corrupció
</h1>

<!--resum-->
<table id=casos>
	<?php
			$sql="
				SELECT c.id, c.nom, c.any, COUNT(rel.id) AS implicats 
				FROM casos AS c 
				LEFT JOIN relacions_persona_cas AS rel
				ON c.id=rel.cas_id
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
				$any=$row['any'];
				$implicats=$row['implicats'];
				echo "
					<tr>
						<td><a href=cas.php?id=$id>$nom</a>
						<td>$any
						<td>$implicats implicats
				";
			}
	?>
</table>
