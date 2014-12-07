select  dh.id_hashtag, h.peso_hashtag, h.peso_tema, dh.id_turma_disciplina, dh.id_disciplina from disciplina_hashtag dh 
inner join hashtag h on (h.id_hashtag = dh.id_hashtag)
where dh.id_disciplina = 1;

--calculo

SELECT avg(h.peso_hashtag) total
FROM canudosway.disciplina_hashtag dh
inner join canudosway.hashtag h on (h.id_hashtag = dh.id_hashtag)
where id_disciplina = 1;


select * from disciplina_hashtag  
where id_disciplina = 1;
