<?php
	/*
		CRUD - create, read, update, delete
		wrappers
	*/
	include'../../mysql.php';

	//input
	$taula    = $_POST['taula'];
	$id       = $_POST['id'];
	$camp     = $_POST['camp'];
	$nouValor = $_POST['nouValor'];
	
	//update
	$sql="UPDATE $taula SET $camp='$nouValor' WHERE id=$id";
	mysqli_query($mysql,$sql) or die(mysqli_error($mysql));

	echo "
		<div style=text-align:center>
			<b>$sql</b>
			<br>Executat correctament
			<br><a href='../../index.php'>Inici</a>
		</div>
	";
?>
