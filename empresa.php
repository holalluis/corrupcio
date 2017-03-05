<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id empresa */
		$id=$_GET['id'] or die('empresa id no especificat');

		//objecte persona
		$sql="SELECT * FROM empreses WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$row=mysqli_fetch_assoc($res);
		$empresa=new stdclass;
		$empresa->nom=$row['nom'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Empreses &rsaquo; <?php echo $empresa->nom ?></h1>

<ul>
	<li>Casos relacionats
	<li>Persones relacionades
	<li>Partits relacionats
</ul>
