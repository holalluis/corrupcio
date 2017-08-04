<!doctype html><html><head>
	<?php include'imports.php'?>
	<?php if(!$edit_mode){header("location:index.php");}?>
	<style>
		#formularis li {
			padding:0.5em;
			margin-bottom:0.5em;
			margin-right:1em;
			background:#f5f5f5;
			border:1px solid #ccc;
		}
		#formularis li .activador{
			display:block;
			cursor:pointer;
			color:rgba(0,0,0,0.55);
		}
		#formularis li .activador:hover{
			text-decoration:underline;
			color:black;
		}
		#formularis li form{
			margin-top:1em;
			display:none;
		}
		#formularis li.visible form{
			display:block;
		}
		#formularis li form table{
			margin-left:1em;
		}
		#formularis li form table th{
			padding:0 0.5em;
		}
		#formularis li form table input{
			line-height:2em;
			font-size:14px;
			outline:none;
		}
		#formularis li form table select {
			padding:1em;;
		}
		#formularis li form table button {
			padding:0.5em;;
		}
	</style>
	<script>
		function init()
		{
			listeners()
		}
		function listeners()
		{
			var lis=qsa("#formularis > li > span.activador");
			for(var i=0;i<lis.length;i++)
			{
				lis[i].onclick=function(){this.parentNode.classList.toggle('visible')}
			}
		}
	</script>
</head><body onload=init()>
<?php include'navbar.php'?>

<div id=root>

<h1>Inserta a la base de dades</h1>
<div class=portrait_marge>
	<div class=descripcio>Les dades amb un asterisc (*) són obligatòries</div>
</div>

<ul id=formularis>
	<li>
		<span class=activador>Afegir persona</span>
		<form method=post action=data/insert/persona.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Nom i cognoms" required>
				<tr><th>Data naixement<td><input type=date name=naixement>
				<tr><th><td><button>Inserta</button>
			</table>
		</form>
	</li>
	<li>
		<span class=activador>Afegir cas</span>
		<form method=post action=data/insert/cas.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Cas x" required>
				<tr><th>Espoli<td><input type=number name=espoli placeholder="Euros">
				<tr><th>Any<td><input name=any value="2000-<?php echo date("Y",time())?>">
				<tr><th><td><button>Inserta</button>
			</table>
		</form>
	</li>
	<li>
		<span class=activador>Afegir partit</span>
		<form method=post action=data/insert/partit.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Sigles partit" required>
				<tr><th>Nom llarg *<td><input name=nom_llarg placeholder="Nom sencer partit" required>
				<tr><th><td><button>Inserta</button>
			</table>
		</form>
	</li>
	<li>
		<span class=activador>Afegir empresa/institució</span>
		<form method=post action=data/insert/empresa.php>
			<table>
				<tr><th>Nom *<td><input name=nom placeholder="Nom empresa/institució" required>
				<tr><th><td><button>Inserta</button>
			</table>
		</form>
	</li>
</ul>

</div>
