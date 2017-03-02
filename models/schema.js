const mongoose = require('mongoose');
const Schema = mongoose.Schema;

//Cas, trama corrupció
const Cas = new Schema({
	nom:String,                   //nom
	espoli:Number,                //euros
	any:Number,                   //any 
	partits_afectats:[Number],    //array ids partit
	empreses_implicades:[Number], //array ids empresa
	persones_implicades:[Number], //array ids persona
	condemnes:[{                  //array de condemnes
		persona_condemnada_id:Number,
		anys_de_preso:Number,
		any_sentencia:Number,
	}],
});

const Partit=new Schema({
	nom:String,
});

const Empresa=new Schema({
	nom:String,
});

const Persona=new Schema({
	nom:String,
	naixement:Date,
});
