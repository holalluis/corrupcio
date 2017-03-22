<div id=navbar>
	<div id='burger' onclick="">&#9776;</div>
	<div class='navbar_item' pagina=inici     onclick=window.location='index.php'    > INICI</div>
	<div class='navbar_item' pagina=persones  onclick=window.location='persones.php' > Persones</div>
	<div class='navbar_item' pagina=casos     onclick=window.location='casos.php'    > Casos</div>
	<div class='navbar_item' pagina=partits   onclick=window.location='partits.php'  > Partits</div>
	<div class='navbar_item' pagina=empreses  onclick=window.location='empreses.php' > Empreses</div>
	<div class='navbar_item' pagina=condemnes onclick=window.location='condemnes.php'> Condemnes</div>
	<div class='navbar_item' pagina=relacions onclick=window.location='relacions.php'> Connexions</div>
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
		margin:0;
		background:#e5e5e5;
		border-bottom:1px solid #ccc;
		height:50px;
		padding-left:40px;
		text-shadow: 0 1px 0 #fff;
	}
	#navbar #burger {
		color:rgba(0,0,0,0.55);
		cursor:pointer;
		display:inline-block;
		display:none;
		font-size:18px;
		padding:0.5em 0.5em 0.5em 0;
	}
	#navbar #burger:hover {
		color:black;
	}
	#navbar .navbar_item {
		border-bottom:2px solid transparent;
		color:rgba(0,0,0,0.55);
		cursor:pointer;
		display:inline-block;
		height:34px;
		padding:15px 0.5em 0 0.5em;
		vertical-align:top;
		transition:background 0.15s;
	}
	#navbar .navbar_item:hover {
		background:#f0f0f0;
		border-bottom:2px solid #abc;
		color:rgba(0,0,0,0.85);
	}
</style>
