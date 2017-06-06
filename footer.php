<div id=footer>
	<div class=titol>Corrupció <?php echo date("Y")?></div>
	<div class=item onclick=window.location='about.php'>Quant a</div>
	<div class=item onclick=window.location='contact.php'>Contacte</div>
	<div class=item onclick=window.open('README.md')>README.md</div>
	<!--edit mode-->
	<?php
		if(!$edit_mode and !$view_mode) {
			?>
			<div class='item invisible' pagina onclick=access()>
				<div>Edit mode</div>
				<script>
					function access() {
						var pass=prompt("Password:");
						var sol=new XMLHttpRequest();
						sol.open('POST','edit/access.php',true);
						sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						sol.onreadystatechange=function() {
							if(this.readyState==4&&this.status==200) {
								console.log(this.responseText);
								window.location.reload();//millorar
							}
						}
						sol.send("pass="+pass);
					}
				</script>
			</div>
			<?php
		}
	?>
</div>

<style>
	#footer {
		background:linear-gradient(#e5e5e5,white);
		border-top:1px solid #ccc;
		text-shadow:0 1px 0 #fff;
		display:flex;
		flex-wrap:wrap;
	}
	#footer .titol {
		padding:0.4em 0.5em 0.65em 0.5em;
		color:black;
	}
	#footer .item {
		padding:0.4em 0.5em 0.65em 0.5em;
		cursor:pointer;
		color:rgba(0,0,0,0.55);
	}
	#footer .item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
