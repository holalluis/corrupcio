<div id=footer>
	<div class=titol>Corrupció <?php echo date("Y")?></div>
	<div class=item pagina=contact onclick=window.location='contact.php'>Contacta</div>
	<div class=item pagina=about   onclick=window.location='about.php'>Quant a</div>
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
		padding-bottom:20px;
		display:flex;
		flex-wrap:wrap;
	}
	#footer .titol {
		padding:4px 5px 6px 5px;
		line-height:30px;
		color:black;
		text-shadow:0 1px 0 #fff;
		font-family:monospace;
	}
	#footer .item {
		padding:4px 5px 6px 5px;
		line-height:30px;
		cursor:pointer;
		color:rgba(0,0,0,0.55);
	}
	#footer .item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
