# ENCICLOPÈDIA DE LA CORRUPCIÓ
- Web per recopilar casos de corrupció a l'estat espanyol.

## Estat
- En desenvolupament. De moment no anunciat enlloc.

## Temes a discutir (grup)
- llista de casos que hauríem de tenir dins la web.

## Tasques pendents (bugs/millores)
- [millora] anar directament a la pàgina de perfil després de crear un cas, persona, partit o empresa.
- [millora] quan es crea una relació persona-cas, la data de modificació del cas i la persona també s'han d'actualitzar.
- [millora] canviar llista de passwords per edit mode.
- [millora] canviar el nom del camp "delictes" per "descripcio" a la taula "condemnes".
- [millora] CRUD - fixar caràcters màxims per inserts.
- [millora] CRUD - fixar caràcters màxims per updates.
- [millora] afegir nou camp a la taula 'casos' per l'any que es va destapar el cas "any-destapat"
- [millora] detector automàtic de problemes: veure pendents a la mateixa pàgina.

## Tasques completades
- Implementar textarea customitzat per fer updates (edit mode).

## Wish list (idees noves)
- Afegir informació geogràfica (mireia: he pensat que al cas es podria afegir quines comunitats autonomes afecta (veig que punica, per exemple, esquitxa 4 comunitats)).
- Poder descarregar base de dades sencera (mysqldump).
- Gràfic de barres sota del top5 a pàgina inicial.
- Afegir un registre de canvis.
	- 1. Col.laboradors (user, password).
	- 2. Log: canvis associats a un col.laborador. 
	- 3. Poder desfer canvis? (control de versions).

## CSS breakpoints triats (mòbils i tablets)
- 560px (mobil portrait) (navbar).

## Estructura de dades actual
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
