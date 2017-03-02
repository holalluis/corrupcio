var express=require('express');
var app=express();
app.listen(3000,function(){console.log('app escoltant al port 3000')});

//root
app.get('/',function(req,res){
	res.sendFile("<h1>index.html</h1> <a href=/hola>hola</a>")
});

//GET hola
app.get('/hola',function(req,res){
	res.send("hola que tal <a href=/>Inici</a>")
});
