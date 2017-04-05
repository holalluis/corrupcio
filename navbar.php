<?php 
	//edit mode header
	if($edit_mode)
	{ 
		?>
		<div id=edit_mode_header>
			<div>Edit mode ON</div>
			<div class=item><a href='insert.php'>Inserta</a>    </div>
			<div class=item><a href='edit/logout.php'>Sortir</a></div>
		</div>
		<style>
			#edit_mode_header {
				text-align:center;
				background:#666;
				color:white;
				display:flex;
			}
			#edit_mode_header div {
				padding:0.8em 0.5em;
			}
			#edit_mode_header div.item:hover {
				background:#888;
			}
			#edit_mode_header a {
				color:white;
			}
		</style>
		<?php
	}
?>

<div id=navbar class=flex>
	<div class=flex>
		<div class=item pagina=inici     onclick=window.location='index.php'    >Inici</div>
		<div class=item pagina=persones  onclick=window.location='persones.php' >Persones</div>
		<div class=item pagina=casos     onclick=window.location='casos.php'    >Casos</div>
		<div class=item pagina=partits   onclick=window.location='partits.php'  >Partits</div>
		<div class=item pagina=empreses  onclick=window.location='empreses.php' >Empreses</div>
		<div class=item pagina=condemnes onclick=window.location='condemnes.php'>Condemnes</div>
		<div class=item pagina=relacions onclick=window.location='relacions.php'>Connexions</div>
		<div class=item onclick="qs('#busca').classList.toggle('amagat');qs('#q').focus()">Busca</div>
	</div>
	<div>
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
	#navbar .item {
		padding:0.8em 0.5em;
		text-align:center;
		color:rgba(0,0,0,0.55);
		cursor:pointer;
		transition:background 0.15s;
	}
	#navbar .item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
