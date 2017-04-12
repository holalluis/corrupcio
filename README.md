# Corrupcio
GRAN ENCICLOPEDIA DE LA CORRUPCIO
Web per recopilar els casos de corrupcio a l'estat espanyol, 
La idea es tenir una llista ordenada de "casos", i poder-los comparar. 
Llavors, poder visualitzar dades, com per exemple grafics de barres 
d'euros estafats, gent implicada, anys de condemna, etc. 
Es podria monetitzar amb publicitat. 

## Tasques pendents (programacio)
- CRUD - fixar caracters maxims per inserts
- CRUD - fixar caracters maxims per updates
- Grafic de barres sota del top5 a pagina inicial
- Poder descarregar base de dades sencera
- Registre de canvis:
	- 1. Implementar col.laboradors (user,password)
	- 2. Taula log: canvis associats a un col.laborador

## Estructura de dades Corrupcio
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

## Proposta inicial de repartiment inversio/benefici
	- 60% Programacio i manteniment
	- 30% Omplir dades i manteniment
	- 10% Reserva per pagar serveis a contractar

## Coses a contractar en un futur
	- Posar publicitat
	- Dissenyador grafic (logo & publi placement)
