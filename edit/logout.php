<?php
	setcookie("edit_mode","",time()+86400*30,'/');
	setcookie("view_mode","",time()+86400*30,'/');
	echo "cookies esborrat";
	header('location: '.$_SERVER['HTTP_REFERER']);
?>
