<?php
/*
	CRUD : CREATE, read, update, delete
	wrappers
*/

//connecta
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
	$mysql->query($sql) or die(mysqli_error($mysql));
	echo "
		<ul>
			<li>$sql</li>
			<li>Executat correctament</li>
			<li><a href='$root/index.php'>Inici</a></li>
			<li><a href='$root/insert.php'>Seguir insertant</a></li>
		</ul>
	";
	header("location: ".$_SERVER['HTTP_REFERER']);
}

?>
