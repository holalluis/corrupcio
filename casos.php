<!doctype html><html><head>
	<?php include'imports.php'?>
	<style>
		#navbar div[pagina=casos]{color:black}
	</style>
</head><body>
<?php include'navbar.php'?>

<div id=root>

<!--titol-->
<h1>
	<span onclick=window.location='index.php'>Inici</span> &rsaquo; 
	Casos de corrupció
</h1>

<!--menú ordenar casos per 'x'-->
	<?php
		$options=[
			"nom"      =>"alfabèticament",
			"any_desc" =>"per any (més recent a dalt)",
			"any_asc"  =>"per any (més antic a dalt)",
			"implicats"=>"per nombre de persones implicades",
		];
	?>
	<div><p class=descripcio>
		Casos de corrupció ordenats <?php 
			$order_by_key = isset($_GET['order_by']) ? $_GET['order_by'] : "nom";
			echo $options[$order_by_key];
		?>
	</p></div>
	<p style=font-size:12px>
		&darr; Ordena:
		<select onchange="window.location='casos.php?order_by='+this.value">
			<?php
				foreach($options as $key=>$value){
					if(isset($_GET['order_by']) && $_GET['order_by']==$key)
						echo "<option value='$key' selected>$value";
					else
						echo "<option value='$key'>$value";
				}
			?>
		</select>
	</p>
<!--/menú ordenar casos per 'x'-->

<!--resum-->
<table id=casos>
	<?php
		//gestionar GET ordenar per:
		if(isset($_GET['order_by'])){
			switch($_GET['order_by']){
				case "nom":       $order_by="nom";break;
				case "any_desc":  $order_by="any DESC";break;
				case "any_asc":   $order_by="any ASC";break;
				case "implicats": $order_by="registrats DESC,nom";break;
				default:          $order_by="nom";break;
			}
		}
		else {
			$order_by="nom";
		}

		$sql="
			SELECT c.id, c.nom, c.any, c.implicats, COUNT(rel.id) AS registrats 
			FROM casos AS c 
			LEFT JOIN relacions_persona_cas AS rel
			ON c.id=rel.cas_id
			GROUP BY nom
			ORDER BY $order_by
		";
		$res=$mysql->query($sql) or die(mysqli_error($mysql));
		if(mysqli_num_rows($res)==0)
		{
			echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
		}
		while($row=mysqli_fetch_assoc($res)) {
			$id=$row['id'];
			$nom=$row['nom'];
			$any=$row['any'];
			$registrats=$row['registrats'];
			$implicats=$row['implicats'];
			$percentatge = $implicats==0 ? 0 : 100*$registrats/$implicats;
			echo "
				<tr>
					<td><a href=cas.php?id=$id>$nom</a>
					<td class=numero>$any
					<td class=numero>$registrats 
					de $implicats persones
					<td><progress max=100 value=$percentatge></progress>
					<td align=right>".number_format($percentatge,1,",",".")." % 
			";
		}
	?>
</table>

</div id=root>
