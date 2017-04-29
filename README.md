# GRAN ENCICLOPEDIA DE LA CORRUPCIO

Web per recopilar casos de corrupcio a l'estat espanyol.

## Estat
En desenvolupament. Encara no anunciat enlloc.

## Tasques pendents (programacio)
- CRUD - fixar caracters maxims per inserts
- CRUD - fixar caracters maxims per updates
- Poder descarregar base de dades sencera
- Implementar textarea per updates (edit mode)
- Grafic de barres sota del top5 a pagina inicial
- Incorporar ciutats (pensar)
- Registre de canvis
	- 1. Col.laboradors (user, password)
	- 2. Log: canvis associats a un col.laborador . poder desfer canvis

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
  - on delete {cas,persona,partit,empresa} delete relacions_persona_X
  - on delete relacions_persona_cas delete condemna
  - on update {cas,persona,partit,empresa} update timestamp

## Proposta inicial de repartiment inversio/benefici
	- 50% Programacio i manteniment
	- 40% Omplir dades i manteniment
	- 10% Reserva per pagar serveis a contractar

## Contractar més endavant
	- Posar publicitat
	- Dissenyador grafic (logo & publi placement)

