<?php
include'insert.php';

//processa POST
$persona_id=$_POST['persona_id'];
$cas_id=$_POST['cas_id'];

//inserta
$sql="INSERT INTO relacions_persona_cas (persona_id,cas_id) VALUES ($persona_id,$cas_id)";
insert($sql);
?>
