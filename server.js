var express=require('express');
var app=express();
app.listen(3000,function(){console.log('app escoltant al port 3000')});

app.get('/',          function(req,res){
	console.log(app.mountpath);
	res.sendFile(__dirname+"/index.html")});
app.get('/hola',      function(req,res){res.send("hola que tal <a href=/>Inici</a>")});

