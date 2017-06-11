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

			<!--problemes-->
			<div>
				<button onclick="window.location='orfes.php'" title="Problemes base de dades">Problemes bbdd</button>
			</div>

			<!--view mode-->
			<div title="Opció per veure com queda la pàgina sense sortir de l'Edit mode">
				<button onclick="window.location='edit/view_mode.php'">
					<?php 
						if($view_mode) {
							echo "View mode <b>ON</b>/OFF";
						}
						else {
							echo "View mode ON/<b>OFF</b>";
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
				background:#666;
				background:linear-gradient(#666,#888);
				color:white;
				display:flex;
				flex-wrap:wrap;
				padding:2px 0;
				text-align:center;
				text-shadow:0 1px 0 #000;
			}
			#edit_mode_header button {
				background:#fafafa;
				border-radius:0.1em;
				border:none;
				margin:2px;
				padding:0.5em;
			}
			#edit_mode_header button:hover {
				background:#ccc;
				cursor:pointer;
			}
		</style>
		<?php
	}
?>
