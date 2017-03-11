<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id de la persona*/
		$id=$_GET['id'] or die('persona id no especificat');

		//sql query
		$sql="SELECT * FROM persones WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$n=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);

		//si no resultats, fora
		if($n==0){header("location: persones.php");}

		//objecte persona
		$persona=new stdclass;
		$persona->id=$row['id'];
		$persona->nom=$row['nom'];
		$persona->naixement=$row['naixement'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
		form {
			display:inline-block;
			vertical-align:top;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Persones &rsaquo; <?php echo $persona->nom ?></h1>

<ul>
	<li>
		Naixement:
		<?php echo $persona->naixement ?>
		(edat: 
		<?php 
			function getAge($then){
				$then_ts = strtotime($then);
				$then_year = date('Y',$then_ts);
				$age = date('Y') - $then_year;
				if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
				return $age;
			}
			echo getAge($persona->naixement);
		?>)
	</li>
	<li>
		<?php
			$sql="
				SELECT *,relacions_persona_cas.id AS rel_id 
				FROM relacions_persona_cas,casos 
				WHERE cas_id=casos.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Casos relacionats (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['rel_id'];
					$nom=$row['nom'];
					$cas_id=$row['cas_id'];
					echo "<li>
						<a href=cas.php?id=$cas_id>$nom</a>
						<button onclick=esborra('relacions_persona_cas',$rel_id)>esborra</button>
					";
				}
			?>
			<li>
				<form method=post action=data/insert/relacio_persona_cas.php>
					<input type=hidden name=persona_id value="<?php echo $persona->id?>">
					<select name=cas_id>
						<?php
							//selecciona casos on la persona no estigui implicada
							$sql="SELECT id,nom FROM casos WHERE id NOT IN (SELECT cas_id FROM relacions_persona_cas WHERE persona_id=$persona->id )";
							$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
							while($row=mysqli_fetch_assoc($res))
							{
								$id=$row['id'];
								$nom=$row['nom'];
								echo "<option value=$id>$nom";
							}
						?>
					</select>
					<button>afegir</button>
				</form>
			</li>
		</ul>
	</li>
	<li>
		<?php
			$sql="
				SELECT *,relacions_persona_partit.id AS rel_id 
				FROM relacions_persona_partit,partits 
				WHERE partit_id=partits.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Partits relacionats (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['rel_id'];
					$nom=$row['nom'];
					$partit_id=$row['partit_id'];
					echo "<li>
						<a href=partit.php?id=$partit_id>$nom</a>
						<button onclick=esborra('relacions_persona_partit',$rel_id)>esborra</button>
						";
				}
			?>
			<li>
				<form method=post action=data/insert/relacio_persona_partit.php>
					<input type=hidden name=persona_id value="<?php echo $persona->id?>">
					<select name=partit_id>
						<?php
							//selecciona partits on la persona no estigui implicada
							$sql="SELECT id,nom FROM partits WHERE id NOT IN (SELECT partit_id FROM relacions_persona_partit WHERE persona_id=$persona->id)";
							$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
							while($row=mysqli_fetch_assoc($res))
							{
								$id=$row['id'];
								$nom=$row['nom'];
								echo "<option value=$id>$nom";
							}
						?>
					</select>
					<button>afegir</button>
				</form>
			</li>
		</ul>
	</li>
	<li>
		<?php
			$sql="
				SELECT *,relacions_persona_empresa.id AS rel_id
				FROM relacions_persona_empresa,empreses 
				WHERE empresa_id=empreses.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Empreses relacionades (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['rel_id'];
					$nom=$row['nom'];
					$empresa_id=$row['empresa_id'];
					echo "<li>
						<a href=empresa.php?id=$empresa_id>$nom</a>
						<button onclick=esborra('relacions_persona_empresa',$rel_id)>esborra</button>
						";
				}
			?>
			<li>
				<form method=post action=data/insert/relacio_persona_empresa.php>
					<input type=hidden name=persona_id value="<?php echo $persona->id?>">
					<select name=empresa_id>
						<?php
							//selecciona empreses on la persona no estigui implicada
							$sql="SELECT id,nom FROM empreses WHERE id NOT IN (SELECT empresa_id FROM relacions_persona_empresa WHERE persona_id=$persona->id)";
							$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
							while($row=mysqli_fetch_assoc($res))
							{
								$id=$row['id'];
								$nom=$row['nom'];
								echo "<option value=$id>$nom";
							}
						?>
					</select>
					<button>afegir</button>
				</form>
			</li>
		</ul>
	</li>
	<li>
		<?php
			$sql="
			SELECT condemnes.id, condemnes.anys_de_preso, casos.nom AS cas
			FROM condemnes, relacions_persona_cas AS rel, casos
			WHERE 
				condemnes.relacio_persona_cas_id = rel.id
				AND rel.cas_id = casos.id
				AND rel.persona_id = $persona->id
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Condemnes rebudes (<?php echo $n?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$anys_de_preso=$row['anys_de_preso'];
					$cas=$row['cas'];
					echo "<li>
						<span>$cas &rarr; $anys_de_preso any/s de presó</span>
						<button onclick=esborra('condemnes',$id)>esborra</button>";
				}
			?>
			<li>
				<form method=post action=data/insert/condemna.php>
					<input name=persona_id type=hidden value=<?php echo $persona->id?>>
					<table>
						<tr><th>Afegeix condemna<th>Anys de presó<th>Delictes<th>Inici
						<td rowspan=2><button>afegir</button>
						<tr><td>
							<select name=relacio_persona_cas_id>
								<?php
									//casos relacionts amb la persona
									$sql="
										SELECT rel.id, casos.nom AS cas
										FROM relacions_persona_cas AS rel, casos
										WHERE 
											rel.cas_id=casos.id
											AND rel.persona_id=$persona->id 
										ORDER BY cas
										";
									$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$cas=$row['cas'];
										echo "<option value=$id>$cas";
									}
								?>
							</select>
						<td><input name=anys_de_preso placeholder="Anys de presó">
						<td><textarea name=delictes placeholder="Delictes"></textarea>
						<td><input name=any placeholder="Any" value="<?php echo date("Y")?>">
					</table>
				</form>
			</li>
		</ul>
	</li>
</ul>

<ul>
	<li><button onclick=esborra('persones',<?php echo $persona->id ?>)>esborra persona</button>
</ul>
