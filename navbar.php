<div id=navbar>
	<div class=flex>
		<div class='navbar_item' pagina=inici     onclick=window.location='index.php'    >Inici</div>
		<div class='navbar_item' pagina=persones  onclick=window.location='persones.php' >Persones</div>
		<div class='navbar_item' pagina=casos     onclick=window.location='casos.php'    >Casos</div>
		<div class='navbar_item' pagina=partits   onclick=window.location='partits.php'  >Partits</div>
		<div class='navbar_item' pagina=empreses  onclick=window.location='empreses.php' >Empreses</div>
		<div class='navbar_item' pagina=condemnes onclick=window.location='condemnes.php'>Condemnes</div>
		<div class='navbar_item' pagina=relacions onclick=window.location='relacions.php'>Connexions</div>
		<div class='navbar_item' onclick="qs('#busca').classList.toggle('amagat');qs('#q').focus()">Busca</div>
	</div>
	<div class=flex>

		<?php 
			if($edit_mode)
			{
				?>
				<div class='navbar_item' pagina=insert onclick=window.location='insert.php'>Inserta</div>
				<?php
			}
		?>
		<?php include'edit_mode.php'?>
	</div>
</div>

<!--menu buscar-->
<?php include 'busca.php'?>

<style>
	#navbar {
		margin:0;
		background:#e5e5e5;
		border-bottom:1px solid #ccc;
		text-shadow: 0 1px 0 #fff;
		display:flex;/*the net ninja css flexbox playlist*/
		flex-wrap:wrap;
		justify-content:space-between;
	}
	#navbar .flex {
		display:flex;
		flex-wrap:wrap;
	}
	#navbar .navbar_item {
		display:block;
		padding:0.8em 0.5em;
		text-align:center;
		color:rgba(0,0,0,0.55);
		cursor:pointer;
		transition:background 0.15s;
	}
	#navbar .navbar_item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
