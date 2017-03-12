<?php
	//global permis per editar
	$edit_mode=false;

	//password = cookie edit_mode
	if(isset($_COOKIE['edit_mode']) && $_COOKIE['edit_mode']=='12345')
	{
		$edit_mode=true;
	}
?>
