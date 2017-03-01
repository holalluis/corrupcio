//esquemes

var Cas={
	id:Number,                     //identificador únic
	nom:String,                    //nom
	espoli:Number,                 //euros
	partits_afectats:[Partit],     //array ids partit
	empreses_implicades:[Empresa], //array ids empresa
	persones_implicades:[Persona], //array ids persona
	condemnes:[Condemna],          //array ids condemna
};

var Partit={
	id:Number,
	nom:String,
};

var Empresa={
	id:Number,
	nom:String,
};

var Persona={
	id:Number,
	nom:String,
};

var Condemna={
	id:Number,
	persona_condemnada:Number,
	anys_de_preso:Number,
};
