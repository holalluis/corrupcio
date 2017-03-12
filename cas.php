<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id del cas de corrupció*/
		$id=$_GET['id'] or die('cas id no especificat');

		//sql query
		$sql="SELECT * FROM casos WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$n=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);

		//si no resultats, fora
		if($n==0){header("location: casos.php");}

		//objecte cas
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
		form {
			display:inline-block;
			vertical-align:top;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Casos de corrupció &rsaquo; <?php echo $cas->nom ?></h1>

<ul>
	<!--any-->
	<li>
		Any: 
		<?php echo $cas->any ?> 
		<?php if($edit_mode){ ?>
			<button onclick="update('casos','<?php echo $cas->id ?>','any')">modifica</button>
		<?php } ?>
	</li>

	<!--espoli-->
	<li>
		Espoli: 
		<?php echo $cas->espoli ?> euros 
		<?php if($edit_mode){ ?>
			<button onclick="update('casos','<?php echo $cas->id ?>','espoli')">modifica</button>
		<?php } ?>
	</li>

	<!--estat-->
	<li>
		Estat: 
		<?php 
			if($cas->estat=="")
			{
				echo "<span style=color:#aaa>no definit</span>";
			}
			else {
				echo $cas->estat;
			}
		?>
		<?php if($edit_mode){ ?>
			<button onclick="update('casos','<?php echo $cas->id ?>','estat')">modifica</button>
		<?php } ?>
	</li>

	<!--relacions persona-cas-->
	<li>
		<?php
			$sql="
				SELECT rel.id, rel.persona_id, persones.nom
				FROM relacions_persona_cas AS rel, persones 
				WHERE 
					rel.persona_id=persones.id 
					AND rel.cas_id=$cas->id
				ORDER BY nom
				";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Persones implicades (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$nom=$row['nom'];
					$persona_id=$row['persona_id'];
					echo "<li>
						<a href=persona.php?id=$persona_id>$nom</a>
					";
					if($edit_mode){
						echo "
						<button onclick=esborra('relacions_persona_cas',$id)>esborra</button>
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
					<?php
				}
			?>
		</ul>
	</li>

	<!--condemnes-->
	<li>
		<?php
			$sql="
				SELECT 
					condemnes.id, 
					condemnes.anys_de_preso, 
					condemnes.any, 
					condemnes.delictes,
					persones.nom AS persona, 
					rel.persona_id
				FROM condemnes, persones, relacions_persona_cas AS rel
				WHERE 
					condemnes.relacio_persona_cas_id=rel.id 
					AND rel.persona_id=persones.id
					AND rel.cas_id=$cas->id
				";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Condemnes (<?php echo $n ?>)
		<ul>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$anys_de_preso=$row['anys_de_preso'];
					$any=$row['any'];
					$persona=$row['persona'];
					$persona_id=$row['persona_id'];
					echo "<li>
						<a href=condemna.php?id=$id>$persona: $anys_de_preso anys de presó ($any) </a>
					";
				}
			?>
			<?php
				if($edit_mode)
				{
					?>
					<li>
						<form method=post action=data/insert/condemna.php>
							<input name=cas_id type=hidden value=<?php echo $cas->id?>>
							<table>
								<tr><th>Afegeix condemna<th>Anys de presó<th>Delictes<th>Inici
								<td rowspan=2><button>afegir</button>
								<tr><td>
									<select name=relacio_persona_cas_id>
										<?php
											//persones relacionades amb el cas
											$sql="
												SELECT relacions_persona_cas.id, persones.nom
												FROM relacions_persona_cas, persones
												WHERE 
													relacions_persona_cas.persona_id=persones.id
													AND cas_id=$cas->id 
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

	<!--relacions persona-cas * persona-partit-->
	<li>
		<?php
			//busca partits relacionats amb les persones relacionades
			$sql="
				SELECT 
					partits.id AS partit_id,
					partits.nom AS partit,
					persones.nom AS persona
				FROM 
					relacions_persona_cas    AS rel_pc, 
					relacions_persona_partit AS rel_pp,
					partits,
					persones
				WHERE
					rel_pc.cas_id     = $cas->id          AND
					rel_pc.persona_id = rel_pp.persona_id AND
					partits.id        = rel_pp.partit_id  AND
					persones.id       = rel_pp.persona_id
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Partits implicats (<?php echo $n ?>)
		<ul>
		<?php
			while($row=mysqli_fetch_assoc($res))
			{
				$partit_id=$row['partit_id'];
				$partit=$row['partit'];
				$persona=$row['persona'];
				echo "<li> 
					<a href=partit.php?id=$partit_id>$partit</a> (&larr; $persona)
				";
			}
		?>
		</ul>
	</li>

	<!--relacions persona-cas * persona-empresa-->
	<li>
		<?php
			//busca empreses relacionades amb les persones relacionades
			$sql="
				SELECT 
					empreses.id  AS empresa_id,
					empreses.nom AS empresa,
					persones.nom AS persona
				FROM 
					relacions_persona_cas     AS rel_pc, 
					relacions_persona_empresa AS rel_pe,
					empreses,
					persones
				WHERE
					rel_pc.cas_id     = $cas->id          AND
					rel_pc.persona_id = rel_pe.persona_id AND
					empreses.id       = rel_pe.empresa_id AND
					persones.id       = rel_pe.persona_id
			";
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Empreses implicades (<?php echo $n ?>)
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

<?php 
	if($edit_mode)
	{ 
		?>
		<ul>
			<li><button onclick=esborra('casos',<?php echo $cas->id ?>)>esborra cas</button>
		</ul>
		<?php 
	} 
?>
