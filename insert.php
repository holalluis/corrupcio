<!doctype html><html><head>
	<?php include'imports.php' ?>
	<style>
		h1{
			padding:0.5em;
		}
		#formularis li {
			padding:0.5em;
			margin-bottom:0.5em;
			background:#f5f5f5;
			border:1px solid #ccc;
		}
		#formularis li form{
			margin-top:1em;
		}
		#formularis li form table{
			margin-left:3em;
		}
		#formularis li form table th{
			padding:0 0.5em;
		}
		#formularis li form table input{
			line-height:2em;
			width:200px;
			outline:none;
		}
		#formularis li form table button {
			width:100%;
			padding:1em;;
		}
	</style>
</head><body>
<?php include'navbar.php'?>

<h1>Insertar a la base de dades</h1>
<div style="padding:0 0 1em 1em">Les dades amb un asterisc (*) són obligatòries</div>

<ul id=formularis>
	<li>Insertar Cas de corrupció 
		<form method=post action=data/insert/cas.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Cas x" required>
				<tr><th>Espoli<td><input type=number name=espoli placeholder="euros">
				<tr><th>Any<td><input type=number name=any value="<?php echo date("Y",time())?>">
				<tr><th><td><button>Insertar</button>
			</table>
		</form>
	<li>Insertar Persona
		<form method=post action=data/insert/persona.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Nom i cognoms persona" required>
				<tr><th>Data naixement<td><input type=date name=naixement>
				<tr><th><td><button>Insertar</button>
			</table>
		</form>
	<li>Insertar Partit polític
		<form method=post action=data/insert/partit.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Sigles partit" required>
				<tr><th>Nom llarg *<td><input name=nom_llarg placeholder="Nom sencer partit" required>
				<tr><th><td><button>Insertar</button>
			</table>
		</form>
	<li>Insertar Empresa
		<form method=post action=data/insert/empresa.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Nom empresa" required>
				<tr><th><td><button>Insertar</button>
			</table>
		</form>
</ul>
