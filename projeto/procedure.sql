

DROP PROCEDURE IF EXISTS atualiza_situacao_disciplina;

DELIMITER //
CREATE PROCEDURE atualiza_situacao_disciplina(IN id int) 

BEGIN 
	DECLARE total double;
	
	SELECT avg(h.peso_hashtag) INTO total
	FROM canudosway.disciplina_hashtag dh
	inner join canudosway.hashtag h on (h.id_hashtag = dh.id_hashtag)
	where id_disciplina = id;
	
	IF total <= 0.85 THEN
		update canudosway.disciplina d set d.nivel_dificuldade = 'F' where d.id_disciplina = id;
	ELSEIF (total > 0.85 AND total < 1.15) THEN
		update canudosway.disciplina d set d.nivel_dificuldade = 'M' where d.id_disciplina = id;
	ELSEIF total >= 1.15 THEN
		update canudosway.disciplina d set d.nivel_dificuldade = 'D' where d.id_disciplina = id;
	END IF;
END//;

