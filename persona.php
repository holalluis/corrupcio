<!doctype html><html><head>
	<?php include'imports.php' ?>
	<?php
		/* INPUT: id de la persona*/
		$id=$_GET['id'] or die('persona id no especificat');

		//objecte persona
		$sql="SELECT * FROM persones WHERE id=$id";
		$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
		$row=mysqli_fetch_assoc($res);
		$persona=new stdclass;
		$persona->id=$row['id'];
		$persona->nom=$row['nom'];
		$persona->naixement=$row['naixement'];
	?>
	<style>
		h1{
			padding:0.5em;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Persones &rsaquo; <?php echo $persona->nom ?></h1>

<ul>
	<li>
		Naixement:
		<?php echo $persona->naixement ?>
		(edat: 
		<?php 
			function getAge($then){
				$then_ts = strtotime($then);
				$then_year = date('Y',$then_ts);
				$age = date('Y') - $then_year;
				if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
				return $age;
			}
			echo getAge($persona->naixement);
		?>)
	</li>
	<li>
		Casos relacionats
		<?php
			$sql="SELECT * FROM relacions_persona_cas,casos WHERE cas_id=casos.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			echo "(".mysqli_num_rows($res).")";
			echo "<ul>";
			while($row=mysqli_fetch_assoc($res))
			{
				$nom=$row['nom'];
				$cas_id=$row['cas_id'];
				echo "<li><a href=cas.php?id=$cas_id>$nom</a>";
			}
		?>
		<li>
			<form method=post action=data/insert/relacio_persona_cas.php>
				<span class=activador>Afegir</span>
				<input type=hidden name=persona_id value="<?php echo $persona->id?>">
				<select name=cas_id>
					<?php
						//selecciona casos on la persona no estigui implicada
						$sql="SELECT id,nom FROM casos WHERE id NOT IN (SELECT cas_id FROM relacions_persona_cas WHERE persona_id=$persona->id )";
						$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
						while($row=mysqli_fetch_assoc($res))
						{
							$id=$row['id'];
							$nom=$row['nom'];
							echo "<option value=$id>$nom";
						}
					?>
				</select>
				<button>Afegir</button>
			</form>
		</li>
		</ul>
	</li>
	<li>
		Partits relacionats
		<?php
			$sql="SELECT * FROM relacions_persona_partit,partits WHERE partit_id=partits.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			echo "(".mysqli_num_rows($res).")";
			echo "<ul>";
			while($row=mysqli_fetch_assoc($res))
			{
				$nom=$row['nom'];
				$partit_id=$row['partit_id'];
				echo "<li><a href=partit.php?id=$partit_id>$nom</a>";
			}
		?>
		<li>
			<form method=post action=data/insert/relacio_persona_partit.php>
				<span class=activador>Afegir</span>
				<input type=hidden name=persona_id value="<?php echo $persona->id?>">
				<select name=partit_id>
					<?php
						//selecciona partits on la persona no estigui implicada
						$sql="SELECT id,nom FROM partits WHERE id NOT IN (SELECT partit_id FROM relacions_persona_partit WHERE persona_id=$persona->id)";
						$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
						while($row=mysqli_fetch_assoc($res))
						{
							$id=$row['id'];
							$nom=$row['nom'];
							echo "<option value=$id>$nom";
						}
					?>
				</select>
				<button>Afegir</button>
			</form>
		</li>
		</ul>
	</li>
	<li>
		Empreses relacionades
		<?php
			$sql="SELECT * FROM relacions_persona_empresa,empreses WHERE empresa_id=empreses.id AND persona_id=$persona->id
				ORDER BY nom
			";	
			$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
			echo "(".mysqli_num_rows($res).")";
			echo "<ul>";
			while($row=mysqli_fetch_assoc($res))
			{
				$nom=$row['nom'];
				$empresa_id=$row['empresa_id'];
				echo "<li><a href=empresa.php?id=$empresa_id>$nom</a>";
			}
		?>
		<li>
			<form method=post action=data/insert/relacio_persona_empresa.php>
				<span class=activador>Afegir</span>
				<input type=hidden name=persona_id value="<?php echo $persona->id?>">
				<select name=empresa_id>
					<?php
						//selecciona empreses on la persona no estigui implicada
						$sql="SELECT id,nom FROM empreses WHERE id NOT IN (SELECT empresa_id FROM relacions_persona_empresa WHERE persona_id=$persona->id)";
						$res=mysqli_query($mysql,$sql) or die(mysqli_error($mysql));
						while($row=mysqli_fetch_assoc($res))
						{
							$id=$row['id'];
							$nom=$row['nom'];
							echo "<option value=$id>$nom";
						}
					?>
				</select>
				<button>Afegir</button>
			</form>
		</li>
		</ul>
	</li>
	<li>
		Condemnes rebudes #TODO
	</li>
</ul>
