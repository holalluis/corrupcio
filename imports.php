<!--connecta-->
<?php include'mysql.php'?>

<?php
	//variables globals (MAJÚSCULA) (nota: edit mode i view mode haurien de ser majúscules, per seguir la convenció)
	$NOM_APP="Enciclopèdia de la corrupció";
?>

<!--permís per edit mode, cookie fa de password-->
<?php include'edit/edit_mode.php'?>

<!--utf-8 css-->
<meta charset=utf-8>
<meta name="viewport" content="width=device-width">
<link rel="icon" href="img/ico.png" type="image/x-icon">
<link rel="stylesheet" href="css.css">
<meta name="description" content="corrupció">

<title>
	Corrupció
	<?php
		if($_SERVER['SERVER_NAME']=='localhost'){
			echo "(localhost)";
		}
	?>
</title>

<?php 
	if($edit_mode){
		//funcions per crear un menu visual per updates
		include'update_menu.php';
	}
?>

<script>
	//utils
	function qs(selector){return document.querySelector(selector)}
	function qsa(selector){return document.querySelectorAll(selector)}

	/*CRUD ops (update, delete)*/

	<?php 
		if($edit_mode) { ?>
			//esborra un objecte d'una taula
			function esborra(taula,id) {
				if(!confirm("S'esborrarà l'element "+taula+"->id "+id+". Continuar?")){return}
				var sol=new XMLHttpRequest();
				sol.open('POST',"data/esborra.php",true);
				sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				sol.onreadystatechange=function() {
					if(this.readyState==4&&this.status==200) {
						console.log(this.responseText);
						window.location.reload();
					}
				}
				sol.send("taula="+taula+"&id="+id);
			}

			//update ordre de relacio_persona_cas
			function updateOrdre(rel_id,nouValor) {
				function urldecode(url){return decodeURIComponent(url.replace(/\+/g,' '))}

				var sol=new XMLHttpRequest();
				sol.open('POST',"data/update.php",true);
				sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				sol.onreadystatechange=function()
				{
					if(this.readyState==4&&this.status==200)
					{
						console.log(this.responseText);
						window.location.reload();
					}
				}
				sol.send("taula=relacions_persona_cas&id="+rel_id+"&camp=ordre&nouValor="+nouValor);
			}
			<?php
		}
	?>
</script>
