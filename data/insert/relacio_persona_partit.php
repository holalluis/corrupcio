<?php
include'insert.php';

//processa POST
$persona_id=$_POST['persona_id'];
$partit_id=$_POST['partit_id'];

//inserta
$sql="INSERT INTO relacions_persona_partit (persona_id,partit_id) VALUES ($persona_id,$partit_id)";
insert($sql);
?>
