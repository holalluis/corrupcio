<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		#casos {
			margin-left:2em;
		}
		#casos td{
			padding:0 0.2em;
		}
		#navbar div[pagina=casos]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Casos de corrupció</h1>

<!--resum-->
<table id=casos>
	<?php
			$sql="SELECT * FROM casos ORDER BY any DESC";
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
				echo "
					<tr>
						<td><a href=cas.php?id=$id>$nom</a>
						<td>$any
				";
			}
	?>
</table>
