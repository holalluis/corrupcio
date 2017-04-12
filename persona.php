<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id de la persona*/
		$id=$_GET['id'] or die('persona id no especificat');

		//sql query
		$sql="SELECT * FROM persones WHERE id=$id";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		$n=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);

		//si no resultats, fora
		if($n==0){header("location: persones.php");}

		//objecte persona
		$persona=new stdclass;
		$persona->id=$row['id'];
		$persona->nom=$row['nom'];
		$persona->naixement=$row['naixement'];
		$persona->modificacio=$row['modificacio'];
	?>
	<style>
		form {
			display:inline-block;
			vertical-align:top;
		}
		#navbar div[pagina=persones]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>
	Persones &rsaquo; <?php echo $persona->nom ?>
	<?php 
		if($edit_mode)
		{
			?>
			<button onclick="update('persones',<?php echo $persona->id ?>,'nom','<?php echo urlencode($persona->nom) ?>')">edita nom</button> 
			<?php
		}
	?>
</h1>

<ul>
	<!--data de naixement-->
	<li>
		Naixement:
		<?php echo date("d/m/Y",strtotime($persona->naixement)) ?>
		(<?php 
			function getAge($then)
			{
				$then_ts = strtotime($then);
				$then_year = date('Y',$then_ts);
				$age = date('Y') - $then_year;
				if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
				return $age;
			}
			echo getAge($persona->naixement);
		?> anys)

		<!--edita data de naixement-->
		<?php
			if($edit_mode)
			{
				?>
				<button onclick=update('persones',<?php echo $persona->id ?>,'naixement','<?php echo urlencode($persona->naixement) ?>')>edita</button> 
				<?php
			}
		?>
	</li>

	<!--relacions persona cas-->
	<li>
		<?php
			$sql="
				SELECT *,relacions_persona_cas.id AS rel_id 
				FROM relacions_persona_cas,casos 
				WHERE cas_id=casos.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
					$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
					echo "<li>
						<a href=cas.php?id=$cas_id>$nom</a> 
						&mdash; 
						<span class=descripcio>$descripcio</span>
					";
					if($edit_mode)
					{
						echo "
							<button onclick=update('relacions_persona_cas',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita descripció</button> 
							<button onclick=esborra('relacions_persona_cas',$rel_id)>esborra connexió</button>
						";
					}
				}
			?>
			<?php 
				if($edit_mode)
				{ 
					?>
					<li>
						<form method=post action=data/insert/relacio_persona_cas.php>
							<input type=hidden name=persona_id value="<?php echo $persona->id?>">
							<select name=cas_id>
								<?php
									//selecciona casos on la persona no estigui implicada
									$sql="SELECT id,nom FROM casos WHERE id NOT IN (SELECT cas_id FROM relacions_persona_cas WHERE persona_id=$persona->id )";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<button>afegir connexió</button>
						</form>
					</li>
					<?php
				}
			?>
		</ul>
	</li>

	<!--relacions persona partit-->
	<li>
		<?php
			$sql="
				SELECT *,relacions_persona_partit.id AS rel_id 
				FROM relacions_persona_partit,partits 
				WHERE partit_id=partits.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
					$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
					echo "<li>
						<a href=partit.php?id=$partit_id>$nom</a>
						&mdash;
						<span class=descripcio>$descripcio</span>
						";
					if($edit_mode)
					{
						echo "
							<button onclick=update('relacions_persona_partit',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita descripció</button> 
							<button onclick=esborra('relacions_persona_partit',$rel_id)>esborra connexió</button>
						";
					}
				}
			?>
			<?php
				if($edit_mode)
				{ 
					?>
					<li>
						<form method=post action=data/insert/relacio_persona_partit.php>
							<input type=hidden name=persona_id value="<?php echo $persona->id?>">
							<select name=partit_id>
								<?php
									//selecciona partits on la persona no estigui implicada
									$sql="SELECT id,nom FROM partits WHERE id NOT IN (SELECT partit_id FROM relacions_persona_partit WHERE persona_id=$persona->id)";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<button>afegir connexió</button>
						</form>
					</li>
				<?php
				}
			?>
		</ul>
	</li>

	<!--relacions persona empresa-->
	<li>
		<?php
			$sql="
				SELECT *,relacions_persona_empresa.id AS rel_id
				FROM relacions_persona_empresa,empreses 
				WHERE empresa_id=empreses.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
					$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
					echo "<li>
						<a href=empresa.php?id=$empresa_id>$nom</a>
						&mdash;
						<span class=descripcio>$descripcio</span>
						";
					if($edit_mode)
					{
						echo "
							<button onclick=update('relacions_persona_empresa',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita descripció</button> 
							<button onclick=esborra('relacions_persona_empresa',$rel_id)>esborra connexió</button>
						";
					}
				}
			?>
			<?php 
				if($edit_mode)
				{
					?>
					<li>
						<form method=post action=data/insert/relacio_persona_empresa.php>
							<input type=hidden name=persona_id value="<?php echo $persona->id?>">
							<select name=empresa_id>
								<?php
									//selecciona empreses on la persona no estigui implicada
									$sql="SELECT id,nom FROM empreses WHERE id NOT IN (SELECT empresa_id FROM relacions_persona_empresa WHERE persona_id=$persona->id)";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<button>afegir connexió</button>
						</form>
					</li>
					<?php
				}
			?>
		</ul>
	</li>

	<!--condemnes-->
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
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
						<a href=condemna.php?id=$id>$cas &rarr; $anys_de_preso anys de presó</a>
					";
				}
			?>
			<?php
				if($edit_mode)
				{
					?>
					<li>
						<form method=post action=data/insert/condemna.php>
							<input name=persona_id type=hidden value=<?php echo $persona->id?>>
							<table>
								<tr><th>Afegeix condemna<th>Anys de presó<th>Delictes<th>Inici
								<td rowspan=2><button>afegir condemna</button>
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
											$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
					<?php
				}
			?>
		</ul>
	</li>

	<!--data modificació-->
	<li>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($persona->modificacio)) ?>
	</li>

	<!--esborrar-->
	<?php
		if($edit_mode)
		{
			?>
			<li>
				<button onclick=esborra('persones',<?php echo $persona->id ?>)>esborra persona</button>
			</li>
			<?php
		}
	?>
</ul>
