<?php
	/*
		CRUD : create, read, UPDATE, delete
		wrapper
	*/
	$root=realpath($_SERVER["DOCUMENT_ROOT"]);
	$root.="/corrupcio";
	include"$root/mysql.php";

	//input
	$taula    = $_POST['taula'];
	$id       = $_POST['id'];
	$camp     = $_POST['camp'];
	$nouValor = mysql_real_escape_string($_POST['nouValor']);
	
	//update
	$sql="UPDATE $taula SET $camp='$nouValor' WHERE id=$id";
	mysqli_query($mysql,$sql) or die(mysqli_error($mysql));

	echo "
		<div style=text-align:center>
			<b>$sql</b>
			<br>Executat correctament
			<br><a href='$root/index.php'>Inici</a>
		</div>
	";
?>
