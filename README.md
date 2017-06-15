# ENCICLOPÈDIA DE LA CORRUPCIÓ
Web per recopilar casos de corrupció a l'estat espanyol.

## Estat
En desenvolupament. Encara no anunciat enlloc.

## Tasques pendents (programació)
- [millora] CRUD - fixar caràcters màxims per inserts.
- [millora] CRUD - fixar caràcters màxims per updates.
- [millora] Canviar "delictes" per "descripció" a la taula "condemnes".
- [millora] Afegir camp per l'any que es va destapar el cas "any-destapat"?
- [millora] Implementar textarea customitzat per fer updates (edit mode).
- [nou] Detector automàtic de problemes: definir problemes.
- [nou] Afegir informació geogràfica (mireia: he pensat que al cas es podria afegir quines comunitats autonomes afecta (veig que punica, per exemple, esquitxa 4 comunitats)).
- [nou] Poder descarregar base de dades sencera (mysqldump).
- [nou] Gràfic de barres sota del top5 a pàgina inicial.
- [nou] Afegir un registre de canvis.
	- 1. Col.laboradors (user, password).
	- 2. Log: canvis associats a un col.laborador . poder desfer canvis.

## CSS breakpoints (mòbils i tablets)
- 560px (mobil portrait) (navbar).

## Estructura de dades
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

## Repartiment inversió/benefici
	- 10% Reserva per pagar coses
	- 45% Programació i manteniment (lluís)
	- 45% Omplir dades i manteniment (roger, mireia)

## Contractar més endavant
	- Publi
	- Logo & publi placement
