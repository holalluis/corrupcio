<?php
	/*
		CRUD - create, read, update, delete
		wrappers
	*/
	include'../../mysql.php';

	//inserta ordre general
	function insert($sql){
		global $mysql;
		mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		echo "
			<div style=text-align:center>
				<b>$sql</b>
				<br>Executat correctament
				<br><a href='../../index.php'>Inici</a>
				<br><a href='../../insert.php'>Seguir insertant</a>
			</div>
		";
	}

	header("location: ".$_SERVER['HTTP_REFERER']);
?>
