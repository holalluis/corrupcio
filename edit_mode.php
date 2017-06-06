<?php 
	//edit mode header
	if($edit_mode)
	{ 
		?>
		<div id=edit_mode_header>
			<div style=padding:0.5em> 
				edit mode 
			</div>

			<!--insert-->
			<div>
				<button onclick="window.location='insert.php'">Inserta persones, casos, partits, empreses</button>
			</div>

			<!--view mode-->
			<div title="Opció per veure com queda la pàgina sense sortir de l'Edit mode">
				<button onclick="window.location='edit/view_mode.php'">
					<?php 
						if($view_mode) {
							echo "View mode [ON]/OFF";
						}
						else {
							echo "View mode ON/[OFF]";
						}
					?>
				</button>
			</div>

			<!--edit mode-->
			<div title="Permís per editar les pàgines">
				<button onclick="window.location='edit/logout.php'">Sortir</button>
			</div>

			<?php
				//activa el view mode
				if($view_mode) { $edit_mode=false; }
			?>
		</div>

		<style>
			#edit_mode_header {
				text-align:center;
				background:#666;
				background:linear-gradient(#666,#888);
				color:white;
				text-shadow: 0 1px 0 #000;
				padding:2px;
				display:flex;
			}
			#edit_mode_header button {
				padding:0.5em;
				border-radius:0.1em;
				border:none;
				background:#fafafa;
				margin:2px;
			}
			#edit_mode_header button:hover {
				background:#ccc;
				cursor:pointer;
			}
		</style>
		<?php
	}
?>
