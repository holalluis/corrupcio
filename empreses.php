<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=empreses]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Empreses
</h1>

<div class=portrait_marge>
	<p class=descripcio>Empreses/institucions afectades per casos de corrupció</p>
</div>

<!--resum-->
<table id=empreses>
	<style>
		#empreses td:nth-child(n+2){
			font-size:11px;
		}
	</style>
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
				echo "<tr><td><span class=blanc>no hi ha resultats</span>";
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

</div>
