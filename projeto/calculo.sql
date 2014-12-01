select  dh.id_hashtag, h.peso_hashtag, h.peso_tema, dh.id_turma_disciplina, dh.id_disciplina from disciplina_hashtag dh 
inner join hashtag h on (h.id_hashtag = dh.id_hashtag)
where dh.id_disciplina = 1;

--calculo
select sum(peso)/totRegs  total 
from(
	select  SUM(h.peso_hashtag) * h.peso_tema peso, 	(	
		select count(distinct(id_aluno)) totRegs from disciplina_hashtag dh
		where dh.id_disciplina = 1
	) totRegs 
	from disciplina_hashtag dh 
	inner join hashtag h on (h.id_hashtag = dh.id_hashtag)
	where dh.id_disciplina = 1
	GROUP BY h.id_hashtag
) as subquery;



select * from disciplina_hashtag  
where id_disciplina = 1;
