const mdb=require('mongodb').MongoClient;

//connect to mongodb
mdb.connect("mongodb://localhost/Corrupcio",function(err,db){
	if(err!==null){console.log('error');return}
	console.log("Connectat a la base de dades");
	db.close();
});

