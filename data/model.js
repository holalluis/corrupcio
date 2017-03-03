/*
	Estructura de dades Corrupció
	=============================
	- MySQL Taules (7)
		- taules d'objectes (5)
			- casos 
			- partits 
			- empreses 
			- persones
			- condemnes
		- taules relacionals (2)
			- relacional_empreses_casos
			- relacional_persones_casos
*/
const Cas = {
	id:Number,
	nom:String,             //nom
	espoli:Number,          //euros
	any:Number,             //any 
	partits_implicats: [{   //taula relacional partits_implicats
		id:Number,
		cas_id:Number,
		partit_id:Number,
	}],
	empreses_implicades:[{  //taula relacional empreses_implicades
		id:Number
		cas_id:Number,
		empresa_id:Number,
	}],
	persones_implicades:[{ //taula relacional persones_implicades
		id:Number,
		cas_id:Number,
		persona_id:Number,
	}],
	condemnes:[{           //taula condemnes
		id:Number,
		cas_id:Number,
		persona_condemnada_id:Number,
		anys_de_preso:Number,
		any_sentencia:Number,
	}],
};

const Partit={
	id:Number,
	nom:String,
	nom_llarg:String,
};

const Empresa={
	id:Number,
	nom:String,
};

const Persona={
	id:Number,
	nom:String,
	naixement:Date,
};
