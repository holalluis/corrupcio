/*
	Taules amb triggers:
		- persones
		- casos
		- empreses
		- partits
		- relacions_persona_cas
*/

/* 
si esborres persona
	- esborra relacions_persona_cas
	- esborra relacions_persona_partit
	- esborra relacions_persona_empresa 
	*/
	DELIMITER $$
	CREATE TRIGGER `delete_relacions_persona_xxx`
	AFTER DELETE ON persones
	FOR EACH ROW
	BEGIN
		DELETE FROM relacions_persona_cas     WHERE persona_id = OLD.id;
		DELETE FROM relacions_persona_partit  WHERE persona_id = OLD.id;
		DELETE FROM relacions_persona_empresa WHERE persona_id = OLD.id;
	END
	$$
	DELIMITER ;

/* si esborres cas
	- esborra relacions_persona_cas */
	DELIMITER $$
	CREATE TRIGGER `delete_relacions_persona_cas`
	AFTER DELETE ON casos
	FOR EACH ROW
	BEGIN
		DELETE FROM relacions_persona_cas WHERE cas_id = OLD.id;
	END
	$$
	DELIMITER ;

/* si esborres partit
	esborra relacions_persona_partit */
	DELIMITER $$
	CREATE TRIGGER `delete_relacions_persona_partit`
	AFTER DELETE ON partits
	FOR EACH ROW
	BEGIN
		DELETE FROM relacions_persona_partit WHERE partit_id = OLD.id;
	END
	$$
	DELIMITER ;

/*si esborres empresa
	esborra relacions_persona_empresa*/
	DELIMITER $$
	CREATE TRIGGER `delete_relacions_persona_empresa`
	AFTER DELETE ON empreses
	FOR EACH ROW
	BEGIN
		DELETE FROM relacions_persona_empresa WHERE empresa_id = OLD.id;
	END
	$$
	DELIMITER ;

/*si esborres relacio_persona_cas
	esborra condemna*/
	DELIMITER $$
	CREATE TRIGGER `delete_condemna`
	AFTER DELETE ON relacions_persona_cas
	FOR EACH ROW
	BEGIN
		DELETE FROM condemnes WHERE relacio_persona_cas_id = OLD.id;
	END
	$$
	DELIMITER ;
