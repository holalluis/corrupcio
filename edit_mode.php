<?php 
	//edit mode header
	if($edit_mode)
	{ 
		?>
		<div id=edit_mode_header>
			<div class=flex >
				<!--edit mode-->
				<div class=edit_mode_on title="Permís per editar les pàgines">
					<button onclick=window.location='edit/logout.php'>SORTIR de l'Edit mode</button>
				</div>
				<!--view mode-->
				<div class=edit_mode_on title="Opció per veure com queda la pàgina sense sortir de l'Edit mode">
					<button onclick=window.location='edit/view_mode.php'>View mode ON/OFF</button>
				</div>
			</div>

			<!--insert-->
			<div class=item><a href='insert.php'>Inserta persones, casos, partits, empreses</a></div>

			<?php
				//activa el view mode
				if($view_mode) { $edit_mode=false; }
			?>
		</div>

		<style>
			#edit_mode_header {
				text-align:center;
				background:#666;
				color:white;
				text-shadow: 0 1px 0 #000;
				display:flex;
				justify-content:space-between;
			}
			#edit_mode_header .edit_mode_on {
				padding:0.8em 0.5em;
				color:#ccc;
				text-align:left;
				display:flex;
				justify-content:space-between;
			}
			#edit_mode_header .item {
				padding:0.8em 0.5em;
				text-align:left;
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
