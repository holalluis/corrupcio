<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		ul#resum table td {
			padding:0;
			border:none;
			max-width:45%;
		}
		ul#resum td:nth-child(n+2) a {
			text-decoration:none;
			color:#bbb;
		}
		ul#resum td:nth-child(n+2) a:hover {
			color:#666;
			text-decoration:underline;
		}
		ul#resum table li {
			margin-top:   0.2em;
			margin-bottom:0.3em;
		}
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
<h2>Resum base de dades</h2>

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
			return "<span style=color:#ccc> ".join(', ',$items)."...</span>";
		}
	?>
	<table>
		<tr><td><li><a href="persones.php">Persones</a>                    (<?php echo compta('persones').") <td>".troba('persones','persona')?> 
		<tr><td><li><a href="casos.php">Casos de corrupció</a>             (<?php echo compta('casos').")    <td>".troba('casos','cas')?> 
		<tr><td><li><a href="partits.php">Partits</a>                      (<?php echo compta('partits').")  <td>".troba('partits','partit')?> 
		<tr><td><li><a href="empreses.php">Empreses</a>                    (<?php echo compta('empreses').") <td>".troba('empreses','empresa')?> 
		<tr><td><li><a href="condemnes.php">Condemnes</a>                  (<?php echo compta('condemnes')?>)
		<tr><td><li><a href="relacions.php">Connexions persona-cas</a>     (<?php echo compta('relacions_persona_cas')?>)
		<tr><td><li><a href="relacions.php">Connexions persona-partit</a>  (<?php echo compta('relacions_persona_partit')?>)
		<tr><td><li><a href="relacions.php">Connexions persona-empresa</a> (<?php echo compta('relacions_persona_empresa')?>)
	</table>
</ul>

<!--top 5 casos--><hr>
<div style="padding:1em;">
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
<div style="padding:1em;">LINKS
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
