<?php
/*
	CRUD : create, read, UPDATE, delete
	wrapper
*/

//mysql connect
$root=realpath($_SERVER["DOCUMENT_ROOT"]);
$root.="/corrupcio";
include"$root/mysql.php";

//comprova permís
include"$root/edit/edit_mode.php";
if(!$edit_mode){
	die("Error: edit mode OFF");
}

//input
$taula    = $mysql->escape_string($_POST['taula']);
$id       = $mysql->escape_string($_POST['id']);
$camp     = $mysql->escape_string($_POST['camp']);
$nouValor = $mysql->escape_string($_POST['nouValor']);

/* 
	implementar caracters maxims
	if(gettype($nouValor)=="string")
	{
		if(strlen($nouValor)>1000)
		{
			die("Maxim 1000 caràcters");
		}
	}
*/

//update
$sql="UPDATE $taula SET $camp='$nouValor' WHERE id=$id";
$mysql->query($sql) or die(mysqli_error($mysql));

echo "
	<ul>
		<li>$sql</li>
		<li>Executat correctament</li>
		<li><a href='$root/index.php'>Inici</a></li>
	</ul>
";
?>
