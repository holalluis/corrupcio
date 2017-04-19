<?php

//set cookie edit_mode (password)
$pass=$_POST['pass'] or die("error");

setcookie("edit_mode",$pass,time()+86400*30,'/');

echo "cookie set to $pass";

?>
