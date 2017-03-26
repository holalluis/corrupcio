<?php
include'insert.php';

//processa POST
$persona_id=$_POST['persona_id'];
$empresa_id=$_POST['empresa_id'];

//comprova si ja existeix abans d'insertar
$n=mysqli_num_rows($mysql->query("SELECT 1 FROM relacions_persona_empresa WHERE persona_id=$persona_id AND empresa_id=$empresa_id"));
if($n){
	die("Error. La connexio persona_empresa $persona_id<->$empresa_id ja existeix ($n resultats)");
}

//inserta
$sql="INSERT INTO relacions_persona_empresa (persona_id,empresa_id) VALUES ($persona_id,$empresa_id)";
insert($sql);
?>
