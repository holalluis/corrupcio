<?php
/*inserta una nova empresa*/
include'insert.php';

//processa POST
$nom=mysql_real_escape_string($_POST['nom']);

//comprova inputs
if($nom=="")die("nom en blanc");

//inserta
insertEmpresa($nom);
?>
