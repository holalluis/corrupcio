<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id del partit*/
		$id=$_GET['id'] or die('partit id no especificat');

		//objecte persona
		$sql="SELECT * FROM partits WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$row=mysqli_fetch_assoc($res);
		$partit=new stdclass;
		$partit->nom=$row['nom'];
		$partit->nom_llarg=$row['nom_llarg'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Partits &rsaquo; <?php echo $partit->nom ?></h1>

<ul>
	<li>Nom llarg: <?php echo $partit->nom_llarg ?>
		<button onclick="update('partits','<?php echo $id ?>','nom_llarg')">modifica</button>

	<li>Casos relacionats
	<li>Persones relacionades
	<li>Empreses relacionades
</ul>
