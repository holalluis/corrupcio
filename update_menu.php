<style>
	/**POPUPS (com el de posar la llista a jugador.php)**/
	div.popup{
		color:white;
		position:absolute;
		top:0;
		left:0;
		z-index:1;
		background:#abc;
		box-shadow: 0 1px 2px rgba(0,0,0,.4);
		padding:1em;
		border:10px solid rgba(5, 5, 5, .5);
		background-clip:padding-box;
	}
	div.popup textarea{
		display:block;
		width:400px;
		height:250px;
		outline:none;
		margin:auto;
		font-size:15px;
	}
	div.popup .botonera{
		display:flex;
		justify-content:center;
	}
	div.popup button{
		display:block;
		width:49%;
		padding:1em 2em;
	}
</style>

<script>
	function creaMenuUpdate(taula,id,camp,current) {
		current=current||"";

		//nou popup
		var div=document.createElement('div');
		document.body.appendChild(div)
		div.className="popup"
		div.style.top="10%"
		div.style.left="10%"

		//titol
		var pro="Escriu nou valor per "+taula+"."+camp+":";
		var h3=document.createElement('h3')
		h3.innerHTML=pro;
		div.appendChild(h3)

		function urldecode(url){return decodeURIComponent(url.replace(/\+/g,' '))}

		//nova textarea
		var textarea=document.createElement('textarea')
		textarea.value=urldecode(current);
		div.appendChild(textarea)
		textarea.placeholder="Nou valor"

		//botons
		var botonera=document.createElement('div');
		botonera.classList.add('botonera');
		div.appendChild(botonera);

		//boto cancelar
		var btnc=document.createElement('button')
		botonera.appendChild(btnc)
		btnc.innerHTML="Cancela"
		btnc.onclick=function() {
			document.body.removeChild(div);
		}

		//boto ok
		var btn=document.createElement('button')
		botonera.appendChild(btn)
		btn.innerHTML="Guarda"
		btn.onclick=function() {
			var nouValor=textarea.value;
			if(!nouValor){return}
			var sol=new XMLHttpRequest();
			sol.open('POST',"data/update.php",true);
			sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			sol.onreadystatechange=function()
			{
				if(this.readyState==4&&this.status==200)
				{
					console.log(this.responseText);
					window.location.reload();
				}
			}
			sol.send("taula="+taula+"&id="+id+"&camp="+camp+"&nouValor="+nouValor);
		}

		textarea.select();
	}

	//update un camp de l'objecte id
	function update(taula,id,camp,current) {
		current=current||"";//valor actual (opcional)
		creaMenuUpdate(taula,id,camp,current);
	}
</script>
