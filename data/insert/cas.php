<?php

/*inserta un nou cas de corrupció*/
include'insert.php';

//processa POST
$nom=$mysql->escape_string($_POST['nom']);
$espoli=$_POST['espoli'];
$any=$_POST['any'];

//comprova inputs
if($nom=="")die("nom en blanc");
if($espoli=="")$espoli=0;
if($any=="")$any=0;

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM casos WHERE nom='$nom'"));
if($n){
  die("Error. El cas '$nom' ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO casos (nom,espoli,any) VALUES ('$nom',$espoli,$any)";
insert($sql);

?>
