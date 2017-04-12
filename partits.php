<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		#partits {
			margin-left:10px;
		}
		#partits td{
			padding:0 0.2em;
		}
		#navbar div[pagina=partits]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Partits</h1>

<!--resum-->
<table id=partits>
	<?php
			$sql="SELECT * FROM partits ORDER BY nom";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
