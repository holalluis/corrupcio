<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=inici]{color:black}
	</style>
	<style>
		#top5{
			margin-top:10px;
		}
		#top5 td, #top5 th{
			padding:0.3em 0.5em;
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

<hr>

<!--top 5 casos-->
<div>
	<table id=top5>
		<tr><th colspan=3>Top 5
		<?php
			$sql="SELECT * FROM casos ORDER BY espoli DESC LIMIT 5";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$i=1;
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$nom=$row['nom'];
				$espoli=number_format($row['espoli'],0,",",".");
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

</div root>

<!--footer--><?php include'footer.php'?>
