<?php
/**Connexió a la base de dades**/
if($_SERVER['SERVER_NAME']=='localhost')
{
	$mysql=mysqli_connect("127.0.0.1","root","","Corrupcio") 
	or die(mysqli_error($mysql));
}
else
{
	$mysql=mysqli_connect("127.0.0.1","root","raspberry","Corrupcio") 
	or die(mysqli_error($mysql));
}
?>
