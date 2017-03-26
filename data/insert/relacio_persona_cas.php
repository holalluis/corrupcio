<?php

include'insert.php';

//processa POST
$persona_id=$_POST['persona_id'];
$cas_id=$_POST['cas_id'];

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM relacions_persona_cas WHERE persona_id=$persona_id AND cas_id=$cas_id"));
if($n){
	die("Error. La connexio persona_cas $persona_id<->$cas_id ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO relacions_persona_cas (persona_id,cas_id) VALUES ($persona_id,$cas_id)";
insert($sql);
?>
