<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id del partit*/
		$id=$_GET['id'] or die('partit id no especificat');

		//objecte persona
		$sql="SELECT * FROM partits WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$row=mysqli_fetch_assoc($res);
		$partit=new stdclass;
		$partit->id=$row['id'];
		$partit->nom=$row['nom'];
		$partit->nom_llarg=$row['nom_llarg'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Partits &rsaquo; <?php echo $partit->nom ?></h1>

<ul>
	<li>Nom llarg: <?php echo $partit->nom_llarg ?>
		<button onclick="update('partits','<?php echo $id ?>','nom_llarg')">modifica</button>
	</li>

	<li>
		<?php
			$sql="
				SELECT rel.id, rel.persona_id, persones.nom AS persona
				FROM relacions_persona_partit AS rel, persones 
				WHERE 
					rel.persona_id=persones.id 
					AND rel.partit_id=$partit->id
				ORDER BY nom
				";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Persones relacionades (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$persona=$row['persona'];
					$persona_id=$row['persona_id'];
					echo "<li>
						<a href=persona.php?id=$persona_id>$persona</a>
						<button onclick=esborra('relacions_persona_partit',$id)>esborra</button>
					";
				}
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
							$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
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
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Casos relacionats directa/indirectament (<?php echo $n ?>)
		<ul>
		<?php
			while($row=mysqli_fetch_assoc($res))
			{
				$cas_id=$row['cas_id'];
				$cas=$row['cas'];
				$persona=$row['persona'];
				echo "<li> 
					<a href=cas.php?id=$cas_id>$cas</a> (&larr; $persona)
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
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Empreses relacionades directa/indirectament (<?php echo $n ?>)
		<ul>
		<?php
			while($row=mysqli_fetch_assoc($res))
			{
				$empresa_id=$row['empresa_id'];
				$empresa=$row['empresa'];
				$persona=$row['persona'];
				echo "<li> 
					<a href=empresa.php?id=$empresa_id>$empresa</a> (&larr; $persona)
				";
			}
		?>
		</ul>
	</li>
</ul>
