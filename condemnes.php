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
			$sql="
				SELECT 
					condemnes.id,
					condemnes.anys_de_preso,
					persones.nom AS persona,
					casos.nom AS cas
				FROM condemnes,relacions_persona_cas,persones,casos
				WHERE 
					condemnes.relacio_persona_cas_id=relacions_persona_cas.id
					AND relacions_persona_cas.persona_id=persones.id
					AND relacions_persona_cas.cas_id=casos.id
				";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$anys_de_preso=$row['anys_de_preso'];
				$persona=$row['persona'];
				$cas=$row['cas'];
				echo "<tr>
					<td>
						<a href=condemna.php?id=$id>
							$persona &rarr;
							$anys_de_preso anys &mdash;
							pel $cas
				";
			}
	?>
</table>
