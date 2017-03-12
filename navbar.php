<div id=navbar>
	<div id='burger' onclick="">&#9776;</div>
	<div class='navbar_item' onclick=window.location='index.php'    > INICI</div>
	<div class='navbar_item' onclick=window.location='persones.php' > Persones</div>
	<div class='navbar_item' onclick=window.location='casos.php'    > Casos</div>
	<div class='navbar_item' onclick=window.location='partits.php'  > Partits</div>
	<div class='navbar_item' onclick=window.location='empreses.php' > Empreses</div>
	<div class='navbar_item' onclick=window.location='condemnes.php'> Condemnes</div>
	<div class='navbar_item' onclick=window.location='relacions.php'> Connexions</div>
	<div class='navbar_item' onclick="qs('#busca').classList.toggle('amagat');qs('#q').focus()">Busca</div>

	<?php include'edit_mode.php'?>
	<?php 
		if($edit_mode)
		{
			?>
			<div class='navbar_item' style=float:right onclick=window.location='insert.php'> Inserta</div>
			<?php
		}
	?>
</div>

<!--menu buscar-->
<?php include 'busca.php'?>

<style>
	#navbar {
		background:#e5e5e5;
		border-bottom:1px solid #ccc;
		height:50px;
		padding-left:30px;
		text-shadow: 0 1px 0 #fff;
	}
	#navbar #burger {
		display:inline-block;
		color:rgba(0,0,0,0.55);
		font-size:18px;
		cursor:pointer;
		padding:0.5em 0.5em 0.5em 0;
	}
	#navbar #burger:hover {
		color:black;
	}
	#navbar .navbar_item {
		display:inline-block;
		padding:1em 0.5em;
		cursor:pointer;
		border-bottom:1px solid transparent;
		color:rgba(0,0,0,0.55);
	}
	#navbar .navbar_item:hover {
		background:#f0f0f0;
		border-bottom:1px solid blue;
		color:rgba(0,0,0,0.85);
	}
</style>
