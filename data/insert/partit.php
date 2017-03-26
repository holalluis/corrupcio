<?php
/*inserta un nou partit*/
include'insert.php';

//processa POST
$nom       = $mysql->escape_string($_POST['nom']);
$nom_llarg = $mysql->escape_string($_POST['nom_llarg']);

//comprova inputs
if($nom=="")die("nom en blanc");

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM partits WHERE nom='$nom'"));
if($n){
	die("Error. El partit '$nom' ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO partits (nom,nom_llarg) VALUES ('$nom','$nom_llarg')";
insert($sql);
?>
