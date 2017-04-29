<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=empreses]{color:black}
		/*treu els marges a portrait*/
		@media only screen and (min-width:560px) { 
			#root {
				margin-left:10px;
			}
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Empreses
</h1>

<p class=descripcio>Llista d'empreses implicades en casos de corrupció</p>

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
						<td class=numero>$persones persones
				";
			}
	?>
</table>

</div id=root>
