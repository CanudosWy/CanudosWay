INSERT INTO disciplina values (default,'Algoritmos e Programação I','72', '1', False, 'Nenhum pré-requisito', 'Compreensão das técnicas de programação para a resolução de problemas computacionais', 'Representar a resolução de problemas através da construção de algoritmos utilizando conceitos de programação');
INSERT INTO disciplina values (default,'Laboratório de Programação I','72', '1', False, 'Nenhum pré-requisito', 'Compreensão, alteração e desenvolvimento de programas orientados a objeto utilizando um ambiente de desenvolvimento através de exemplos de aplicações', 'Alterar e desenvolver aplicações orientadas a objeto utilizando os conceitos de classe, objeto, atributo e método');
INSERT INTO disciplina values (default,'Matemática Aplicada','72', '1', False, 'Nenhum pré-requisito', 'Estudo de conceitos teóricos de lógica e matemática que são aplicados em áreas fundamentais do curso tecnólogo Análise e Desenvolvimento de Sistemas, como Banco de Dados, Linguagens de Programação, assim como, na Análise Quantitativa e Qualitativa de Processos', 'Usar os conhecimentos básicos da lógica e da matemática como base e fundamentação para as outras unidades curriculares do curso Análise e Desenvolvimento de Sistemas');
INSERT INTO disciplina values (default,'Sistemas de Informação e Processos','72', '1', False, 'Nenhum pré-requisito', 'Compreensão dos conceitos, objetivos, funções e componentes de Processos de Negócio e de Sistemas de Informação. As dimensões tecnológicas, organizacionais e Informação. Os tipos de Sistemas de Informação. Impacto dos Sistemas de Informação nas humanas dos Sistemas de organizações e nas pessoas', 'Identificar, analisar e relacionar sistemas de informação e processos de negócio');
INSERT INTO disciplina values (default,'Fundamentos de Informática','72', '1', False, 'Nenhum pré-requisito', 'Fundamentação dos conceitos básicos de informática', 'Conhecer os fundamentos da Informática, tais como fazer transformações de base e operações aritméticas em sistemas de numeração e noções sobre sistemas operacionais, linguagens de programação, redes, virtualização, banco de dados e softwares aplicativos');

INSERT INTO curso values (default,'Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas');

INSERT INTO curso_disciplina values (default, 1, 35);
INSERT INTO curso_disciplina values (default, 1, 36);
INSERT INTO curso_disciplina values (default, 1, 37);
INSERT INTO curso_disciplina values (default, 1, 38);
INSERT INTO curso_disciplina values (default, 1, 39);

INSERT INTO cad_turma values (default, 'ADS1N14/1A', 'Truma A, turno noite');

INSERT INTO professor values (default, 'Aline de Campos', 'Curriculo', null);

INSERT INTO turma values (default, 1, 1, 'Sala 701', 'Noite');

INSERT INTO turma_disciplina values (default, 1, 1, 35);
INSERT INTO turma_disciplina values (default, 1, 1, 36);
INSERT INTO turma_disciplina values (default, 1, 1, 37);
INSERT INTO turma_disciplina values (default, 1, 1, 38);
INSERT INTO turma_disciplina values (default, 1, 1, 39);

INSERT INTO hashtag values (default, '#barbadinha', 'Cadeira muito fácil', 1);
INSERT INTO hashtag values (default, '#meiaboca', 'Cadeira mais ou menos difícil', 4);
INSERT INTO hashtag values (default, '#complicada', 'Cadeira difícil', 1);
INSERT INTO hashtag values (default, '#extraclasse', 'Muito trabalho', 1);

INSERT INTO disciplina_hashtag values (default, 35, 2);
INSERT INTO disciplina_hashtag values (default, 35, 4);
INSERT INTO disciplina_hashtag values (default, 36, 1);
INSERT INTO disciplina_hashtag values (default, 36, 2);
INSERT INTO disciplina_hashtag values (default, 37, 3);
INSERT INTO disciplina_hashtag values (default, 37, 4);
INSERT INTO disciplina_hashtag values (default, 38, 4);
INSERT INTO disciplina_hashtag values (default, 38, 1);
INSERT INTO disciplina_hashtag values (default, 39, 3);
INSERT INTO disciplina_hashtag values (default, 39, 4);

--Select dados Disciplina
select disc.nome_disciplina, disc.horas, disc.semestre, 
disc.ead, disc.pre_requisito, disc.caracterizacao, disc.competencia_essencial,
cur.nome as curso, cadt.nome as turma, pro.nome as professor, pro.curriculo, h.nome as hashtag, h.descricao as descr_hash
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

