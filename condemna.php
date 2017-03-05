<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id empresa */
		$id=$_GET['id'] or die('condemna id no especificat');

		//objecte persona
		$sql="SELECT * FROM condemnes WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$row=mysqli_fetch_assoc($res);
		$condemna=new stdclass;
		$condemna->id=$row['id'];
		$condemna->relacio_persona_cas_id=$row['relacio_persona_cas_id'];
		$condemna->anys_de_preso=$row['anys_de_preso'];
		$condemna->delictes=$row['delictes'];
		$condemna->any=$row['any'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>
<h1>Condemnes &rsaquo; id <?php echo $condemna->id ?></h1>

<ul>
	#TODO
	<li>persona <-> cas
	<li>anys de preso
	<li>delictes
	<li>Inici: any
</ul>
