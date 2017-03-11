<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		$q=$_GET['q'] or die('no has buscat res');
	?>
	<style>
		h1{
			padding:0.5em;
		}
		div#root {
			padding-left:1em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Resultats cerca "<?php echo $q?>"</h1>

<div id=root>
	En desenvolupament
	<ul>
		<!--Persones-->
		<li>
			Persones (0)
		</li>
		<!--Casos-->
		<li>
			Casos (0)
		</li>
		<!--Partits-->
		<li>
			Partits (0)
		</li>
		<!--Empreses-->
		<li>
			Empreses (0)
		</li>
	</ul>
</div>
