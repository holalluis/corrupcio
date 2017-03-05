<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		#empreses {
			margin-left:2em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Empreses</h1>

<!--resum-->
<table id=empreses>
	<?php
			$sql="SELECT * FROM empreses ORDER BY nom";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				echo "
					<tr>
						<td><a href=empresa.php?id=$id>$nom</a>
				";
			}
	?>
</table>
