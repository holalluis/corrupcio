<?php
/*inserta una nova persona*/
include'insert.php';

//processa POST
$nom       = $mysql->escape_string($_POST['nom']);
$naixement = $mysql->escape_string($_POST['naixement']);

//comprova inputs
if(empty($nom))die("nom en blanc");
if(empty($naixement))$naixement="0000-00-00";

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM persones WHERE nom='$nom'"));
if($n){
	die("Error. La persona '$nom' ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO persones (nom,naixement) VALUES ('$nom','$naixement')";
insert($sql);
?>
