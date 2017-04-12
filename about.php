<!doctype html><html><head>
<?php include'imports.php'?>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Gran Enciclopèdia de la Corrupció</h1>
<h2>About (modificar més endavant)</h2>
<div style="padding-left:10px;max-width:50em;">
	<p style=text-align:justify>
		La Gran Enciclopèdia de la Corrupció va néixer el març del 2017,
		com a exercici de modelització informàtica per posar ordre a 
		totes les dades generades arran de la corrupció política
		durant els últims anys.
		
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
