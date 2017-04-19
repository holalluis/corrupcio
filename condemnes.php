<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#condemnes {
			margin-left:10px;
		}
		#condemnes td {
			padding:0 0.4em;
		}
		#navbar div[pagina=condemnes]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Condemnes
</h1>

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
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			if(mysqli_num_rows($res)==0)
			{
				echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
			}
			while($row=mysqli_fetch_assoc($res))
			{
				$id=$row['id'];
				$anys_de_preso=$row['anys_de_preso'];
				$persona=$row['persona'];
				$cas=$row['cas'];
				echo "<tr>
					<td>
						<a href=condemna.php?id=$id>
							$persona, pel $cas &rarr;
							$anys_de_preso anys
				";
			}
	?>
</table>
