<?php include'mysql.php'?>
<meta charset=utf-8>
<link rel=stylesheet href=css.css>
<title>Corrupció</title>

<script>
	//utils
	function qs(selector){return document.querySelector(selector)}
	function qsa(selector){return document.querySelectorAll(selector)}

	//update base de dades
	function update(taula,id,camp)
	{
		var nouValor=prompt("Escriu nou valor per "+taula+"."+camp+":");
		if(!nouValor)return;
		var sol=new XMLHttpRequest();
		sol.open('POST',"data/update/update.php",true);
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
