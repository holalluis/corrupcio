<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		/* INPUT: id del partit*/
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
	?>
	<style>
		#navbar div[pagina=partits]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>
	<span onclick=window.location='partits.php'>Partits</span> &rsaquo; <?php echo $partit->nom ?>
	<?php 
		if($edit_mode)
		{
			?>
			<button onclick="update('partits',<?php echo $partit->id ?>,'nom','<?php echo urlencode($partit->nom) ?>')">edita nom</button> 
			<?php
		}
	?>
</h1>

<ul>
	<li>Nom sencer: <?php echo $partit->nom_llarg ?>
		<?php 
			if($edit_mode)
			{ 
				?>
				<button onclick="update('partits','<?php echo $partit->id ?>','nom_llarg','<?php echo urlencode($partit->nom_llarg) ?>')">modifica</button>
				<?php 
			} 
		?>
	</li>

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
		Persones relacionades (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['id'];
					$persona=$row['persona'];
					$persona_id=$row['persona_id'];
					$descripcio=$row['descripcio']=="" ? "<i style=color:#ccc>no hi ha descripció</i>" : $row['descripcio'];
					echo "<li>
						<a href=persona.php?id=$persona_id>$persona</a>
						&mdash;
						<span class=descripcio>$descripcio</span>
					";
					if($edit_mode)
					{
						echo "
							<button onclick=update('relacions_persona_partit',$rel_id,'descripcio','".urlencode($row['descripcio'])."')>edita descripció</button> 
							<button onclick=esborra('relacions_persona_partit',$rel_id)>esborra</button>
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
							<select name=persona_id>
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
							<button>afegir</button>
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
		Casos relacionats (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$cas_id=$row['cas_id'];
					$cas=$row['cas'];
					echo "<li> 
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
		Empreses relacionades (<?php echo $n ?>)
		<ul>
		<?php
			while($row=mysqli_fetch_assoc($res))
			{
				$empresa_id=$row['empresa_id'];
				$empresa=$row['empresa'];
				echo "<li> 
					<a href=empresa.php?id=$empresa_id>$empresa</a>
				";
			}
		?>
		</ul>
	</li>

	<!--data modificació-->
	<li>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($partit->modificacio)) ?>
	</li>
	 
	<!--esborrar-->
	<?php
		if($edit_mode)
		{
			?>
			<li>
			  <button onclick=esborra('partits',<?php echo $partit->id ?>)>esborra partit</button>
			</li>
			<?php
		}
	?>
</ul>

