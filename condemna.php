<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php
		/* INPUT: id condemna */
		$id=$_GET['id'] or die('condemna id no especificat');

		//sql query
		$sql="SELECT * FROM condemnes WHERE id=$id";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		$n=mysqli_num_rows($res);
		$row=mysqli_fetch_assoc($res);

		//si no resultats, fora
		if($n==0){header("location: condemnes.php");}

		//objecte
		$condemna=new stdclass;
		$condemna->id=$row['id'];
		$condemna->relacio_persona_cas_id=$row['relacio_persona_cas_id'];
		$condemna->anys_de_preso=$row['anys_de_preso'];
		$condemna->delictes=$row['delictes'];
		$condemna->any=$row['any'];
		$condemna->modificacio=$row['modificacio'];
	?>
	<style>
		#navbar div[pagina=condemnes]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<h1>
	<span onclick=window.location='condemnes.php'>Condemnes</span> <!--&rsaquo; condemna-->
</h1>

<ul class=portrait_marge>
	<!--persona-->
	<li>
		Persona condemnada: 
		<span class=descripcio>
			<?php
				$sql="
					SELECT persones.nom AS persona, persones.id AS persona_id
					FROM persones, relacions_persona_cas AS rel
					WHERE		
						persones.id=rel.persona_id AND
						rel.id=$condemna->relacio_persona_cas_id
				";
				$res=$mysql->query($sql) or die(mysqli_error($mysql));
				$row=mysqli_fetch_assoc($res);
				$persona=$row['persona'];
				$persona_id=$row['persona_id'];
				echo "<a href=persona.php?id=$persona_id>$persona</a>";
			?>
		</span>
	</li>

  <!--cas-->
	<li>
		Cas: 
		<span class=descripcio>
			<?php
				$sql="
					SELECT casos.nom AS cas, casos.id AS cas_id
					FROM casos, relacions_persona_cas AS rel
					WHERE		
						casos.id=rel.cas_id AND
						rel.id=$condemna->relacio_persona_cas_id
				";
				$res=$mysql->query($sql) or die(mysqli_error($mysql));
				$row=mysqli_fetch_assoc($res);
				$cas=$row['cas'];
				$cas_id=$row['cas_id'];
				echo "<a href=cas.php?id=$cas_id>$cas</a>";
			?>
		</span>
	</li>

	<!--anys de presó-->
	<li>
		Anys de presó:
		<span class=descripcio>
			<?php echo $condemna->anys_de_preso ?>
		</span>
		<?php if($edit_mode){ ?>
			<button class=update onclick="update('condemnes','<?php echo $condemna->id ?>','anys_de_preso', '<?php echo urlencode($condemna->anys_de_preso) ?>')">
				edita
			</button>
		<?php } ?>
	</li>

	<!--inici condemna-->
	<li>
		Inici condemna:
		<span class=descripcio>
			<?php echo $condemna->any ?>
		</span>
		<?php if($edit_mode){ ?>
			<button class=update onclick="update('condemnes','<?php echo $condemna->id ?>','any', '<?php echo urlencode($condemna->any) ?>')">edita</button>
		<?php } ?>
	</li>

	<!--delictes-->
	<li>
		Descripció: 
		<div class=descripcio>
			<?php echo $condemna->delictes ?>
		</div>
		<?php if($edit_mode){ ?>
			<button class=update onclick="update('condemnes','<?php echo $condemna->id ?>','delictes', '<?php echo urlencode($condemna->delictes) ?>')">
				edita
			</button>
		<?php } ?>
	</li>

	<!--data modificació-->
	<li class=ultima_modificacio>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($condemna->modificacio)) ?>
	</li>

	<!--esborrar-->
	<?php
		if($edit_mode) { ?>
			<li>
				<button class=update onclick=esborra('condemnes',<?php echo $condemna->id ?>)>esborra condemna (perill!)</button>
			</li>
			<?php
		}
	?>
</ul>

</div>
