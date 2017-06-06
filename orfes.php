<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php if(!$edit_mode){header("location:index.php");}?>
	<script>
		function init()
		{
		}
	</script>
</head><body onload=init()>
<?php include'navbar.php'?>

<div id=root>

<h1>Elements orfes de la base de dades (=SOLUCIONAR!)</h1>
<ul>
	<li>
		<h3>1. Persones sense cas de corrupció associat</h3>
		<table>
			<?php
				$sql="
					SELECT p.id, p.nom, rel.id AS cas_id, rel.nom AS cas
					FROM persones AS p
					LEFT JOIN 
						(
							SELECT casos.nom, casos.id, relacions_persona_cas.persona_id
							FROM casos, relacions_persona_cas 
							WHERE casos.id=relacions_persona_cas.cas_id
						) AS rel
					ON p.id=rel.persona_id
					GROUP BY nom
					ORDER BY nom
				";
				$res=$mysql->query($sql) or die(mysqli_error($mysql));
				if(mysqli_num_rows($res)==0) {
					echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
				}
				while($row=mysqli_fetch_assoc($res)) {
					$id=$row['id'];
					$nom=$row['nom'];
					$cas=$row['cas'];

					//només ens interessen els que no tenen cas associat
					if($cas!=""){continue;}
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
	<li>
		<h3>2. Noms repetits</h3>
		<div>per fer</div>
	</li>
</ul>
</div>
