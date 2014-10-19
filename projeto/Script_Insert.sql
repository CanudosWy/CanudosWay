INSERT INTO disciplina values (default,'Algoritmos e Programação I','72', '1', False, 'Nenhum pré-requisito', 'Compreensão das técnicas de programação para a resolução de problemas computacionais', 'Representar a resolução de problemas através da construção de algoritmos utilizando conceitos de programação');
INSERT INTO disciplina values (default,'Laboratório de Programação I','72', '1', False, 'Nenhum pré-requisito', 'Compreensão, alteração e desenvolvimento de programas orientados a objeto utilizando um ambiente de desenvolvimento através de exemplos de aplicações', 'Alterar e desenvolver aplicações orientadas a objeto utilizando os conceitos de classe, objeto, atributo e método');
INSERT INTO disciplina values (default,'Matemática Aplicada','72', '1', False, 'Nenhum pré-requisito', 'Estudo de conceitos teóricos de lógica e matemática que são aplicados em áreas fundamentais do curso tecnólogo Análise e Desenvolvimento de Sistemas, como Banco de Dados, Linguagens de Programação, assim como, na Análise Quantitativa e Qualitativa de Processos', 'Usar os conhecimentos básicos da lógica e da matemática como base e fundamentação para as outras unidades curriculares do curso Análise e Desenvolvimento de Sistemas');
INSERT INTO disciplina values (default,'Sistemas de Informação e Processos','72', '1', False, 'Nenhum pré-requisito', 'Compreensão dos conceitos, objetivos, funções e componentes de Processos de Negócio e de Sistemas de Informação. As dimensões tecnológicas, organizacionais e Informação. Os tipos de Sistemas de Informação. Impacto dos Sistemas de Informação nas humanas dos Sistemas de organizações e nas pessoas', 'Identificar, analisar e relacionar sistemas de informação e processos de negócio');
INSERT INTO disciplina values (default,'Fundamentos de Informática','72', '1', False, 'Nenhum pré-requisito', 'Fundamentação dos conceitos básicos de informática', 'Conhecer os fundamentos da Informática, tais como fazer transformações de base e operações aritméticas em sistemas de numeração e noções sobre sistemas operacionais, linguagens de programação, redes, virtualização, banco de dados e softwares aplicativos');

INSERT INTO curso values (default,'Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas');

INSERT INTO curso_disciplina values (default, 1, 1);
INSERT INTO curso_disciplina values (default, 1, 2);
INSERT INTO curso_disciplina values (default, 1, 3);
INSERT INTO curso_disciplina values (default, 1, 4);
INSERT INTO curso_disciplina values (default, 1, 5);

INSERT INTO cad_turma values (default, 'ADS1N14/1A', 'Truma A, turno noite');

INSERT INTO professor values (default, 'Aline de Campos', 'Breve descrição sobre Curriculo', null);

INSERT INTO turma values (default, 1, 1, 'Sala 701', 'Noite');

INSERT INTO turma_disciplina values (default, 1, 1, 1, 1);
INSERT INTO turma_disciplina values (default, 1, 1, 2, 2);
INSERT INTO turma_disciplina values (default, 1, 1, 3, 3);
INSERT INTO turma_disciplina values (default, 1, 1, 4, 4);
INSERT INTO turma_disciplina values (default, 1, 1, 5, 5);

INSERT INTO hashtag values (default, '#Barbada', '', 0, 'Dificuldade' , 0);
INSERT INTO hashtag values (default, '#Over8000', '', 0, 'Dificuldade' , 0);
INSERT INTO hashtag values (default, '#ChuckNorris', '', 0, 'Dificuldade' , 0);
INSERT INTO hashtag values (default, '#NoWorkToDo', '', 0, 'Trabalhos' , 0);
INSERT INTO hashtag values (default, '#LightWork', '', 0, 'Trabalhos' , 0);
INSERT INTO hashtag values (default, '#NoLife', '', 0, 'Trabalhos' , 0);
INSERT INTO hashtag values (default, '#NoNews', '', 0, 'Quantidade de Conteudo' , 0);
INSERT INTO hashtag values (default, '#EasyRead', '', 0, 'Quantidade de Conteudo' , 0);
INSERT INTO hashtag values (default, '#VivaLendo', '', 0, 'Quantidade de Conteudo' , 0);
INSERT INTO hashtag values (default, '#HojeTemProva?', '', 0, 'Provas' , 0);
INSERT INTO hashtag values (default, '#ComoSempre', '', 0, 'Provas' , 0);
INSERT INTO hashtag values (default, '#YouAreNotPrepared', '', 0, 'Provas' , 0);



INSERT INTO disciplina_hashtag values (default, 1, 1, 1, 1);
INSERT INTO disciplina_hashtag values (default, 1, 4, 1, 1);
INSERT INTO disciplina_hashtag values (default, 1, 7, 1, 1);
INSERT INTO disciplina_hashtag values (default, 1, 10, 1, 1);
INSERT INTO disciplina_hashtag values (default, 2, 2, 2, 1);
INSERT INTO disciplina_hashtag values (default, 2, 5, 2, 1);
INSERT INTO disciplina_hashtag values (default, 2, 8, 2, 1);
INSERT INTO disciplina_hashtag values (default, 2, 11, 2, 1);
INSERT INTO disciplina_hashtag values (default, 3, 3, 3, 1);
INSERT INTO disciplina_hashtag values (default, 3, 6, 3, 1);
INSERT INTO disciplina_hashtag values (default, 3, 9, 3, 1);
INSERT INTO disciplina_hashtag values (default, 3, 12, 3, 1);
INSERT INTO disciplina_hashtag values (default, 4, 2, 4, 1);
INSERT INTO disciplina_hashtag values (default, 4, 4, 4, 1);
INSERT INTO disciplina_hashtag values (default, 4, 9, 4, 1);
INSERT INTO disciplina_hashtag values (default, 4, 11, 4, 1);
INSERT INTO disciplina_hashtag values (default, 5, 1, 5, 1);
INSERT INTO disciplina_hashtag values (default, 5, 5, 5, 1);
INSERT INTO disciplina_hashtag values (default, 5, 8, 5, 1);
INSERT INTO disciplina_hashtag values (default, 5, 10, 5, 1);


--Select dados Disciplina

select disc.nome_disciplina, disc.horas, disc.semestre, 
disc.ead, disc.pre_requisito, disc.caracterizacao, disc.competencia_essencial,
cur.nome as curso, cadt.nome as turma, pro.nome as professor, pro.curriculo, 
h.nome as hashtag, h.descricao as descr_hash, count(dh.id_disciplina_hashtag) as qtdehashtag, td.dia_semana
from disciplina as disc
inner join curso_disciplina as cd on (disc.id_disciplina = cd.id_disciplina)
inner join curso as cur on (cd.id_curso = cur.id_curso)
inner join turma_disciplina as td on(disc.id_disciplina = td.id_disciplina)
inner join turma as t on(td.id_turma = t.id_turma)
inner join cad_turma as cadt on(t.id_cad_turma = cadt.id_cad_turma)
inner join professor as pro on(td.id_professor = pro.id_professor)
inner join disciplina_hashtag as dh on(disc.id_disciplina = dh.id_disciplina)
inner join hashtag as h on(dh.id_hashtag = h.id_hashtag)
where disc.id_disciplina = 35
group by h.id_hashtag

