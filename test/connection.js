const mdb=require('mongodb').MongoClient;

//connect to mongodb
mdb.connect("mongodb://localhost/Corrupcio",function(err,db){
	console.log(err);
	console.log("Connectat a la base de dades");
	db.close();
});

