<?php include'mysql.php'?>
<!--utf8 and CSS-->
<meta charset=utf-8>
<link rel="icon" href="img/ico.png" type="image/x-icon">
<link rel=stylesheet href=css.css>
<meta name="description" content="">

<title>Corrupció</title>

<script>
	//utils
	function qs(selector){return document.querySelector(selector)}
	function qsa(selector){return document.querySelectorAll(selector)}

	/*CRUD*/

	//update base de dades
	function esborra(taula,id)
	{
		var sol=new XMLHttpRequest();
		sol.open('POST',"data/esborra/esborra.php",true);
		sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		sol.onreadystatechange=function()
		{
			if(this.readyState==4&&this.status==200)
			{
				console.log(this.responseText);
				window.location.reload();
			}
		}
		sol.send("taula="+taula+"&id="+id);
	}

	//update base de dades
	function update(taula,id,camp)
	{
		var nouValor=prompt("Escriu nou valor per "+taula+"."+camp+":");
		if(!nouValor)return;
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

	//envia ordre sql al servidor DANGER
	//not used per ara
	function sql2json(sql,callback)
	{
		var sol=new XMLHttpRequest();
		sol.open('POST','data/sql2json.php',true);
		sol.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		sol.onreadystatechange=function()
		{
			if(this.readyState==4&&this.status==200)
			{
				var json=JSON.parse(this.responseText);
				callback(json)
			}
		}
		sol.send("sql="+sql)
	}
</script>
