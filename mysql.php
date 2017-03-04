<?php

/** Connexió a la base de dades **/
if($_SERVER['SERVER_NAME']=='localhost')
{
	$mysql=mysqli_connect("127.0.0.1","root","","Corrupcio") or die(mysqli_error($mysql));
}
else
{
	//$mysql=mysqli_connect("mysql.hostinger.es","u627027592_lluis","lluislluis1","u627027592_tites");
}

?>
