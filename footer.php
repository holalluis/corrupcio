<div id=footer>
	<div class='footer_item'>Corrupció <?php echo date('Y') ?></div>
	<div class='footer_item' onclick=window.location='README.md'>README.md</div>
	<div class='footer_item'>Contacta</div>
	<div class='footer_item'>Avís legal</div>
</div>

<style>
	#footer {
		padding:30px;
		background:#e5e5e5;
		border-top:1px solid #ccc;
		padding-bottom:300px;
		text-shadow: 0 1px 0 #fff;
	}
	#footer .footer_item {
		display:inline-block;
		padding:1em;
		cursor:pointer;
		border-bottom:1px solid transparent;
		color:rgba(0,0,0,0.55);
	}
	#footer .footer_item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
