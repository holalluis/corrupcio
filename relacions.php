<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		div#root {
			padding-left:30px;
		}
		table[id^="relacions"]{
			margin-bottom:1em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>
<!--titol--><h1>Connexions entre persones, casos, partits i empreses</h1>

<div id=root>

<h3>Persona-cas</h3>
<table id=relacions_persona_cas>
	<?php
			$sql=
			"
				SELECT *, persones.nom AS persona, casos.nom AS cas 
				FROM relacions_persona_cas AS rel, persones , casos
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.cas_id = casos.id
				ORDER BY persones.nom
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$cas=$row['cas'];
				echo "<tr><td>$persona<td>&rarr;<td>$cas";
			}
	?>
</table>

<h3>Persona-partit</h3>
<table id=relacions_persona_partit>
	<?php
			$sql=
			"
				SELECT *, persones.nom AS persona, partits.nom AS partit 
				FROM relacions_persona_partit AS rel, persones , partits
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.partit_id = partits.id
				ORDER BY persones.nom
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$partit=$row['partit'];
				echo "<tr><td>$persona<td>&rarr;<td>$partit";
			}
	?>
</table>

<h3>Persona-empresa</h3>
<table id=relacions_persona_empresa>
	<?php
			$sql=
			"
				SELECT *, persones.nom AS persona, empreses.nom AS empresa 
				FROM relacions_persona_empresa AS rel, persones , empreses
				WHERE 
					rel.persona_id = persones.id
					AND
					rel.empresa_id = empreses.id
				ORDER BY persones.nom
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$empresa=$row['empresa'];
				echo "<tr><td>$persona<td>&rarr;<td>$empresa";
			}
	?>
</table>

</div>
