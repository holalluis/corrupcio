<?php
	if(isset($_COOKIE['view_mode']))
	{
		setcookie("view_mode","",time()+86400*30,'/');
	}
	else
	{
		setcookie("view_mode",1,time()+86400*30,'/');
	}
	
	header("location: ".$_SERVER['HTTP_REFERER']);
?>
