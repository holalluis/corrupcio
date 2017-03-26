<?php
/*inserta una nova empresa*/
include'insert.php';

//processa POST
$nom=$mysql->escape_string($_POST['nom']);

//comprova inputs
if(empty($nom))die("nom en blanc");

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM empreses WHERE nom='$nom'"));
if($n){
	die("Error. L'empresa '$nom' ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO empreses (nom) VALUES ('$nom')";
insert($sql);
?>
