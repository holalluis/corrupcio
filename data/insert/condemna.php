<?php
/*inserta una nova condemna*/
include'insert.php';

//processa POST
$relacio_persona_cas_id=$_POST['relacio_persona_cas_id'];
$anys_de_preso=$_POST['anys_de_preso'];
$delictes=$mysql->escape_string($_POST['delictes']);
$any=$_POST['any'];

//comprova input
if($anys_de_preso=="")die("Anys de preso no especificat");

//inserta
$sql="INSERT INTO condemnes (relacio_persona_cas_id,anys_de_preso,delictes,any) VALUES ($relacio_persona_cas_id,$anys_de_preso,'$delictes',$any)";
insert($sql);
?>
