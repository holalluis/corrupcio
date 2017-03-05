<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		#condemnes {
			margin-left:2em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Condemnes</h1>

<!--resum-->
<table id=condemnes>
	<?php
			$sql="SELECT 
					persones.nom AS persona,
					persones.id AS persona_id,
					casos.nom AS cas,
					anys_de_preso,
					condemnes.any AS any
				FROM condemnes,relacions_persona_cas,persones,casos
				WHERE 
					condemnes.relacio_persona_cas_id=relacions_persona_cas.id
					AND relacions_persona_cas.persona_id=persones.id
					AND relacions_persona_cas.cas_id=casos.id
				";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				$cas=$row['cas'];
				$anys_de_preso=$row['anys_de_preso'];
				$any=$row['any'];
				echo "<tr>
					<td><a href=persona.php?id=$persona_id>$persona</a>
					<td>$cas
					<td>$anys_de_preso anys de presó
					<td>Inici: $any
				";

			}
	?>
</table>
