<?php
	/*
		CRUD : CREATE, read, update, delete
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

	//inserta ordre general
	function insert($sql){
		global $mysql;
		mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		echo "
			<div style=text-align:center>
				<b>$sql</b>
				<br>Executat correctament
				<br><a href='$root/index.php'>Inici</a>
				<br><a href='$root/insert.php'>Seguir insertant</a>
			</div>
		";
	}

	header("location: ".$_SERVER['HTTP_REFERER']);
?>
