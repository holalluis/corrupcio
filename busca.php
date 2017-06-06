<div id=busca>
	<form action=resultats.php method=get>
		<input id=q name=q type=search 
			placeholder="Busca persones, casos, partits, empreses" 
			title="Busca persones, casos, partits, empreses"
			autocomplete=off required>
		<button>&#128270;</button>
	</form>
</div>

<style>
	#busca {
		text-align:center;
	}
	#busca form {
		display:flex;
	}
	#busca input#q {
		padding-top:0.5em;
		padding-bottom:0.5em;
		padding-left:0.2em;
		width:99%;
		height:30px;
		outline:none;
		border:1px solid #ccc;
		margin-bottom:2px;
	}
	#busca form button {
		background:#fff;
		border:1px solid #ccc;
		display:block;
		margin-left:-1px;
		height:30px;
	}
	#busca form button:hover {
		background:#eee;
	}
</style>
