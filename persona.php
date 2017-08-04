<!doctype html><html><head>
	<?php include'imports.php'?>
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

<div id=root>

<h1>
	<span onclick=window.location='persones.php'>Persones</span> &rsaquo; 
	<?php echo $persona->nom ?>
	<?php 
		if($edit_mode)
		{
			?>
			<button class=update onclick="update('persones',<?php echo $persona->id ?>,'nom','<?php echo urlencode($persona->nom) ?>')">edita</button> 
			<?php
		}
	?>
</h1>

<ul>
	<!--data de naixement-->
	<li class=portrait_marge>
		Naixement:
		<?php echo date("d/m/Y",strtotime($persona->naixement)) ?>
		(<?php 
			function getAge($then) {
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
			if($edit_mode) {
				?>
				<button class=update onclick=update('persones',<?php echo $persona->id ?>,'naixement','<?php echo urlencode($persona->naixement) ?>')>edita</button> 
				<?php
			}
		?>
	</li>

	<!--relacions persona cas-->
	<li>
		<?php
			$sql="
				SELECT 
					relacions_persona_cas.id AS rel_id,
					casos.nom AS nom,
					casos.id AS cas_id,
					relacions_persona_cas.descripcio AS descripcio
				FROM relacions_persona_cas,casos 
				WHERE cas_id=casos.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		<span class=desplegable onclick=qs('#casos').classList.toggle('invisible');>
			Casos relacionats (<?php echo $n ?>)
		</span>
		<ul id=casos>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['rel_id'];
					$nom=$row['nom'];
					$cas_id=$row['cas_id'];
					$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
					echo "
						<li class=item>
						<a href=cas.php?id=$cas_id>$nom</a> 
					";

					echo "
						<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
							$descripcio
						</div>
					";
					if($edit_mode)
					{
						echo "
							<button class=update onclick=update('relacions_persona_cas',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita</button> 
							<button class=update onclick=esborra('relacions_persona_cas',$rel_id)>esborra connexió</button>
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
							Afegir nova connexió amb un cas:
							<input type=hidden name=persona_id value="<?php echo $persona->id?>">
							<select class=update name=cas_id>
								<?php
									//selecciona casos on la persona no estigui implicada
									$sql="SELECT id,nom FROM casos WHERE id NOT IN (SELECT cas_id FROM relacions_persona_cas WHERE persona_id=$persona->id ) ORDER BY nom";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<button class=update>afegir connexió</button>
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
				SELECT 
					relacions_persona_partit.id AS rel_id,
					partits.nom,
					partits.id AS partit_id,
					relacions_persona_partit.descripcio
				FROM relacions_persona_partit,partits 
				WHERE partit_id=partits.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		<span class=desplegable onclick=qs('#partits').classList.toggle('invisible');>
			Partits relacionats (<?php echo $n ?>)
		</span>
		<ul id=partits>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['rel_id'];
					$nom=$row['nom'];
					$partit_id=$row['partit_id'];
					$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
					echo "
						<li class=item>
						<a href=partit.php?id=$partit_id>$nom</a>
					";
					echo "
						<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
							$descripcio
						</div>
					";
					if($edit_mode)
					{
						echo "
							<button class=update onclick=update('relacions_persona_partit',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita</button> 
							<button class=update onclick=esborra('relacions_persona_partit',$rel_id)>esborra connexió</button>
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
							Afegir nova connexió amb un partit:
							<input type=hidden name=persona_id value="<?php echo $persona->id?>">
							<select class=update name=partit_id>
								<?php
									//selecciona partits on la persona no estigui implicada
									$sql="SELECT id,nom FROM partits WHERE id NOT IN (SELECT partit_id FROM relacions_persona_partit WHERE persona_id=$persona->id) ORDER BY nom";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<button class=update>afegir connexió</button>
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
				SELECT 
					relacions_persona_empresa.id AS rel_id,
					empreses.nom,
					empreses.id AS empresa_id,
					relacions_persona_empresa.descripcio
				FROM relacions_persona_empresa,empreses 
				WHERE empresa_id=empreses.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		<span class=desplegable onclick=qs('#empreses').classList.toggle('invisible');>
			Empreses relacionades (<?php echo $n ?>)
		</span>
		<ul id=empreses>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['rel_id'];
					$nom=$row['nom'];
					$empresa_id=$row['empresa_id'];
					$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
					echo "
						<li class=item>
						<a href=empresa.php?id=$empresa_id>$nom</a>
					";
					echo "
						<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
							$descripcio
						</div>
					";
					if($edit_mode)
					{
						echo "
							<button class=update onclick=update('relacions_persona_empresa',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita</button> 
							<button class=update onclick=esborra('relacions_persona_empresa',$rel_id)>esborra connexió</button>
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
							Afegir nova connexió amb una empresa:
							<input type=hidden name=persona_id value="<?php echo $persona->id?>">
							<select class=update name=empresa_id>
								<?php
									//selecciona empreses on la persona no estigui implicada
									$sql="SELECT id,nom FROM empreses WHERE id NOT IN (SELECT empresa_id FROM relacions_persona_empresa WHERE persona_id=$persona->id) ORDER BY nom";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<button class=update>afegir connexió</button>
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
		<span class=desplegable onclick=qs('#condemnes').classList.toggle('invisible');>
			Condemnes rebudes (<?php echo $n?>)
		</span>
		<ul id=condemnes>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$anys_de_preso=$row['anys_de_preso'];
					$cas=$row['cas'];
					echo "
						<li class=item>
						<a href=condemna.php?id=$id>$cas &rarr; $anys_de_preso anys de presó</a>
					";
				}
			?>
			<?php
				//afegir condemna
				if($edit_mode) {
					?>
					<li>
						<div>
							Afegir nova condemna:
						</div>
						<form class=update method=post action=data/insert/condemna.php>
							<input name=persona_id type=hidden value=<?php echo $persona->id?>>
							<table>
								<tr>
									<th>Cas
									<td><select name=relacio_persona_cas_id>
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
								</tr>
								<tr><th>Anys de presó<td><input name=anys_de_preso placeholder="Anys de presó">
								<tr><th>Descripció<td><textarea name=delictes placeholder="Descripció"></textarea>
								<tr><th>Inici<td><input name=any placeholder="Any" value="<?php echo date("Y")?>">
								<tr><td colspan=2 style=text-align:center><button>afegir condemna</button>
							</table>
						</form>
					</li>
					<?php
				}
			?>
		</ul>
	</li>

	<!--data modificació-->
	<li class=ultima_modificacio>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($persona->modificacio)) ?>
	</li>

	<!--esborra persona-->
	<?php
		if($edit_mode) {
			?>
			<li>
				<button class=update onclick=esborra('persones',<?php echo $persona->id ?>)>esborra persona (perill!)</button>
			</li>
			<?php
		}
	?>
</ul>

</div>
