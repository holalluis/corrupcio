<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		form > table td {
			padding:0.3em 0.6em;
			
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<!--titol-->
<h1>Gran Enciclopèdia de la Corrupció</h1>

<h2>Contacta</h2>

<div style="padding-left:1.5em;margin:0 auto">
	<form method=post>
		<table>
			<tr><td>Nom     <td><input    name=nom  required placeholder="Nom">
			<tr><td>E-mail  <td><input    name=mail required placeholder="E-mail">
			<tr><td>Missatge<td><textarea name=msg  required placeholder="Missatge"></textarea>
			<tr><td><td><button style="width:90%">Envia</button>
		</table>
	</form>

	<?php
		if(!isset($_POST['nom'], $_POST['mail'],$_POST['msg']))
		{
			die();
		}
		$nom=$_POST['nom'];
		$mail=$_POST['mail'];
		$msg=$_POST['msg'];
		mail('holalluis@gmail.com','Contacte formulari corrupció',"$nom\n$mail\n\n$msg") or die('Error. Mail no enviat. Torna-ho a intentar');
		die('<br><br>Missatge enviat. Gràcies per contactar amb nosaltres. Ens posarem en contacte amb tu en el mínim temps possible.');
	?>

</div>
