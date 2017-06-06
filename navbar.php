<?php include'edit_mode.php'?>

<!--navbar-->
<div id=navbar>
	<!--items-->
	<div class=item_container>
		<!--burger simbol-->
		<div class='item burger' onclick=burgerClick()>
			<div style="border-radius:0.3em;border:1px solid #666;height:30px;width:30px;">
				<hr><hr><hr><!--3 linies-->
				<script>
					//mostra o amaga items per mobil portrait
					function burgerClick() {
						var items=qsa("#navbar .item_container .item[pagina]");
						for(var i=0;i<items.length;i++) {
							items[i].classList.toggle('invisible');
						}
					}
				</script>
			</div>
		</div>
		<!--main nav items: per mobil estan invisibles per defecte-->
		<div class='item invisible' pagina=inici     onclick=window.location='index.php'    >Inici</div>
		<div class='item invisible' pagina=casos     onclick=window.location='casos.php'    >Casos</div>
		<div class='item invisible' pagina=persones  onclick=window.location='persones.php' >Persones</div>
		<div class='item invisible' pagina=partits   onclick=window.location='partits.php'  >Partits</div>
		<div class='item invisible' pagina=empreses  onclick=window.location='empreses.php' >Empreses</div>
		<div class='item invisible' pagina=condemnes onclick=window.location='condemnes.php'>Condemnes</div>
		<div class='item invisible' pagina=relacions onclick=window.location='relacions.php'>Connexions</div>
	</div>

	<!--menu buscar-->
	<div class="item invisible">
		<?php include'busca.php'?>
	</div>

</div>


<style>
	#navbar {
		margin:0;
		background:#e5e5e5;
		border-bottom:1px solid #ccc;
		text-shadow: 0 1px 0 #fff;
		display:flex;/*the net ninja css flexbox playlist*/
		flex-wrap:wrap;
		justify-content:space-between;
	}
	#navbar .item_container {
		display:flex;/*the net ninja css flexbox playlist*/
		flex-wrap:wrap;
		justify-content:space-between;
	}
	#navbar .item {
		padding:0.4em 0.5em 0.65em 0.5em;
		line-height:2.35em; 
		text-align:left;
		color:rgba(0,0,0,0.55);
		cursor:pointer;
		transition:all 0.1s;
	}
	#navbar .item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}

	/*burger symbol*/
	#navbar .item.burger {display:none}
	#navbar .burger hr {width:40%;border-bottom:1px solid #666;}

	/*mobile portrait*/
	@media only screen and (max-width:560px) { 
		#navbar .item_container{display:block;} 
		#navbar .item.burger{
			display:block;
			text-align:center;
			width:32px;
		}
		#navbar .item_container .invisible {
			color:transparent;
			visibility:hidden;
			height:0;
			padding:0;
			transition:all 0.15s;
		}
	}
</style>
