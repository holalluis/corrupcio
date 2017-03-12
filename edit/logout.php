<?php
	setcookie("edit_mode","",time()+86400*30,'/');
	echo "cookie esborrat";
	header('location: '.$_SERVER['HTTP_REFERER']);
?>
