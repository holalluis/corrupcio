<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=inici]{color:black}
		#top5{
			margin-top:10px;
		}
		#top5 td, #top5 th{
			padding:0.3em 0.5em;
		}
		/*treu els marges a portrait*/
		@media only screen and (min-width:560px) { 
			#root {
				margin-left:10px;
			}
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>Enciclopèdia de la corrupció <i class=blanc>v0.1</i></h1>

<!--resum-->
<div>
	<ul>
		<?php
			function compta($taula){
				global $mysql;
				$n=0;
				$sql="SELECT COUNT(*) FROM $taula";
				$res=$mysql->query($sql) or die(mysqli_error($mysql));
				$row=mysqli_fetch_assoc($res);
				$n=current($row);
				return $n;
			}
		?>
		<li><a href="casos.php">    Casos de corrupció</a>         (<?php echo compta('casos')?>)
		<li><a href="persones.php"> Persones</a>                   (<?php echo compta('persones')?>)
		<li><a href="partits.php">  Partits</a>                    (<?php echo compta('partits')?>)
		<li><a href="empreses.php"> Empreses</a>                   (<?php echo compta('empreses')?>)
		<li><a href="condemnes.php">Condemnes</a>                  (<?php echo compta('condemnes')?>)
		<li><a href="relacions.php">Connexions</a>
			(<?php 
				$suma=compta('relacions_persona_cas')+
					compta('relacions_persona_partit')+
					compta('relacions_persona_empresa');
				echo $suma;
			?>)
	</ul>
</div>

<!--top 5 casos-->
<div>
	<table id=top5>
		<tr><th colspan=3>Top 5 casos
		<?php
			$sql="SELECT * FROM casos ORDER BY espoli DESC LIMIT 5";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$i=1;
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$espoli=$row['espoli'];
				echo "<tr>
					<td>$i
					<td><a href=cas.php?id=$id>$nom</a>
					<td class=numero>$espoli eur
				";
				$i++;
			}
		?>
	</table>
</div>

<!--links
-->
<div><h3>Links</h3>
	<ul>
		<li><a target=_blank href="https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n">
		15mpedia.org/wiki/[...]</a>
		<li><a target=_blank href="https://llumsitaquigrafs.cat/">llumsitaquigrafs.cat/</a>
		<li><a target=_blank href="https://atles.llumsitaquigrafs.cat/">atles.llumsitaquigrafs.cat/</a>
		<li><a target=_blank href="https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a">
		es.wikipedia.org/[...]</a>
	</ul>
</div>

</div id=root>

<!--footer--><?php include'footer.php'?>
