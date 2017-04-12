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
<h1>
	<span onclick=window.location='condemnes.php'>Condemnes</span> &rsaquo; id <?php echo $condemna->id ?>
</h1>

<ul>
	<!--persona-->
	<li>
		Persona: 
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
	</li>

  <!--cas-->
	<li>
		Cas: 
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
	</li>

	<!--anys de presó-->
	<li>
		Anys de presó:
		<?php
			echo $condemna->anys_de_preso;
		?>
		<?php if($edit_mode){ ?>
			<button onclick="update('condemnes','<?php echo $condemna->id ?>','anys_de_preso', '<?php echo urlencode($condemna->anys_de_preso) ?>')">edita anys de presó</button>
		<?php } ?>
	</li>

	<!--delictes-->
	<li>
		Delictes: 
		<?php echo $condemna->delictes ?>
		<?php if($edit_mode){ ?>
			<button onclick="update('condemnes','<?php echo $condemna->id ?>','delictes', '<?php echo urlencode($condemna->delictes) ?>')">edita delictes</button>
		<?php } ?>
	</li>

	<!--inici condemna-->
	<li>
		Inici:
		<?php echo $condemna->any ?>
		<?php if($edit_mode){ ?>
			<button onclick="update('condemnes','<?php echo $condemna->id ?>','any', '<?php echo urlencode($condemna->any) ?>')">edita any inici</button>
		<?php } ?>
	</li>

	<!--data modificació-->
	<li>
		Última modificació: <?php echo date("d/m/Y H:i:s",strtotime($condemna->modificacio)) ?>
	</li>

	<!--esborrar-->
	<?php
		if($edit_mode)
		{
			?>
			<li>
			  <button onclick=esborra('condemnes',<?php echo $condemna->id ?>)>esborra condemna</button>
			</li>
			<?php
		}
	?>
</ul>

