
<div id=navbar>
	<div id='burger' onclick="">&#9776;</div>
	<div class='navbar_item' onclick=window.location='index.php'>Inici</div>
	<div class='navbar_item' onclick=window.location='casos.php'>Casos de corrupció</div>
	<div class='navbar_item' onclick=window.location='persones.php'>Persones implicades</div>
	<div class='navbar_item' onclick=window.location='partits.php'>Partits implicats</div>
	<div class='navbar_item' onclick=window.location='empreses.php'>Empreses implicades</div>
	<div class='navbar_item' onclick=window.location='insert.php'>Afegir dades</div>
</div>

<style>
	#navbar {
		background:#f5f5f5;
		border-bottom:1px solid #e5e5e5;
		height:50px;
		padding-left:30px;
	}
	#navbar .navbar_item {
		display:inline-block;
		padding:1em;
		cursor:pointer;
		color:rgba(0,0,0,0.55);
	}
	#navbar .navbar_item:hover {
		background:#f0f0f0;
		border-bottom:1px solid blue;
		color:rgba(0,0,0,0.85);
	}
	#navbar #burger {
		display:inline-block;
		color:#ccc;
		font-size:18px;
		cursor:pointer;
		padding:0.5em 0.5em 0.5em 0;
	}
	#navbar #burger:hover {
		color:black;
	}
</style>
