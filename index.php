<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		ul#resum a {
			text-decoration:none;
			color:#bbb;
		}
		ul#resum a:hover {
			color:#666;
			text-decoration:underline;
		}
		table#top5 td{
			padding:0 0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Inici &mdash; Resum base de dades</h1>

<!--resum-->
<ul id=resum>
	<?php
		function compta($taula) {
			global $mysql;
			$n=0;
			$sql="SELECT COUNT(*) FROM $taula";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$row=mysqli_fetch_assoc($res);
			$n=current($row);
			return $n;
		}

		function troba($taula,$item){
			global $mysql;
			$sql="SELECT id,nom FROM $taula ORDER BY id DESC LIMIT 5 ";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$items=array();
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$items[]="<a href=$item.php?id=$id>$nom</a>";
			}

			return "&rarr;<span style=color:#ccc> ".join(', ',$items)."...</span>";
		}
	?>
	<li>Persones                   (<?php echo compta('persones').") ".troba('persones','persona')?> 
	<li>Casos de corrupció         (<?php echo compta('casos').")    ".troba('casos','cas')?> 
	<li>Partits                    (<?php echo compta('partits').")  ".troba('partits','partit')?> 
	<li>Empreses                   (<?php echo compta('empreses').") ".troba('empreses','empresa')?> 
	<li>Connexions persona-cas     (<?php echo compta('relacions_persona_cas')?>)
	<li>Connexions persona-partit  (<?php echo compta('relacions_persona_partit')?>)
	<li>Connexions persona-empresa (<?php echo compta('relacions_persona_empresa')?>)
	<li>Condemnes                  (<?php echo compta('condemnes')?>)
</ul>

<!--top 5 casos--><hr>
<div style="padding:1em;">
	<table id=top5><tr><th colspan=2>Top 5 casos
		<?php
			$sql="SELECT * FROM casos ORDER BY espoli DESC LIMIT 5";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
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

<!--links--><hr>
<div style="padding:1em;">LINKS
	<ul>
		<li><a href="https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n">https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n</a>
		<li><a href="https://llumsitaquigrafs.cat/">https://llumsitaquigrafs.cat/</a>
		<li><a href="https://atles.llumsitaquigrafs.cat/">https://atles.llumsitaquigrafs.cat/</a>
		<li><a href="https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a">https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a</a>
	</ul>
</div>

<!--footer--><?php include'footer.php'?>
