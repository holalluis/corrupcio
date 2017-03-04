<?php
/*inserta un nou cas de corrupció*/
include'insert.php';

//processa POST
$nom=mysql_real_escape_string($_POST['nom']);
$espoli=$_POST['espoli'];
$any=$_POST['any'];

//comprova inputs
if($nom=="")die("nom en blanc");
if($espoli=="")$espoli=0;
if($any=="")$any=0;

//inserta
$sql="INSERT INTO casos (nom,espoli,any) VALUES ('$nom',$espoli,$any)";
insert($sql);
?>
