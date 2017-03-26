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
$taula = $mysql->escape_string($_POST['taula']);
$id    = $mysql->escape_string($_POST['id']);

//comprova input
if($taula=="" || $id==""){
	die('Taula o id en blanc');
}

//delete
$sql="DELETE FROM $taula WHERE id=$id";
$mysql->query($sql) or die(mysqli_error($mysql));

echo "
<ul>
  <li>$sql</li>
  <li>Executat correctament</li>
  <li><a href='$root/index.php'>Inici</a></li>
</ul>
";
?>
