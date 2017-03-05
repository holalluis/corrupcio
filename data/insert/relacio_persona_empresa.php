<?php
include'insert.php';

//processa POST
$persona_id=$_POST['persona_id'];
$empresa_id=$_POST['empresa_id'];

//inserta
$sql="INSERT INTO relacions_persona_empresa (persona_id,empresa_id) VALUES ($persona_id,$empresa_id)";
insert($sql);
?>
