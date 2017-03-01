//estructura de dades corrupcio
//https://15mpedia.org/wiki/Lista_de_casos_de_corrupci%C3%B3n

var cas={
	id:1,                        //identificador únic
	nom:"nom",                   //nom
	espoli:10,                   //euros
	partits_afectats:[1,2,3],    //array ids partit
	empreses_implicades:[1,2],   //array ids empresa
	persones_implicades:[1,2,3], //array ids persona
	condemnes:[1],               //array ids condemna
};

var Partits=[];
var partit={
	id:1,
	nom:"pp",
};

var Empreses=[];
var empresa={
	id:1,
	nom:"palau de la música",
};

var Persones=[];
var persona={
	id:1,
	nom:"Jordi",
};

var Condemnes=[];
var condemna={
	id:1,
	persona_condemnada:1,
	anys_de_preso:10,
};
