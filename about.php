<!doctype html><html><head>
	<?php include'imports.php' ?>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Gran Enciclopèdia de la Corrupció</h1>
<h2>About</h2>
<div style="padding-left:1em;max-width:50em;margin:0 auto">
	<p>
		La Gran Enciclopèdia de la Corrupció 
		va néixer el març del 2017 
		amb l'ànim de ser una font d'informació útil pels ciutadans.

		La web és un pur exercici de modelització informàtica, 
		la qual es basa en modelar fenomens o processos utilitzant estructures de dades.
		
		<br><br>

		El model (creat amb MySQL) consta de 4 taules principals:
		<ul>
			<li>Persones
			<li>Casos
			<li>Partits
			<li>Empreses
		</ul>

		A més, existeixen 4 taules addicionals amb informació relacionada amb les 4 primeres:
		<ul>
			<li>Condemnes
			<li>Relacions Persona-Cas
			<li>Relacions Partit-Cas
			<li>Relacions Empresa-Cas
		</ul>
	</p>
</div>

<!--footer--><?php include'footer.php'?>
