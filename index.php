<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Corrupció &mdash; Pàgina inicial &mdash; Resum base de dades</h1>

<!--resum-->
<?php
	function compta($taula) {
		global $mysql;
		$n=0;
		$sql="SELECT COUNT(*) FROM $taula";
		$res=mysqli_query($mysql,$sql) or die(mysql_error());
		$row=mysqli_fetch_assoc($res);
		$n=current($row);
		return $n;
	}

	function troba($taula){
		global $mysql;
		$sql="SELECT nom FROM $taula ORDER BY id DESC LIMIT 5 ";
		$res=mysqli_query($mysql,$sql) or die(mysql_error());
		echo "<span style=color:#ccc>";
		while($row=mysqli_fetch_assoc($res))
		{
			echo $row['nom'].", ";
		}
		echo "...</span>";
	}
?>
<ul>
	<li>Casos de corrupció <?php echo "(".compta('casos').") &mdash; "; troba('casos')?> 
	<li>Persones implicades <?php echo "(".compta('persones').") &mdash; "; troba('persones')?> 
	<li>Partits implicats <?php echo "(".compta('partits').") &mdash; "; troba('partits')?> 
	<li>Empreses implicades <?php echo "(".compta('empreses').") &mdash; "; troba('empreses')?> 
</ul>

<!--top 5-->
<div style="padding:1em;">
	<table id=top5>
		<tr><th colspan=2>Top 5
		<?php
			$sql="SELECT * FROM casos ORDER BY espoli DESC LIMIT 5";
			$res=mysqli_query($mysql,$sql) or die(mysql_error());
			$i=1;
			while($row=mysqli_fetch_assoc($res))
			{
				$nom=$row['nom'];
				$espoli=$row['espoli'];
				echo "<tr>
					<td>$i. $nom
					<td>$espoli eur
				";
				$i++;
			}
		?>
	</table>
		<style>
			#top5 td{
				padding:0 0.5em;
			}
		</style>
</div>

<!--links-->
<hr>
<div style="padding:1em;">LINKS
	<ul>
		<li><a href="https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n">https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n</a>
		<li><a href="https://llumsitaquigrafs.cat/">https://llumsitaquigrafs.cat/</a>
		<li><a href="https://atles.llumsitaquigrafs.cat/">https://atles.llumsitaquigrafs.cat/</a>
		<li><a href="https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a">https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a</a>
	</ul>
</div>

<!--per fer-->
<hr>
<div style="padding:1em;">TASQUES DESENVOLUPAMENT WEB
	<ul>
		<li>Inserció de condemnes
		<li>Inserció de relacions partits-casos
		<li>Inserció de relacions empreses-casos
		<li>casos.php
		<li>persones.php
		<li>partits.php
		<li>empreses.php
		<li>Comprovar noms repetits durant la inserció
	</ul>
</div>
