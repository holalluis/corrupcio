<div id=footer>
	<div class=item onclick=window.location='about.php'>Corrupció <?php echo date('Y') ?></div>
	<div class=item onclick=window.location='contact.php'>Contacte</div>
	<div class=item onclick=window.open('README.md')>README.md</div>
</div>

<style>
	#footer {
		margin-top:10em;
		background:linear-gradient(#e5e5e5,#f5f5f5);
		border-top:1px solid #ccc;
		padding-bottom:250px;
		text-shadow:0 1px 0 #fff;
		display:flex;
	}
	#footer .item {
		display:inline-block;
		padding:0.4em 0.5em 0.65em 0.5em;
		cursor:pointer;
		border-bottom:1px solid transparent;
		color:rgba(0,0,0,0.55);
	}
	#footer .item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
