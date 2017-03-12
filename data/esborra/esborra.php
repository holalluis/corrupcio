<?php
	/*
		CRUD - create, read, update, delete
		wrappers
	*/
	$root=realpath($_SERVER["DOCUMENT_ROOT"]);
	$root.="/corrupcio";
	include"$root/mysql.php";

	//comprova permís
	include"$root/edit/edit_mode.php";
	if(!$edit_mode){
		die("Error: edit mode OFF");
	}

	//input
	$taula = $_POST['taula'];
	$id    = $_POST['id'];

	//comprova input
	if($taula=="" || $id=="") die('Taula o id en blanc');
	
	//delete
	$sql="DELETE FROM $taula WHERE id=$id";
	mysqli_query($mysql,$sql) or die(mysqli_error($mysql));

	echo "
		<div style=text-align:center>
			<b>$sql</b>
			<br>Executat correctament
			<br><a href='$root/index.php'>Inici</a>
		</div>
	";
?>
