<?php
/*inserta un nou partit*/
include'insert.php';

//processa POST
$nom=mysql_real_escape_string($_POST['nom']);
$nom_llarg=mysql_real_escape_string($_POST['nom_llarg']);

//comprova inputs
if($nom=="")die("nom en blanc");

//inserta
$sql="INSERT INTO partits (nom,nom_llarg) VALUES ('$nom','$nom_llarg')";
insert($sql);
?>
