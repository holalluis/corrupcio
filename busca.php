
<div id=busca class=amagat>
	<form method=get action=resultats.php>
		<input id=q name=q type=search placeholder="Busca persones, casos, partits, empreses" autocomplete=off>
		<button> &#128270; </button>
	</form>
</div>

<style>
	#busca {
		background:#fafafa;
		text-align:center;
		padding:1em 0;
		border-bottom:1px solid #ccc
	}
	#busca.amagat {
		display:block;
		display:none;
	}
	#busca input#q {
		padding-top:0.5em;
		padding-bottom:0.5em;
		width:300px;
		outline:none;
		border:1px solid #ccc;
		margin-bottom:2px;
	}
	#busca form button {
		padding:5px 16px;
		background:#ddd;
		border:1px solid #ccc;
	}
	#busca form button:hover {
		background:#eee;
	}
</style>
