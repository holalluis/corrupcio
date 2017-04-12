<?php include'edit_mode.php'?>

<!--navbar-->
<div id=navbar class=flex>
	<div class=flex>
		<div class=item pagina=inici     onclick=window.location='index.php'    >Inici</div>
		<div class=item pagina=persones  onclick=window.location='persones.php' >Persones</div>
		<div class=item pagina=casos     onclick=window.location='casos.php'    >Casos</div>
		<div class=item pagina=partits   onclick=window.location='partits.php'  >Partits</div>
		<div class=item pagina=empreses  onclick=window.location='empreses.php' >Empreses</div>
		<div class=item pagina=condemnes onclick=window.location='condemnes.php'>Condemnes</div>
		<div class=item pagina=relacions onclick=window.location='relacions.php'>Connexions</div>
	</div>
	<!--buscar-->
	<div class=item onclick="qs('#busca').classList.toggle('amagat');qs('#q').focus()">
		Busca
	</div>
	<!--edit mode-->
	<?php
		if(!$edit_mode)
		{
			?>
			<div class=item onclick=access()>
				<div>Edit mode</div>
				<script>
					function access()
					{
						var pass=prompt("Password:");
						var sol=new XMLHttpRequest();
						sol.open('POST','edit/access.php',true);
						sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						sol.onreadystatechange=function()
						{
							if(this.readyState==4&&this.status==200)
							{
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

<!--menu buscar--><?php include'busca.php'?>

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
	#navbar .item {
		padding:0.4em 0.5em 0.65em 0.5em;
		text-align:center;
		color:rgba(0,0,0,0.55);
		cursor:pointer;
		transition:all 0.15s;
	}
	#navbar .item:hover {
		background:#f0f0f0;
		color:rgba(0,0,0,0.85);
	}
</style>
