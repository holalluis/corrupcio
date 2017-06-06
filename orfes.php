<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php if(!$edit_mode){header("location:index.php");}?>
	<script>
		function init()
		{
		}
	</script>
</head><body onload=init()>
<?php include'navbar.php'?>

<div id=root>

<h1>Elements orfes de la base de dades (=SOLUCIONAR!)</h1>
<ul>
	<li>
		<h3>1. Persones sense cas de corrupció associat</h3>
		<table>
			<?php
				$sql="
					SELECT p.id, p.nom, rel.id AS cas_id, rel.nom AS cas
					FROM persones AS p
					LEFT JOIN 
						(
							SELECT casos.nom, casos.id, relacions_persona_cas.persona_id
							FROM casos, relacions_persona_cas 
							WHERE casos.id=relacions_persona_cas.cas_id
						) AS rel
					ON p.id=rel.persona_id
					GROUP BY nom
					ORDER BY nom
				";
				$res=$mysql->query($sql) or die(mysqli_error($mysql));
				if(mysqli_num_rows($res)==0)
				{
					echo "<tr><td><span class=blanc>~No hi ha resultats</span>";
				}
				while($row=mysqli_fetch_assoc($res))
				{
					$id=$row['id'];
					$nom=$row['nom'];
					$cas=$row['cas'];
					$cas_id=$row['cas_id'];

					//ajunta les relacions en un sol string
					$relacions=[];
					if($cas==""){
						echo "<a href=cas.php?id=$cas_id>$cas</a>";
						echo "
							<tr>
								<td><a href=persona.php?id=$id>$nom</a>
						";
					}

				}
			?>
		</table>
	</li>
</ul>
</div>
