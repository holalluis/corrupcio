<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		table#top5 td{
			padding:0.3em 0.5em;
		}
		#navbar div[pagina=inici]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Gran Enciclopèdia de la Corrupció</h1>
<h2>Pàgina principal</h2>
<h3>Resum base de dades</h3>

<!--resum-->
<ul id=resum>
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

		//no utilitzat per ara
		function troba($taula,$item){
			global $mysql;
			$sql="SELECT id,nom FROM $taula ORDER BY id DESC LIMIT 5 ";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$items=array();
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$items[]="<a href=$item.php?id=$id>$nom</a>";
			}
			return "<span style=color:#ccc> ".join(', ',$items)."</span>";
		}
	?>
	<li><a href="persones.php"> Persones</a>                   (<?php echo compta('persones')?>)
	<li><a href="casos.php">    Casos de corrupció</a>         (<?php echo compta('casos')?>)
	<li><a href="partits.php">  Partits</a>                    (<?php echo compta('partits')?>)
	<li><a href="empreses.php"> Empreses</a>                   (<?php echo compta('empreses')?>)
	<li><a href="condemnes.php">Condemnes</a>                  (<?php echo compta('condemnes')?>)
	<li><a href="relacions.php">Connexions persona-cas</a>     (<?php echo compta('relacions_persona_cas')?>)
	<li><a href="relacions.php">Connexions persona-partit</a>  (<?php echo compta('relacions_persona_partit')?>)
	<li><a href="relacions.php">Connexions persona-empresa</a> (<?php echo compta('relacions_persona_empresa')?>)
</ul>

<!--top 5 casos--><hr>
<div style="padding:10px">
	<table id=top5><tr><th colspan=2>Top 5 casos
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
					<td>$i. <a href=cas.php?id=$id>$nom</a>
					<td>$espoli eur
				";
				$i++;
			}
		?>
	</table>
</div>

<hr>

<!--links
-->
<div><h3>LINKS</h3>
	<ul>
		<li><a target=_blank href="https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n">
		15mpedia.org/wiki/[...]</a>
		<li><a target=_blank href="https://llumsitaquigrafs.cat/">llumsitaquigrafs.cat/</a>
		<li><a target=_blank href="https://atles.llumsitaquigrafs.cat/">atles.llumsitaquigrafs.cat/</a>
		<li><a target=_blank href="https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a">
		es.wikipedia.org/[...]</a>
	</ul>
</div>

<!--footer--><?php include'footer.php'?>
