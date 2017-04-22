<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		/* INPUT: id del cas de corrupció*/
		$id=$_GET['id'] or die('cas id no especificat');

		//sql query
		$sql="SELECT * FROM casos WHERE id=$id";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
		$cas->modificacio=$row['modificacio'];
		$cas->descripcio=$row['descripcio'];
	?>
	<style>
		form {
			display:inline-block;
			vertical-align:top;
		}
		#navbar div[pagina=casos]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>
	<span onclick=window.location='casos.php'>Casos de corrupció</span> &rsaquo; <?php echo $cas->nom ?>
	<?php 
		if($edit_mode)
		{
			?>
			<button onclick="update('casos',<?php echo $cas->id ?>,'nom','<?php echo urlencode($cas->nom) ?>')">edita nom</button> 
			<?php
		}
	?>
</h1>

<ul>
	<!--descripció-->
	<li>
		Descripció: 
		<p class=descripcio>
			<?php 
				if(trim($cas->descripcio)=="")
				{
					echo "<i class=blanc>~no hi ha descripció</i>";
				}
				else
				{
					echo "<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
						$cas->descripcio
					</div>
					";
				}
				if($edit_mode)
				{ 
					?>
					<button onclick="update('casos','<?php echo $cas->id ?>','descripcio','<?php echo urlencode($cas->descripcio) ?>')">edita descripció</button>
					<?php 
				} 
			?>
		</p>
	</li>

	<!--any-->
	<li>
		Any: <?php echo $cas->any ?> 
		<?php 
			if($edit_mode)
			{ 
				?>
				<button onclick="update('casos','<?php echo $cas->id ?>','any','<?php echo urlencode($cas->any) ?>')">edita any</button>
				<?php 
			} 
		?>
	</li>

	<!--espoli-->
	<li>
		Espoli: 
		<?php echo $cas->espoli ?> euros 
		<?php 
			if($edit_mode)
			{ 
				?>
				<button onclick="update('casos','<?php echo $cas->id ?>','espoli','<?php echo urlencode($cas->espoli) ?>')">edita espoli</button>
				<?php 
			} 
		?>
	</li>

	<!--estat-->
	<li>
		Estat: 
		<?php 
			if($cas->estat=="")
			{
				echo "<span class=blanc>~no hi ha estat</span>";
			}
			else
			{
				echo $cas->estat;
			}
			if($edit_mode)
			{ 
				?>
				<button onclick="update('casos','<?php echo $cas->id ?>','estat','<?php echo urlencode($cas->estat) ?>')">edita estat</button>
				<?php 
			} 
		?>
	</li>

	<!--relacions persona-cas-->
	<li>
		<?php
			$sql="
				SELECT rel.id, rel.persona_id, rel.descripcio, rel.ordre, persones.nom
				FROM relacions_persona_cas AS rel, persones 
				WHERE 
					rel.persona_id=persones.id 
					AND rel.cas_id=$cas->id
				ORDER BY ordre
				";
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
			$n=mysqli_num_rows($res);
		?>
		Persones relacionades (<?php echo $n ?>)
		<ul style=list-style-type:decimal>
			<?php
				while($row=mysqli_fetch_assoc($res))
				{
					$rel_id=$row['id'];
					$nom=$row['nom'];
					$persona_id=$row['persona_id'];
					$descripcio=$row['descripcio']=="" ? "<i class=blanc>~no hi ha descripció</i>" : $row['descripcio'];
					$ordre=$row['ordre'];
					echo "<li>";
					if($edit_mode)
					{
						echo " <select title=ordre onchange=updateOrdre($rel_id,this.value)>";
						for($j=1;$j<=$n;$j++)
						{
							if($j==$ordre)
								echo "<option selected>$j";
							else
								echo "<option>$j";
								
						}
						echo "</select> ";
					}

					echo "<a href=persona.php?id=$persona_id>$nom</a>";

					echo "
						<div class='nowrap descripcio' onclick=this.classList.toggle('nowrap')>
							$descripcio
						</div>
					";

					//btn edita relacio persona cas
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
							<select name=persona_id>
								<?php
									//busca persones no implicades en el cas
									$sql="
										SELECT id, nom 
										FROM persones
										WHERE id NOT IN (SELECT persona_id FROM relacions_persona_cas WHERE cas_id = $cas->id)
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
							<input name=cas_id type=hidden value=<?php echo $cas->id?>>
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
			$res=$mysql->query($sql) or die(mysqli_error($mysql));
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
								<tr><th>Nova condemna<td>
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
											$res=$mysql->query($sql) or die(mysqli_error($mysql));
											while($row=mysqli_fetch_assoc($res))
											{
												$id=$row['id'];
												$nom=$row['nom'];
												echo "<option value=$id>$nom";
											}
										?>
									</select>
								</tr>
								<tr><th>Anys de presó<td><input name=anys_de_preso placeholder="Anys de presó">
								<tr><th>Delictes<td><textarea name=delictes placeholder="Delictes"></textarea>
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
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($cas->modificacio)) ?>
	</li>

	<!--esborrar-->
	<?php 
		if($edit_mode)
		{ 
			?>
			<li>
				<button onclick=esborra('casos',<?php echo $cas->id ?>)>esborra cas</button>
			</li>
			<?php 
		} 
	?>
</ul>
