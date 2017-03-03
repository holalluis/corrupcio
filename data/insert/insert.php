<?php
	/*
		CRUD - create, read, update, delete
		wrappers
	*/
	include'../../mysql.php';

	//inserta ordre general
	function insert($sql){
		global $mysql;
		mysqli_query($mysql,$sql) or die(mysql_error());
		echo "
			<div style=text-align:center>
				<b>$sql</b>
				<br>Executat correctament
				<br><a href='../../index.php'>Inici</a>
				<br><a href='../../insert.php'>Seguir insertant</a>
			</div>
		";
	}

	//inserta un cas
	function insertCas($nom,$espoli,$any) {
		$sql="INSERT INTO casos (nom,espoli,any) VALUES ('$nom',$espoli,$any)";
		insert($sql);
	}

	//inserta una persona
	function insertPersona($nom,$naixement)
	{
		$sql="INSERT INTO persones (nom,naixement) VALUES ('$nom','$naixement')";
		insert($sql);
	}

	//inserta un partit
	function insertPartit($nom,$nom_llarg)
	{
		$sql="INSERT INTO partits (nom,nom_llarg) VALUES ('$nom','$nom_llarg')";
		insert($sql);
	}

	//inserta una empresa
	function insertEmpresa($nom)
	{
		$sql="INSERT INTO empreses (nom) VALUES ('$nom')";
		insert($sql);
	}
?>
