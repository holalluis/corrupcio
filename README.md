# Corrupcio
## GRAN ENCICLOPEDIA DE LA CORRUPCIO

Web per recopilar casos de corrupcio a l'estat espanyol.

## Estat
En desenvolupament. Encara no anunciat enlloc.


## Tasques pendents (programacio)
- Implementar menu amb textarea per fer updates
- Taula de ciutats (pensar)
- CRUD - fixar caracters maxims per inserts
- CRUD - fixar caracters maxims per updates
- Implementar mysqldump automatic cada setmana o aixi
- Poder descarregar base de dades sencera
- Grafic de barres sota del top5 a pagina inicial
- Comprar llibreta per apuntar coses importants
- Crear registre de canvis
	- 1. Implementar col.laboradors (user, password)
	- 2. Taula log: canvis associats a un col.laborador

## CSS breakpoints (mobils i tablets)
- 560px (mobil portrait) (navbar)

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
	- 55% Programacio i manteniment
	- 35% Omplir dades i manteniment
	- 10% Reserva per pagar serveis a contractar

## Coses a contractar en un futur
	- Posar publicitat
	- Dissenyador grafic (logo & publi placement)

