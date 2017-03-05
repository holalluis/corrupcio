<?php
/*inserta una nova condemna*/
include'insert.php';

//processa POST
$relacio_persona_cas_id=$_POST['relacio_persona_cas_id'];
$anys_de_preso=$_POST['anys_de_preso'];
$any=$_POST['any'];

//inserta
$sql="INSERT INTO condemnes (relacio_persona_cas_id,anys_de_preso,any) VALUES ($relacio_persona_cas_id,$anys_de_preso,$any)";
insert($sql);
?>
