<?php 
	//edit mode header
	if($edit_mode)
	{ 
		?>
		<div id=edit_mode_header>

			<div class=flex>
				<div class=edit_mode_on>Edit mode ON</div>
				<div class=item><a href='insert.php'>Inserta</a></div>
			</div>

			<div class=flex onclick=window.location='edit/logout.php' style=cursor:pointer>
				<div class=item><a href='#'>Sortir</a></div>
			</div>

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
