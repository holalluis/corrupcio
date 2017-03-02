var express=require('express');
var app=express();

app.use(express.static('/'));

app.listen(3000,function(){
	console.log('app escoltant al port 3000');
});

app.get('/hola',function(req,res){
	res.send("hola que tal <a href=/>Inici</a>");
});

