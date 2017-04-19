<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#empreses {
			margin-left:10px;
		}
		#empreses td {
			padding:0 0.4em;
		}
		#navbar div[pagina=empreses]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Empreses
</h1>

<!--resum-->
<table id=empreses>
	<?php
			$sql="
				SELECT e.id, e.nom, COUNT(rel.id) AS persones
				FROM empreses AS e
				LEFT JOIN relacions_persona_empresa AS rel
				ON e.id=rel.empresa_id
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
				$persones=$row['persones'];
				echo "
					<tr>
						<td><a href=empresa.php?id=$id>$nom</a>
						<td>$persones persones
				";
			}
	?>
</table>
