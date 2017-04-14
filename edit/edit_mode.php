<?php
	//permis per editar
	$edit_mode=false;

	//veure com queda
	$view_mode=false;

	//llista de passwords vàlids per edit mode (futur: base de dades)
	$passwords=array("9999","421868");

	//password es el valor del cookie 'edit_mode'
	if(isset($_COOKIE['edit_mode']) && in_array($_COOKIE['edit_mode'],$passwords))
	{
		$edit_mode=true;
	}

	//obre view mode depenent de les cookies
	if(isset($_COOKIE['view_mode']))
	{
		$view_mode=true;
	}
?>
