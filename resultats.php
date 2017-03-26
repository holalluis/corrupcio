<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		//processa query
		function error_q(){die("No has buscat res");}
		if(!isset($_GET['q'])){error_q();}
		if(empty($_GET['q'])){error_q();}
		$q=$_GET['q'] or error_q();
	?>
	<style>
		div#root {
			padding-left:1em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Resultats cerca '<?php echo $q?>'</h1>

<?php 	
	//fx general per buscar
	function cerca($taula,$link)
	{
		global $q,$mysql;
		$sql="SELECT id,nom FROM $taula WHERE nom LIKE '%$q%' ORDER BY nom";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		echo "(".mysqli_num_rows($res).")";
		echo "<ul>";
		while($row=mysqli_fetch_assoc($res))
		{
			$id=$row['id'];
			$nom=$row['nom'];
			echo "
				<li> <a href=$link.php?id=$id>$nom</a>
			";
		}
		echo "</ul>";
	}
?>

<div id=root>
	<ul>
		<li>Persones <?php cerca('persones','persona')?></li>
		<li>Casos    <?php cerca('casos','cas')?></li>
		<li>Partits  <?php cerca('partits','partit')?></li>
		<li>Empreses <?php cerca('empreses','empresa')?></li>
	</ul>
</div>
