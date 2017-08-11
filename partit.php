<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		/*INPUT: id del partit*/
		$id=$_GET['id'] or die('partit id no especificat');

		//sql query
		$sql="SELECT * FROM partits WHERE id=$id";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		$n=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);

		//si no resultats, fora
		if($n==0){header("location: partits.php");}

		//objecte partit
		$partit=new stdclass;
		$partit->id=$row['id'];
		$partit->nom=$row['nom'];
		$partit->nom_llarg=$row['nom_llarg'];
		$partit->modificacio=$row['modificacio'];
		$partit->descripcio=$row['descripcio'];
	?>
	<style>
		#navbar div[pagina=partits]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<h1>
	<span onclick=window.location='partits.php'>Partits</span> &rsaquo; <?php echo $partit->nom ?>
	<?php 
		if($edit_mode) {
			?>
			<button class=update onclick="update('partits',<?php echo $partit->id ?>,'nom','<?php echo urlencode($partit->nom) ?>')">edita</button> 
			<?php
		}
	?>
</h1>

<ul>
	<!--descripció-->
	<li class=portrait_marge>
		<?php 
			if(trim($partit->descripcio)=="") {
				echo "<i class=blanc>no hi ha descripció</i>";
			}
			else {
				echo "
					<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
						$partit->descripcio
					</div>
				";
			}
			if($edit_mode) { 
				?>
				<button class=update onclick="update('partits','<?php echo $partit->id ?>','descripcio','<?php echo urlencode($partit->descripcio) ?>')">
					edita
				</button>
				<?php 
			} 
		?>
	</li>

	<!--nom sencer-->
	<li class=portrait_marge>
		Nom sencer: 
		<span class=descripcio>
			<?php echo $partit->nom_llarg ?>
		</span>
		<?php 
			if($edit_mode) { 
				?>
				<button class=update onclick="update('partits','<?php echo $partit->id ?>','nom_llarg','<?php echo urlencode($partit->nom_llarg) ?>')">
					edita
				</button>
				<?php 
			} 
		?>
	</li>

	<!--persones relacionades-->
	<li>
		<?php
			$sql="
				SELECT rel.id, rel.persona_id, rel.descripcio, persones.nom AS persona
				FROM relacions_persona_partit AS rel, persones 
				WHERE 
					rel.persona_id=persones.id 
					AND rel.partit_id=$partit->id
				ORDER BY nom
				";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		<span class=desplegable onclick=qs('#persones_relacionades').classList.toggle('invisible');>
			Persones relacionades (<?php echo $n ?>)
		</span>
		<ul id=persones_relacionades>
			<?php //si no hi ha elements
				if($n==0){ ?><li class="item blanc">no hi ha resultats</li><?php }
			?>
			<?php
				while($row=mysqli_fetch_assoc($res)) {
					$rel_id=$row['id'];
					$persona=$row['persona'];
					$persona_id=$row['persona_id'];
					$descripcio=$row['descripcio']=="" ? "<i class=blanc>no hi ha descripció</i>" : $row['descripcio'];
					echo "
						<li class=item>
						<a href=persona.php?id=$persona_id>$persona</a>
					";

					echo "
						<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
							$descripcio
						</div>
					";

					if($edit_mode) {
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
							Afegir nova connexió amb una persona:
							<select class=update name=persona_id>
								<?php
									//busca persones no relacionades amb el partit
									$sql="
										SELECT id, nom 
										FROM persones
										WHERE id NOT IN (SELECT persona_id FROM relacions_persona_partit WHERE partit_id = $partit->id)
										ORDER BY nom
									";
									$res=$mysql->query($sql) or die(mysqli_error($mysql));
									while($row=mysqli_fetch_assoc($res))
									{
										$id=$row['id'];
										$nom=$row['nom'];
										echo "<option value=$id>$nom";
									}
								?>
							</select>
							<input name=partit_id type=hidden value=<?php echo $partit->id?>>
							<button class=update>afegir connexió</button>
						</form>
					</li>
					<?php
				}
			?>
		</ul>
	</li>

	<!--relacions persona-partit * persona-cas-->
	<li>
		<?php
			//busca casos relacionats amb les persones relacionades
			$sql="
				SELECT 
					casos.id AS cas_id,
					casos.nom AS cas,
					persones.nom AS persona
				FROM 
					relacions_persona_partit AS rel_pp,
					relacions_persona_cas    AS rel_pc, 
					casos,
					persones
				WHERE
					rel_pp.partit_id  = $partit->id AND
					rel_pp.persona_id = rel_pc.persona_id AND
					casos.id          = rel_pc.cas_id  AND
					persones.id       = rel_pc.persona_id
				GROUP BY cas
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		<span class=desplegable onclick=qs('#casos').classList.toggle('invisible');>
			Casos relacionats (<?php echo $n ?>)
		</span>
		<ul id=casos>
			<?php //si no hi ha elements
				if($n==0){ ?><li class="item blanc">no hi ha resultats</li><?php }
			?>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$cas_id=$row['cas_id'];
					$cas=$row['cas'];
					echo "
						<li class=item>
						<a href=cas.php?id=$cas_id>$cas</a>
					";
				}
			?>
		</ul>
	</li>

	<!--relacions persona-partit * persona-empresa-->
	<li>
		<?php
			//busca empreses relacionades amb les persones relacionades
			$sql="
				SELECT 
					empreses.id  AS empresa_id,
					empreses.nom AS empresa,
					persones.nom AS persona
				FROM 
					relacions_persona_partit  AS rel_pp,
					relacions_persona_empresa AS rel_pe, 
					empreses,
					persones
				WHERE
					rel_pp.partit_id  = $partit->id       AND
					rel_pp.persona_id = rel_pe.persona_id AND
					empreses.id       = rel_pe.empresa_id AND
					persones.id       = rel_pe.persona_id
				GROUP BY empresa
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		<span class=desplegable onclick=qs('#empreses').classList.toggle('invisible');>
			Empreses relacionades (<?php echo $n ?>)
		</span>
		<ul id=empreses>
			<?php //si no hi ha elements
				if($n==0){ ?><li class="item blanc">no hi ha resultats</li><?php }
			?>
			<?php
				while($row=mysqli_fetch_assoc($res)) {
					$empresa_id=$row['empresa_id'];
					$empresa=$row['empresa'];
					echo "
						<li class=item> 
						<a href=empresa.php?id=$empresa_id>$empresa</a>
					";
				}
			?>
		</ul>
	</li>

	<!--data modificació-->
	<li class=ultima_modificacio>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($partit->modificacio)) ?>
	</li>
	 
	<!--esborra partit-->
	<?php
		if($edit_mode) {
			?>
			<li>
			  <button class=update onclick=esborra('partits',<?php echo $partit->id ?>)>esborra partit (perill!)</button>
			</li>
			<?php
		}
	?>
</ul>

</div>
