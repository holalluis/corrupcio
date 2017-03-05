<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		#casos {
			margin-left:2em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Casos de Corrupció</h1>

<!--resum-->
<table id=casos>
	<?php
			$sql="SELECT * FROM casos ORDER BY nom";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$any=$row['any'];
				echo "
					<tr>
						<td><a href=cas.php?id=$id>$nom</a>
						<td>$any
				";
			}
	?>
</table>
