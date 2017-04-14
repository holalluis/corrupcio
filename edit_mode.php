<?php 
	//edit mode header
	if($edit_mode)
	{ 
		?>
		<div id=edit_mode_header>
			<!--insert-->
			<div class=flex>
				<div class=item><a href='insert.php'>Inserta persones, casos, partits, empreses</a></div>
			</div>

			<div class=flex >
				<!--view mode-->
				<div class=edit_mode_on title="Opció per veure com queda la pàgina sense sortir de Edit mode">
					View mode <?php if($view_mode) echo "ON "; else echo "OFF"; ?>
					<button onclick=window.location='edit/view_mode.php'>ON/OFF</button>
				</div>
				<!--edit mode-->
				<div class=edit_mode_on title="Permís per editar les pàgines">
					Edit mode ON
					<button onclick=window.location='edit/logout.php'>Sortir</button>
				</div>
			</div>

			<?php
				if($view_mode)
				{
					$edit_mode=false;
				}
			?>
		</div>

		<style>
			#edit_mode_header {
				text-align:center;
				background:#666;
				color:white;
				display:flex;
				justify-content:space-between;
			}
			#edit_mode_header .edit_mode_on {
				padding:0.8em 0.5em;
				color:#ccc;
			}
			#edit_mode_header .item {
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
