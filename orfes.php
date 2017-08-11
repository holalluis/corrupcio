<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php if(!$edit_mode){header("location:index.php");}?>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<h1>Elements orfes de la base de dades (=SOLUCIONAR!)</h1>

<div class=portrait_marge> 
<ul>
	<li>
		<h3>Persones sense cas de corrupció associat</h3>
		<table>
			<?php
				$sql="
					SELECT p.id, p.nom
					FROM persones AS p
					WHERE p.id NOT IN ( SELECT persona_id FROM relacions_persona_cas )
					ORDER BY p.nom
				";
				$res=$mysql->query($sql) or die(mysqli_error($mysql));
				if(mysqli_num_rows($res)==0) {
					echo "<tr><td><span class=blanc style=color:green>no hi ha resultats: Totes les persones tenen un cas associat :)</span>";
				}
				while($row=mysqli_fetch_assoc($res)) {
					$id=$row['id'];
					$nom=$row['nom'];

					echo "<tr><td><a href=persona.php?id=$id>$nom</a>";
					?>
						<td>
							<form method=post action=data/insert/relacio_persona_cas.php>
								<input type=hidden name=persona_id value="<?php echo $id?>">
								<select class=update name=cas_id>
									<?php
										//selecciona casos on la persona no estigui implicada
										$sql="SELECT id,nom FROM casos WHERE id NOT IN (SELECT cas_id FROM relacions_persona_cas WHERE persona_id=$id ) ORDER BY nom";
										$ress=$mysql->query($sql) or die(mysqli_error($mysql));
										while($roww=mysqli_fetch_assoc($ress)) {
											$cas_id=$roww['id'];
											$cas_nom=$roww['nom'];
											echo "<option value=$cas_id>$cas_nom";
										}
									?>
								</select>
								<button class=update>afegir connexió amb el cas seleccionat</button>
							</form>
						</td>
					<?php
				}
			?>
		</table>
	</li>

	<!--per fer-->
	<li>Casos de corrupció sense persones vinculades
		<div>[per fer]</div>
	</li>
	<li>Partits sense persones vinculades
		<div>[per fer]</div>
	</li>
	<li>Empreses sense persones vinculades
		<div>[per fer]</div>
	</li>
	<li>
		Noms repetits (casos,persones,partits,empreses)
		<div>[per fer]</div>
	</li>
</ul>
</div>

</div>
