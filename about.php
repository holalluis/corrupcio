<!doctype html><html><head>
	<?php include'imports.php'?>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Quant a
</h1>

<div class=portrait_marge>
	<div style="color:#545454" class=descripcio>
		<p>
			L'Enciclopèdia de la Corrupció va néixer el març del 2017
			com a exercici de modelització informàtica amb l'objectiu d'aproximar (des d'un punt de
			vist datacèntric) les dades generades pels mitjans de comunicació relacionades amb 
			els casos de corrupció política públicats en els els últims anys.
		</p>
		<p>
			El model (és a dir, l'estructura de la base de dades) consta de 4 taules principals:
		</p>
		<ul>
			<li>1. Persones
			<li>2. Casos
			<li>3. Partits
			<li>4. Empreses
		</ul>
		<p>
			A més, existeixen 4 taules addicionals amb informació relacionada amb les 4 primeres:
		</p>
		<ul>
			<li>5. Condemnes
			<li>6. Relacions Persona-Cas
			<li>7. Relacions Partit-Cas
			<li>8. Relacions Empresa-Cas
		</ul>
		<p>
			Els llenguatges de programació que fan funcionar la web són:
		</p>
		<ul>
			<li>- PHP
			<li>- HTML/CSS
			<li>- Javascript
			<li>- MySQL
		</ul>
		<!--link github-->
		<p>
			El codi font de la web es pot trobar aquí: 
			<a href=https://github.com/holalluis/corrupcio target=_blank>github</a>
		</p>
		<!--links
		-->
		<div><h3>Links (provisional)</h3>
			<ul>
				<li><a target=_blank href="https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n">
				15mpedia.org/wiki/[...]</a>
				<li><a target=_blank href="https://llumsitaquigrafs.cat/">llumsitaquigrafs.cat/</a>
				<li><a target=_blank href="https://atles.llumsitaquigrafs.cat/">atles.llumsitaquigrafs.cat/</a>
				<li><a target=_blank href="https://es.wikipedia.org/wiki/Anexo:Casos_judiciales_relacionados_con_corrupci%C3%B3n_pol%C3%ADtica_en_Espa%C3%B1a">
				es.wikipedia.org/[...]</a>
			</ul>
		</div>
	</div>
</div>

</div>

<!--footer--><?php include'footer.php'?>
