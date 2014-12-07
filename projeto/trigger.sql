
 
 DELIMITER $$
CREATE TRIGGER `trigger_calculo` AFTER INSERT ON `disciplina_hashtag`
FOR EACH ROW
BEGIN
   CALL atualiza_situacao_disciplina(NEW.id_disciplina);
END;
$$