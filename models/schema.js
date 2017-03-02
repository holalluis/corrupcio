//estructura trama de corrupció
var Cas = {
	nom:String,             //nom
	espoli:Number,          //euros
	any:Number,             //any 
	partits_afectats:[],    //array partits
	empreses_implicades:[], //array empreses
	persones_implicades:[], //array persones
	condemnes:[],           //array condemnes
};

var Partit={
	nom:String,
};

var Empresa={
	nom:String,
};

var Persona={
	nom:String,
	naixement:Date,
};

var Condemna={            
	persona_condemnada_id:Number,
	anys_de_preso:Number,
	any_sentencia:Number,
};
