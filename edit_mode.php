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
