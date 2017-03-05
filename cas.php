<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id del cas de corrupció*/
		$id=$_GET['id'] or die('cas id no especificat');

		//objecte cas
		$sql="SELECT * FROM casos WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$row=mysqli_fetch_assoc($res);
		$cas=new stdclass;
		$cas->id=$row['id'];
		$cas->nom=$row['nom'];
		$cas->espoli=$row['espoli'];
		$cas->any=$row['any'];
		$cas->estat=$row['estat'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Casos de Corrupció &rsaquo; <?php echo $cas->nom ?></h1>

<ul>
	<li>
		Any: 
		<?php echo $cas->any ?> 
		<button onclick="update('casos','<?php echo $cas->id ?>','any')">modifica</button>
	</li>
	<li>
		Espoli: 
		<?php echo $cas->espoli ?> euros 
		<button onclick="update('casos','<?php echo $cas->id ?>','espoli')">modifica</button>
	</li>
	<li>
		Estat: 
		<?php 
			if($cas->estat=="")
			{
				echo "<span>no definit</span>";
			}
			else {
				echo $cas->estat;
			}
		?>
			
		<button onclick="update('casos','<?php echo $cas->id ?>','estat')">modifica</button>
	</li>
	<li>
		Persones implicades
		<?php
			$sql="SELECT * FROM relacions_persona_cas,persones WHERE persona_id=persones.id AND cas_id=$cas->id";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			echo "(".mysqli_num_rows($res).")";
			echo "<ul>";
			while($row=mysqli_fetch_assoc($res))
			{
				$nom=$row['nom'];
				$persona_id=$row['persona_id'];
				echo "<li><a href=persona.php?id=$persona_id>$nom</a>";
			}
		?>
			<li>
				<form method=post action=data/insert/relacio_persona_cas.php>
					<select name=persona_id>
						<?php
							//busca persones no implicades en el cas
							$sql="
								SELECT id, nom 
								FROM persones
								WHERE id NOT IN (SELECT persona_id FROM relacions_persona_cas WHERE cas_id = $cas->id)
								ORDER BY nom
							";
							$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
							while($row=mysqli_fetch_assoc($res))
							{
								$id=$row['id'];
								$nom=$row['nom'];
								echo "<option value=$id>$nom";
							}
						?>
					</select>
					<input name=cas_id type=hidden value=<?php echo $cas->id?>>
					<button>afegir</button>
				</form>
			</li>
		</ul>
	</li>
	<li>
		Condemnes pel cas
			<?php
				$sql="
					SELECT nom,anys_de_preso,any,persona_id
					FROM condemnes, persones, relacions_persona_cas 
					WHERE 
						condemnes.relacio_persona_cas_id=relacions_persona_cas.id 
						AND relacions_persona_cas.persona_id=persones.id
						AND relacions_persona_cas.cas_id=$cas->id
					";
				$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
				echo "(".mysqli_num_rows($res).")";
				echo "<ul>";
				while($row=mysqli_fetch_assoc($res))
				{
					$nom=$row['nom'];
					$anys_de_preso=$row['anys_de_preso'];
					$any=$row['any'];
					$persona_id=$row['persona_id'];
					echo "<li>$nom: $anys_de_preso any/s de presó";
				}
			?>
			<li>
				<form method=post action=data/insert/condemna.php>
					<input name=cas_id type=hidden value=<?php echo $cas->id?>>
					<table>
						<tr><th>Afegeix condemna<th>Anys de presó<th>Inici
						<td rowspan=2><button>afegeix</button>
						<tr><td>
							<select name=relacio_persona_cas_id>
								<?php
									$sql="SELECT relacions_persona_cas.id,nom
										FROM relacions_persona_cas,persones
										WHERE 
											relacions_persona_cas.persona_id=persones.id
											AND
											cas_id=$cas->id 
										ORDER BY nom
										";
									$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
						<td><input name=anys_de_preso placeholder="Anys de presó">
						<td><input name=any placeholder="Any" value="<?php echo date("Y")?>">
					</table>
				</form>
			</li>
		</ul>
	</li>
	<li>
		Partits implicats #TODO
	</li>
	<li>
		Empreses implicades #TODO
	</li>
</ul>
