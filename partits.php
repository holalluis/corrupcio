<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		#partits {
			margin-left:2em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Partits</h1>

<!--resum-->
<table id=partits>
	<?php
			$sql="SELECT * FROM partits ORDER BY nom";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span style=color:#666>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$nom_llarg=$row['nom_llarg'];
				echo "
					<tr>
						<td><a href=partit.php?id=$id>$nom</a>
						<td>$nom_llarg
				";
			}
	?>
</table>
