<?php
include'insert.php';

//processa POST
$persona_id=$_POST['persona_id'];
$partit_id=$_POST['partit_id'];

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM relacions_persona_partit WHERE persona_id=$persona_id AND cas_id=$partit_id"));
if($n){
	die("Error. La connexio persona_partit $persona_id<->$partit_id ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO relacions_persona_partit (persona_id,partit_id) VALUES ($persona_id,$partit_id)";
insert($sql);
?>
