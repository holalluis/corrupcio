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
			padding-left:10px;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Resultats cerca '<?php echo $q?>'</h1>

<?php 	
	function norm($str) {
		//canvia accents pel caràcter '%' (wildcard per qualsevol nombre de caràcters a mysql)
		$replace = array(
				'à' => '%', 'á' => '%', 'À' => '%', 'Á' => '%',
				'è' => '%', 'é' => '%', 'È' => '%', 'É' => '%',
				'ì' => '%', 'í' => '%', 'Ì' => '%', 'Í' => '%',
				'ò' => '%', 'ó' => '%', 'Ò' => '%', 'Ó' => '%',
				'ù' => '%', 'u' => '%', 'Ù' => '%', 'Ú' => '%',
		);
		return strtr($str,$replace);
	}

	//funcio general per buscar
	function cerca($taula,$link) {
		global $q,$mysql;
		$q=norm($q);
		$sql="
			SELECT id,nom 
			FROM $taula 
			WHERE 
				REPLACE( REPLACE( REPLACE(
				REPLACE( REPLACE( REPLACE(
				REPLACE( 
				REPLACE(nom,'à','a'),'á','a'),'è','e'),'é','e'),'í','i'),'ò','o'),'ó','o'),'ú','u')
			LIKE '%$q%' ORDER BY nom ";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		echo "(".mysqli_num_rows($res).")";
		echo "<ul>";
		while($row=mysqli_fetch_assoc($res)) {
			$id=$row['id'];
			$nom=$row['nom'];
			echo "<li><a href=$link.php?id=$id>$nom</a>";
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
