
<div id=busca class=amagat>
	<form method=get action=resultats.php>
		<input id=q name=q type=search placeholder="Busca persones, casos, partits, empreses">
		<button>
			&#128270;
		</button>
	</form>
</div>

<style>
	#busca {
		background:#fafafa;
		text-align:center;
		padding:2em;
		border-bottom:1px solid #ccc
	}
	#busca.amagat {
		display:block;
		display:none;
	}
	#busca input#q {
		width:45%;
		outline:none;
		font-size:22px;
	}
	#busca form button {
		margin-left:-3px;
	}
</style>
