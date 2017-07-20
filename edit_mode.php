<?php 
	//edit mode header
	if($edit_mode)
	{ 
		?>
		<div id=edit_mode_header>
			<div style=padding:0.5em> 
				mode editar activat
			</div>

			<!--insert-->
			<div>
				<button onclick="window.location='insert.php'">Inserta dades</button>
			</div>

			<!--activa view mode-->
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

			<!--veure problemes base de dades-->
			<div>
				<button onclick="window.location='orfes.php'" title="Problemes base de dades">Veure problemes</button>
			</div>

			<!--sortir edit mode-->
			<div title="Sortir del mode editar">
				<button onclick="window.location='edit/logout.php'">Sortir</button>
			</div>

			<?php
				//activar el view mode
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
				margin:2px 1px;
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
