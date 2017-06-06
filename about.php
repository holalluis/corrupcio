<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#root {
			font-size:11px;
		}
		/*posa marges quant la pantalla és ampla*/
		@media only screen and (min-width:560px) { 
			#root {
				margin-left:10px;
				margin-right:5px;
			}
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol--><h1>Enciclopèdia de la corrupció</h1>

<h3>Quant a</h3>

	<div>
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
		<br>
		A més, existeixen 4 taules addicionals amb informació relacionada amb les 4 primeres:
		<ul>
			<li>Condemnes
			<li>Relacions Persona-Cas
			<li>Relacions Partit-Cas
			<li>Relacions Empresa-Cas
		</ul>
		<br>
		Els llenguatges de programació utilitzats són:
		<ul>
			<li>PHP
			<li>MySQL
			<li>Javascript
			<li>HTML/CSS
		</ul>
	</div>
</div>

<!--footer--><?php include'footer.php'?>
