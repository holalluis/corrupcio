# GRAN ENCICLOPEDIA DE LA CORRUPCIO

Web per recopilar casos de corrupcio a l'estat espanyol.

## Estat
En desenvolupament. Encara no anunciat enlloc.

## Tasques pendents (programacio)
- [millora] al botó view mode posar [on]/off - on/[off]
- [millora] Afegir descripcions de coses a les cerques
- [millora] CRUD - fixar caracters maxims per inserts
- [millora] CRUD - fixar caracters maxims per updates
- [millora] Implementar textarea customitzat per fer updates (edit mode)
- [nou] Poder descarregar base de dades sencera
- [nou] Grafic de barres sota del top5 a pagina inicial
- [nou] Incorporar ciutats (pensar)
- [nou] Registre de canvis
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

## Repartiment inversio/benefici
	- 10% Reserva per pagar coses
	- 45% Programacio i manteniment (lluís)
	- 45% Omplir dades i manteniment (roger, mireia)

## Contractar més endavant
	- Posar publicitat
	- Dissenyador grafic (logo & publi placement)

