<?php 
	//edit mode header
	if($edit_mode) { ?>
		<div id=edit_mode_header>
			<div style=padding:0.5em> 
				edit mode ON
			</div>

			<!--inserta dades-->
			<div class=flex>
				<div>
					<button onclick="window.location='insert.php'">Inserta</button>
				</div>

				<!--activa view mode-->
				<div title="Opció per veure com queda la pàgina sense sortir de l'Edit mode">
					<button onclick="window.location='edit/view_mode.php'">
						View mode 
						<?php 
							if($view_mode)
								echo "<b>ON</b>/OFF";
							else
								echo "ON/<b>OFF</b>";
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
			</div>

			<?php
				//activar el view mode fent que a partir d'aquí estigui desactivat
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
				justify-content:center;
				padding:2px 0;
				text-align:center;
				text-shadow:0 1px 0 #000;
			}
			#edit_mode_header button {
				background:#fafafa;
				border:none;
				border-right:1px solid #666;
				margin:1px 0;
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
