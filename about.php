<!doctype html><html><head>
	<?php include'imports.php' ?>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Gran Enciclopèdia de la Corrupció</h1>
<h2>About (modificar més endavant)</h2>
<div style="padding-left:1.5em;max-width:50em;">
	<p>
		La Gran Enciclopèdia de la Corrupció va néixer el març del 2017.
		És un pur exercici de modelització informàtica, 
		la qual es basa en modelar fenomens utilitzant estructures de dades.
		
		<br><br>

		El model consta de 4 taules principals:
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
		
		Els llenguatges de programació utilitzats han sigut:
		<ul>
			<li>PHP
			<li>MySQL
			<li>Javascript
			<li>HTML/CSS
		</ul>
	</p>
</div>

<!--footer--><?php include'footer.php'?>
