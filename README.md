## Desenvolupament tasques pendents
<ul>
  <li> CRUD caràcters màxims per inserts
  <li> CRUD caràcters màxims per updates
  <li> Implementar log de canvis associats a un col·laborador
  <li> Poder descarregar base de dades
	<li> Implementar avis legal
</ul>

# Corrupció
<p>
	GRAN ENCICLOPÈDIA DE LA CORRUPCIÓ (gec.cat)
	Web per recopilar els casos de corrupció a l'estat espanyol, 
	un projecte fer en el temps lliure. 
	La idea seria tenir una llista ordenada de "casos", i poder-los comparar. 
	Llavors, poder visualitzar dades, com per exemple gràfics de barres 
	d'euros estafats, gent implicada, anys de condemna, etc. Es podria 
	monetitzar amb publicitat. Si algú vol col·laborar amb la part de 
	recopilació de dades jo faria la programació. 
	Preferentment algú que es dediqui al món del periodisme.
</p>

## Estructura de dades Corrupció
- Taules (8)
	- Taules d'objectes (5)
		- casos 
		- persones
		- partits 
		- empreses 
		- condemnes
	- Taules relacionals (3)
		- relacions_persona_cas
		- relacions_partit_cas
		- relacions_empresa_cas
- MySQL triggers
  - on delete {cas,persona,partit,empresa} delete relacions
  - on delete relacions_persona_cas delete condemna
  - on update {cas,persona,partit,empresa} update timestamp

## Repartiment inversio/benefici
	- 60% Programació i manteniment
	- 30% Omplir dades i manteniment
	- 10% Reserva per pagar serveis a contractar

## Coses a contractar
	- Posar publicitat
	- Dissenyador gràfic (logo & publi placement)
