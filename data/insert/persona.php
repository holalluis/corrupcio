<?php
/*inserta una nova persona*/
include'insert.php';

//processa POST
$nom=mysql_real_escape_string($_POST['nom']);
$naixement=mysql_real_escape_string($_POST['naixement']);

//comprova inputs
if($nom=="")die("nom en blanc");
if($naixement=="")$naixement="0000-00-00";

//inserta
$sql="INSERT INTO persones (nom,naixement) VALUES ('$nom','$naixement')";
insert($sql);
?>
