<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		/* INPUT: id empresa */
		$id=$_GET['id'] or die('empresa id no especificat');

		//sql query
		$sql="SELECT * FROM empreses WHERE id=$id";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		$n=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);

		//si no resultats, fora
		if($n==0){header("location: empreses.php");}

		//objecte empresa
		$empresa=new stdclass;
		$empresa->id=$row['id'];
		$empresa->nom=$row['nom'];
		$empresa->modificacio=$row['modificacio'];
		$empresa->descripcio=$row['descripcio'];
	?>
	<style>
		#navbar div[pagina=empreses]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>
	<span onclick=window.location='empreses.php'>Empreses</span> &rsaquo; <?php echo $empresa->nom ?>
	<?php 
		if($edit_mode)
		{
			?>
			<button onclick="update('empreses',<?php echo $empresa->id ?>,'nom','<?php echo urlencode($empresa->nom) ?>')">edita nom</button> 
			<?php
		}
	?>
</h1>

<ul>
	<!--descripció-->
	<li>
		Descripció: 
		<p>
			<?php 
				if(trim($empresa->descripcio)=="")
				{
					echo "<i style=color:#ccc>no hi ha descripció</i>";
				}
				else
				{
					echo $empresa->descripcio;
				}
			?>
		</p>
		<?php if($edit_mode){ ?>
			<button onclick="update('empreses','<?php echo $empresa->id ?>','descripcio','<?php echo urlencode($empresa->descripcio) ?>')">edita descripció</button>
		<?php } ?>
	</li>

	<!--persones relacionades-->
	<li>
		<?php
			$sql="
				SELECT rel.id, rel.persona_id, rel.descripcio, persones.nom AS persona
				FROM relacions_persona_empresa AS rel, persones 
				WHERE 
					rel.persona_id=persones.id 
					AND rel.empresa_id=$empresa->id
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
							<select name=persona_id>
								<?php
									//busca persones no relacionades l'empresa
									$sql="
										SELECT id, nom 
										FROM persones
										WHERE id NOT IN (SELECT persona_id FROM relacions_persona_empresa WHERE empresa_id = $empresa->id)
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
							<input name=empresa_id type=hidden value=<?php echo $empresa->id?>>
							<button>afegir connexió</button>
						</form>
					</li>
					<?php
				}
			?>
		</ul>
	</li>
	<!--relacions persona-empresa * persona-cas-->
	<li>
		<?php
			//busca casos relacionats amb les persones relacionades
			$sql="
				SELECT 
					casos.id AS cas_id,
					casos.nom AS cas,
					persones.nom AS persona
				FROM 
					relacions_persona_empresa AS rel_pe,
					relacions_persona_cas     AS rel_pc, 
					casos,
					persones
				WHERE
					rel_pe.empresa_id = $empresa->id      AND
					rel_pe.persona_id = rel_pc.persona_id AND
					casos.id          = rel_pc.cas_id     AND
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
	<!--relacions persona-empresa * persona-partit-->
	<li>
		<?php
			//busca partits relacionats amb les persones relacionades
			$sql="
				SELECT 
					partits.id AS partit_id,
					partits.nom AS partit,
					persones.nom AS persona
				FROM 
					relacions_persona_empresa AS rel_pe,
					relacions_persona_partit  AS rel_pp, 
					partits,
					persones
				WHERE
					rel_pe.empresa_id = $empresa->id      AND
					rel_pe.persona_id = rel_pp.persona_id AND
					partits.id        = rel_pp.partit_id  AND
					persones.id       = rel_pp.persona_id
				GROUP BY partit
			";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Partits relacionats (<?php echo $n ?>)
		<ul>
		<?php
			while($row=mysqli_fetch_assoc($res))
			{
				$partit_id=$row['partit_id'];
				$partit=$row['partit'];
				echo "<li> 
					<a href=partit.php?id=$partit_id>$partit</a>
				";
			}
		?>
		</ul>
	</li>

	<!--data modificació-->
	<li>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($empresa->modificacio)) ?>
	</li>

	<!--esborrar-->
	<?php
		if($edit_mode)
		{
			?>
			<li>
				<button onclick=esborra('empreses',<?php echo $empresa->id ?>)>esborra empresa</button>
			</li>
			<?php
		}
	?>
</ul>

