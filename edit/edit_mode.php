<?php
	//global permis per editar
	$edit_mode=false;

	//llista de passwords vàlids (futur: base de dades)
	$passwords=array("12345","54321");

	//el password es el valor del cookie 'edit_mode'
	if(isset($_COOKIE['edit_mode']) && in_array($_COOKIE['edit_mode'],$passwords))
	{
		$edit_mode=true;
	}
?>
