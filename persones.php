<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		#persones {
			margin-left:10px;
		}
		#persones td{
			padding:0 0.2em;
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
			$sql="SELECT * FROM persones ORDER BY nom";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span style=color:#666>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				echo "
					<tr>
						<td><a href=persona.php?id=$id>$nom</a>
				";
			}
	?>
</table>
