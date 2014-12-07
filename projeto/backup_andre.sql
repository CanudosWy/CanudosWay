-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.12-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela canudosway.aluno
CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(45) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `usuario_idx` (`id_usuario`),
  CONSTRAINT `usuario_aluno` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.aluno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
REPLACE INTO `aluno` (`id_aluno`, `matricula`, `nome`, `id_usuario`) VALUES
	(1, '631210340', 'Fernando Silva', 1);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.aluno_curso
CREATE TABLE IF NOT EXISTS `aluno_curso` (
  `id_aluno_curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno_curso`),
  KEY `aluno_idx` (`id_aluno`),
  KEY `curso_idx` (`id_curso`),
  CONSTRAINT `aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.aluno_curso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno_curso` DISABLE KEYS */;
REPLACE INTO `aluno_curso` (`id_aluno_curso`, `id_aluno`, `id_curso`) VALUES
	(1, 1, 1);
/*!40000 ALTER TABLE `aluno_curso` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.aluno_turma
CREATE TABLE IF NOT EXISTS `aluno_turma` (
  `id_aluno_turma` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno_turma`),
  KEY `aluno_idx` (`id_aluno`),
  KEY `turma_idx` (`id_turma`),
  CONSTRAINT `aluno_turma` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `turma_aluno` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.aluno_turma: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno_turma` DISABLE KEYS */;
REPLACE INTO `aluno_turma` (`id_aluno_turma`, `id_aluno`, `id_turma`) VALUES
	(2, 1, 2);
/*!40000 ALTER TABLE `aluno_turma` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.aluno_turma_disciplina
CREATE TABLE IF NOT EXISTS `aluno_turma_disciplina` (
  `id_aluno_turma_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_turma_disciplina` int(11) NOT NULL,
  `situacao` char(2) NOT NULL DEFAULT 'C' COMMENT 'C = Cursando\nNC = Não Cursado\nA = Aprovado',
  PRIMARY KEY (`id_aluno_turma_disciplina`),
  KEY `fk_aluno_idx` (`id_aluno`),
  KEY `fk_turma_disciplina_idx` (`id_turma_disciplina`),
  CONSTRAINT `fk_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_disciplina` FOREIGN KEY (`id_turma_disciplina`) REFERENCES `turma_disciplina` (`id_turma_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.aluno_turma_disciplina: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno_turma_disciplina` DISABLE KEYS */;
REPLACE INTO `aluno_turma_disciplina` (`id_aluno_turma_disciplina`, `id_aluno`, `id_turma_disciplina`, `situacao`) VALUES
	(2, 1, 1, 'C'),
	(15, 1, 2, 'C'),
	(16, 1, 3, 'C'),
	(17, 1, 4, 'C'),
	(18, 1, 5, 'C'),
	(19, 1, 10, 'C'),
	(20, 1, 9, 'C'),
	(21, 1, 12, 'C'),
	(22, 1, 13, 'C');
/*!40000 ALTER TABLE `aluno_turma_disciplina` ENABLE KEYS */;


-- Copiando estrutura para procedure canudosway.atualiza_situacao_disciplina
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `atualiza_situacao_disciplina`(IN id int)
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
END//
DELIMITER ;


-- Copiando estrutura para tabela canudosway.cad_turma
CREATE TABLE IF NOT EXISTS `cad_turma` (
  `id_cad_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_cad_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.cad_turma: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_turma` DISABLE KEYS */;
REPLACE INTO `cad_turma` (`id_cad_turma`, `nome`, `descricao`) VALUES
	(1, 'ADS1N14/1A', 'Truma A, turno noite');
/*!40000 ALTER TABLE `cad_turma` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.curso: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
REPLACE INTO `curso` (`id_curso`, `nome`) VALUES
	(1, 'Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.curso_disciplina
CREATE TABLE IF NOT EXISTS `curso_disciplina` (
  `id_curso_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id_curso_disciplina`),
  KEY `curso_idx` (`id_curso`),
  KEY `disciplina_idx` (`id_disciplina`),
  CONSTRAINT `curso_disciplina` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.curso_disciplina: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `curso_disciplina` DISABLE KEYS */;
REPLACE INTO `curso_disciplina` (`id_curso_disciplina`, `id_curso`, `id_disciplina`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 1, 7),
	(8, 1, 8),
	(9, 1, 9),
	(10, 1, 10),
	(11, 1, 11),
	(12, 1, 12),
	(13, 1, 13),
	(14, 1, 14),
	(15, 1, 15),
	(16, 1, 16),
	(17, 1, 17),
	(18, 1, 18),
	(19, 1, 19),
	(20, 1, 20),
	(21, 1, 21),
	(22, 1, 22),
	(23, 1, 23),
	(24, 1, 24),
	(25, 1, 25),
	(26, 1, 26),
	(27, 1, 27),
	(28, 1, 28),
	(29, 1, 29),
	(30, 1, 30),
	(31, 1, 31);
/*!40000 ALTER TABLE `curso_disciplina` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.disciplina
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(100) NOT NULL,
  `horas` varchar(45) NOT NULL,
  `semestre` int(11) NOT NULL,
  `ead` bit(1) NOT NULL,
  `pre_requisito` varchar(500) DEFAULT NULL,
  `caracterizacao` varchar(1000) DEFAULT NULL,
  `competencia_essencial` varchar(1000) DEFAULT NULL,
  `nivel_dificuldade` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.disciplina: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
REPLACE INTO `disciplina` (`id_disciplina`, `nome_disciplina`, `horas`, `semestre`, `ead`, `pre_requisito`, `caracterizacao`, `competencia_essencial`, `nivel_dificuldade`) VALUES
	(1, 'Algoritmos e Programação I', '72', 1, b'0', 'Nenhum pré-requisito', 'Compreensão das técnicas de programação para a resolução de problemas computacionais', 'Representar a resolução de problemas através da construção de algoritmos utilizando conceitos de programação', 'M'),
	(2, 'Laboratório de Programação I', '72', 1, b'0', 'Nenhum pré-requisito', 'Compreensão, alteração e desenvolvimento de programas orientados a objeto utilizando um ambiente de desenvolvimento através de exemplos de aplicações', 'Alterar e desenvolver aplicações orientadas a objeto utilizando os conceitos de classe, objeto, atributo e método', 'M'),
	(3, 'Matemática Aplicada', '72', 1, b'0', 'Nenhum pré-requisito', 'Estudo de conceitos teóricos de lógica e matemática que são aplicados em áreas fundamentais do curso tecnólogo Análise e Desenvolvimento de Sistemas, como Banco de Dados, Linguagens de Programação, assim como, na Análise Quantitativa e Qualitativa de Processos', 'Usar os conhecimentos básicos da lógica e da matemática como base e fundamentação para as outras unidades curriculares do curso Análise e Desenvolvimento de Sistemas', 'D'),
	(4, 'Sistemas de Informação e Processos', '72', 1, b'0', 'Nenhum pré-requisito', 'Compreensão dos conceitos, objetivos, funções e componentes de Processos de Negócio e de Sistemas de Informação. As dimensões tecnológicas, organizacionais e Informação. Os tipos de Sistemas de Informação. Impacto dos Sistemas de Informação nas humanas dos Sistemas de organizações e nas pessoas', 'Identificar, analisar e relacionar sistemas de informação e processos de negócio', 'M'),
	(5, 'Fundamentos de Informática', '72', 1, b'0', 'Nenhum pré-requisito', 'Fundamentação dos conceitos básicos de informática', 'Conhecer os fundamentos da Informática, tais como fazer transformações de base e operações aritméticas em sistemas de numeração e noções sobre sistemas operacionais, linguagens de programação, redes, virtualização, banco de dados e softwares aplicativos', 'F'),
	(6, 'Algoritmos e Programação II', '72', 2, b'0', 'Algoritmos e Programação I - Laboratório de Programação I', 'Desenvolver os conhecimentos sobre estruturas de dados, orientação a objetos e técnicas para desenvolvimento de aplicações complexas', 'Conhecer os fundamentos da Informática, tais como fazer transformações de base e operações aritméticas em sistemas de numeração e noções sobre sistemas operacionais, linguagens de programação, redes, virtualização, banco de dados e softwares aplicativos', NULL),
	(7, 'Programação para Internet I', '72', 2, b'0', 'Nenhum pré-requisito', 'Estudo e prática da construção de aplicações para web utilizando-se de linguagens específicas para esta plataforma. Conhecimento em linguagem de marcação, de estilo e desenvolvimento para internet com orientação a objetos em linguagem dinâmica e integração com bases de dados', 'Compreender, selecionar e aplicar tecnologias da Web e da Internet no desenvolvimento de \naplicações', 'D'),
	(8, 'Banco de Dados I', '72', 2, b'0', 'Fundamentos de Informática', 'Funcionamento, arquitetura e conceitos fundamentais dos bancos de dados relacionais e objeto relacionais. Utilização de linguagem DDL para a construção de bases de dados conforme regras de normalização; linguagem DML para manipulação de dados; comandos para manipular privilégios de acesso a objetos existentes no banco de dados', 'Manipular sistema gerenciador de banco de dados relacional para criação de estruturas, população de \nbases de dados e consultas relativas à resolução de situações problema propostas', NULL),
	(9, 'Engenharia de Software I', '72', 2, b'0', 'Nenhum pré-requisito', 'Modelagem e especificação de necessidades a serem atendidas por um sistema de software na abordagem de análise orientada a objetos', 'Propor soluções em conformidade com os critérios de aceitação do cliente através da abordagem de \nobjetos', NULL),
	(10, 'Organização de Computadores', '72', 2, b'0', 'Fundamentos de Informática', 'Conhecimento dos princípios básicos da eletricidade. Identificação de formas básicas de representação de dados e compreensão do funcionamento da estrutura interna de um computador', 'Conhecer os princípios básicos da eletricidade. Reconhecer o funcionamento do hardware nos \nsistemas computacionais, baseados no modelo de Von Neumann, e representar os circuitos digitais \nbásicos utilizados na implementação de processadores e memórias', NULL),
	(11, 'Algoritmos e Programação III', '72', 3, b'0', 'Algoritmos e Programação II', 'Desenvolver a capacidade de utilizar estruturas de dados complexas', 'Compreender, alterar e desenvolver aplicações que utilizam estruturas de dados não lineares', NULL),
	(12, 'Laboratório de Programação II', '72', 3, b'0', 'Banco de Dados I - Algoritmos II', 'Desenvolver a capacidade de desenvolver uma aplicação completa, que implementa os requisitos de um sistema de informação', 'Desenvolver aplicações que realizem acesso a um sistema gerenciador de bancos de dados e apresentem interfaces de usuário com janelas, ícones, menus e dispositivo apontador', NULL),
	(13, 'Banco de Dados II', '72', 3, b'0', 'Banco de Dados I', 'Programação em banco de dados objeto relacional utilizando gatilhos, funções e procedimentos. Estudo e geração de índices para bancos de dados; Verificação e melhoria de desempenho em consultas; Controle transacional e acesso concorrente a bases de dados. Conceitos relacionados a Business Intelligence', 'Solucionar problemas através da utilização de linguagem de programação para bancos de dados, utilizando técnicas adequadas quanto ao desempenho da solução construída', NULL),
	(14, 'Engenharia de Software II', '72', 3, b'0', 'Engenharia de Software I', 'Modelagem e especificação de necessidades a serem atendidas por um sistema de software na abordagem de projeto orientado a objetos', 'Propor soluções em conformidade com qualidade de código, desempenho e robustez na abordagem de objetos, alinhadas com especificações em nível de análise', NULL),
	(15, 'Ética, Cidadania e Sustentabilidade (EAD)', '72', 3, b'1', 'Nenhum pré-requisito', 'Aborda noções de direitos humanos e sustentabilidade socioambiental, assim como elementos que caracterizam a formação cultural brasileira, a diversidade de grupos e sujeitos historicamente excluídos, com destaque para aspectos históricos e culturais dos povos afro-brasileiros e indígenas', 'Agir de forma ética, defendendo os princípios da dignidade humana, da igualdade de direitos, da democracia, da sustentabilidade ambiental e do reconhecimento e valorização das diferenças e da \ndiversidade democracia, da sustentabilidade ambiental e do reconhecimento e valorização das diferenças e da diversidade', NULL),
	(16, 'Interface Homem Computador', '72', 3, b'0', 'Programação para Internet I', 'Aplicação dos princípios de usabilidade e experiências do usuário', 'Projetar ou modificar sistemas computacionais para aumentar a usabilidade, conforto e eficiência do sistema par ao ser humano', NULL),
	(17, 'Projeto de Desenvolvimento', '72', 4, b'0', 'Engenharia de Software II - Laboratório III', 'Simular uma experiência de participação em um projeto de desenvolvimento de software', 'Elaboração de um projeto de desenvolvimento de software multidisciplinar cujo tema deverá estar relacionado a Análise e Desenvolvimento de Sistemas', NULL),
	(18, 'Comunicação e Expressão (EAD)', '72', 4, b'1', 'Nenhum pré-requisito', 'Utilização da comunicação nas dimensões oral e escrita, mediante técnicas de apresentação oral e construção textual', 'Utilizar a comunicação oral e escrita, mediante a construção teórica e prática dos diferentes elementos que a compõem, utilizando a norma culta da língua; visando a exposição de ideias de maneira clara, objetiva e segura, possibilitando uma atuação profissional diferenciada', NULL),
	(19, 'Programação para Internet II', '72', 4, b'0', 'Banco de Dados I - Laboratório III', 'Aplicar padrões arquiteturais com o objetivo de dividir sistemas Web em camadas lógicas. Criar dados semi-estruturados no formato XML e integrar por meio de serviços Web. Desenvolvimento de aplicações corporativas para Internet que utilizam e oferecem serviços', 'Compreender, selecionar e utilizar serviços necessários para o desenvolvimento de Aplicações Web, com integração de serviços', NULL),
	(20, 'Engenharia de Software III', '72', 4, b'0', 'Engenharia de Software II', 'Compreensão e aplicação de técnicas e práticas a partir da identificação de ciclo de vida de projeto', 'Reconhecer e aplicar diferentes práticas de Engenharia de Software no ciclo de desenvolvimento de software', NULL),
	(21, 'Sistemas Operacionais', '72', 4, b'0', 'Fundamentos de Informática', 'Compreensão dos conceitos básicos de sistemas operacionais e de seus respectivos subsistemas', 'Identificar um sistema operacional, sua função e características de acordo com a forma de processamento, programação e utilização', NULL),
	(22, 'TCC I', '72', 5, b'0', 'Projeto de Desenvolvimento', 'Realização de um projeto prático de desenvolvimento de um software (dos requisitos à codificação), relatado sob a forma de um relatório de projeto', 'Aplicação de técnicas de análise e modelagem para o desenvolvimento de um projeto prático - Trabalho de Conclusão de Curso', NULL),
	(23, 'Gerência de Projetos', '72', 5, b'0', 'Engenharia de Software III', 'Abordagem de aspectos de Liderança e Tomada de Decisão: modelos de tomada de decisão, atribuições e habilidades do gerente, e implicações gerenciais no projeto; Analisar e entender as etapas do projeto: iniciação, planejamento, execução, controle e finalização. Planejamento de projetos: 9 áreas do conhecimento', 'Desenvolver, analisar e executar um projeto', NULL),
	(24, 'Redes de Computadores I', '72', 5, b'0', 'Redes de Computadores I', 'Conhecimento de conceitos relacionados aos princípios da comunicação de dados e redes de computadores', 'Identificar e reconhecer os conceitos fundamentais que envolvem redes de computadores', NULL),
	(25, 'Qualidade de Software', '72', 5, b'0', 'Engenharia de Software III', 'Conceitos de qualidade em desenvolvimento de software. Principais modelos e normas internacionais na área de Qualidade de Software Métricas de qualidade para o processo de desenvolvimento de software e seu produto.', 'Compreender os principais conceitos de qualidade em desenvolvimento de software utilizando métricas de qualidade para o processo de desenvolvimento de software e seu produto', NULL),
	(26, 'Sistemas Distribuídos', '72', 5, b'0', 'Programação para Internet II', 'Entender o funcionamento de Sistemas Distribuídos (SD), de uma maneira abrangente, através da apresentação dos princípios e práticas que envolvem aplicações desta natureza', 'Identificar problemas do cotidiano existentes em aplicações distribuídas e propor soluções relacionadas a sistemas distribuídos, aplicando o conhecimento sobre suas características, modelos, arquiteturas e funcionalidades', NULL),
	(27, 'TCC II', '72', 6, b'0', 'TCC I', 'Desenvolvimento de um sistema de software, o qual é relatado sob a forma de um relatório de projeto de especificação, implementação e validação de software', 'Efetuar modelagem nas diferentes dimensões do sistema (visão de negócio/análise/projeto) em conformidade com o escopo e plano de trabalho. Codificar o sistema, evidenciando viabilidade de conclusão do projeto de acordo com o plano de trabalho. Documentar artefatos relacionados ao desenvolvimento do projeto de acordo com o plano de trabalho e sistema desenvolvido. Contextualizar a utilidade do sistema desenvolvido no contexto em que o mesmo está inserido. Relatar oralmente o desenvolvimento do projeto', NULL),
	(28, 'Empreendedorismo (EAD)', '72', 6, b'1', 'Projeto de Desenvolvimento', 'A UC visa o desenvolvimento de competências relacionadas com a identificação das características do empreendedor, dos processos do empreendedorismo e com a com o objetivo de difundir a cultura empreendedora e formar líderes empreendedores que elaboração do plano de negócios, compreendam e pratiquem o processo de planejamento sistêmico de um empreendimento', 'Reconhecer os princípios de empreendedorismo e incorporar as características do empreendedor, aplicando-os no planejamento, sustentabilidade e gestão de empreendimentos', NULL),
	(29, 'Tópicos Avançados em ADS', '72', 6, b'0', 'Projeto de Desenvolvimento', 'Realização de seminários abordando temas emergentes de caráter tecnológico, teórico e metodológico', 'Aplicar conhecimentos e implementar práticas ligadas às novas tecnologias e/ou tendências da análise e desenvolvimento de sistemas.', NULL),
	(30, 'Gestão de TI', '72', 6, b'0', 'Gerência de Projetos', 'Caracteriza-se por abordar conhecimentos atuais, teóricos/práticos, referente aos tópicos em Gestão da Tecnologia da Informação e Conhecimento, bem como envolver aspectos de responsabilidade social associados a TI', 'Identificar, analisar e relacionar técnicas de gestão da tecnologia da informação e conhecimento', NULL),
	(31, 'Segurança de Sistemas', '72', 6, b'0', 'Redes I', 'Definição de procedimentos operacionais, visando à segurança, privacidade e exatidão das informações', 'Identificar ameaças e vulnerabilidades. Identificar e avaliar os riscos associados. Definir e gerenciar os controles de segurança apropriados para os sistemas e informações nas organizações', NULL);
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.disciplina_hashtag
CREATE TABLE IF NOT EXISTS `disciplina_hashtag` (
  `id_disciplina_hashtag` int(11) NOT NULL AUTO_INCREMENT,
  `id_disciplina` int(11) NOT NULL,
  `id_hashtag` int(11) NOT NULL,
  `id_turma_disciplina` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina_hashtag`),
  KEY `disciplina_hashtag_idx` (`id_disciplina`),
  KEY `hashtag_disciplina_idx` (`id_hashtag`),
  KEY `aluno_idx` (`id_aluno`),
  KEY `turma_disciplina_idx` (`id_turma_disciplina`),
  CONSTRAINT `fk_aluno2` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplina_hashtag2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hashtag_disciplina2` FOREIGN KEY (`id_hashtag`) REFERENCES `hashtag` (`id_hashtag`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_disciplina2` FOREIGN KEY (`id_turma_disciplina`) REFERENCES `turma_disciplina` (`id_turma_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.disciplina_hashtag: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `disciplina_hashtag` DISABLE KEYS */;
REPLACE INTO `disciplina_hashtag` (`id_disciplina_hashtag`, `id_disciplina`, `id_hashtag`, `id_turma_disciplina`, `id_aluno`) VALUES
	(1, 1, 1, 1, 1),
	(2, 1, 4, 1, 1),
	(3, 1, 7, 1, 1),
	(4, 1, 10, 1, 1),
	(5, 2, 2, 2, 1),
	(6, 2, 5, 2, 1),
	(7, 2, 8, 2, 1),
	(8, 2, 11, 2, 1),
	(9, 3, 3, 3, 1),
	(10, 3, 6, 3, 1),
	(11, 3, 9, 3, 1),
	(12, 3, 12, 3, 1),
	(13, 4, 2, 4, 1),
	(14, 4, 4, 4, 1),
	(15, 4, 9, 4, 1),
	(16, 4, 11, 4, 1),
	(17, 5, 1, 5, 1),
	(18, 5, 5, 5, 1),
	(19, 5, 8, 5, 1),
	(20, 5, 10, 5, 1),
	(21, 6, 1, 6, 1),
	(22, 6, 5, 6, 1),
	(23, 6, 12, 6, 1),
	(24, 6, 9, 6, 1),
	(25, 7, 3, 7, 1),
	(26, 7, 6, 7, 1),
	(27, 7, 11, 7, 1),
	(28, 7, 8, 7, 1),
	(29, 1, 1, 1, 1),
	(30, 1, 3, 1, 1),
	(31, 1, 1, 1, 1),
	(33, 7, 1, 1, 1);
/*!40000 ALTER TABLE `disciplina_hashtag` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.hashtag
CREATE TABLE IF NOT EXISTS `hashtag` (
  `id_hashtag` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `peso_hashtag` double NOT NULL,
  `tema` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_hashtag`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.hashtag: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `hashtag` DISABLE KEYS */;
REPLACE INTO `hashtag` (`id_hashtag`, `nome`, `descricao`, `peso_hashtag`, `tema`) VALUES
	(1, '#Barbada', '', 0.8, 'Dificuldade'),
	(2, '#Over8000', '', 1.6, 'Dificuldade'),
	(3, '#ChuckNorris', '', 2.4, 'Dificuldade'),
	(4, '#NoWorkToDo', '', 0.3, 'Trabalhos'),
	(5, '#LightWork', '', 0.6, 'Trabalhos'),
	(6, '#NoLife', '', 0.9, 'Trabalhos'),
	(7, '#NoNews', '', 0.4, 'Quantidade de Conteudo'),
	(8, '#EasyRead', '', 0.8, 'Quantidade de Conteudo'),
	(9, '#VivaLendo', '', 1.2, 'Quantidade de Conteudo'),
	(10, '#EasyTest', '', 0.5, 'Provas'),
	(11, '#ComoSempre', '', 1, 'Provas'),
	(12, '#YouAreNotPrepared', '', 1.5, 'Provas');
/*!40000 ALTER TABLE `hashtag` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.perfil
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.perfil: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
REPLACE INTO `perfil` (`id_perfil`, `nome`) VALUES
	(1, 'Aluno');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.pre_requisitos
CREATE TABLE IF NOT EXISTS `pre_requisitos` (
  `id_disciplina` int(11) NOT NULL,
  `id_disciplina_pre_requisito` int(11) NOT NULL,
  KEY `fk_pre_requisitos_1_idx` (`id_disciplina`),
  KEY `fk_pre_requisitos_2_idx` (`id_disciplina_pre_requisito`),
  CONSTRAINT `fk_pre_requisitos_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pre_requisitos_2` FOREIGN KEY (`id_disciplina_pre_requisito`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.pre_requisitos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pre_requisitos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pre_requisitos` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.professor
CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `curriculo` text,
  `id_usuario` int(11) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `google` varchar(45) DEFAULT NULL,
  `curriculo_lattes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `usuario_idx` (`id_usuario`),
  CONSTRAINT `usuario_professor` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.professor: ~30 rows (aproximadamente)
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
REPLACE INTO `professor` (`id_professor`, `nome`, `curriculo`, `id_usuario`, `sexo`, `facebook`, `linkedin`, `twitter`, `google`, `curriculo_lattes`) VALUES
	(1, 'Aline de Campos', 'Mestre', NULL, 'F', 'face', 'link', 'tw', 'goo', 'lattes'),
	(2, 'Ivonei da Silva Marques', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(3, 'Marcela Gonçalves Santos', 'Mestre', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(4, 'Magda Leyser', 'Mestre', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(5, 'Roberto Zanoni', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(6, 'Rafael Jeffman', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(7, 'Fabio Giulian Marques', 'Especialista', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(8, 'Luis Ries', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(9, 'Antônio Ramos', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(10, 'Marco Mangan', 'Doutor', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(11, 'Pietro Cunha Dolci', 'Doutor', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(12, 'Márcia Vieira', 'Mestre', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(13, 'Thiago Motta', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(14, 'Sirlei Isaia', 'Mestre', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(15, 'Guilherme Bertoni Machado', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(16, 'Júlio Carnevale de Almeida', 'Especialista', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(17, 'Lúcia Saccomori', 'Mestre', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(18, 'Leda Cadore', 'Mestre', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(19, 'Fábio Dal´Osto', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(20, 'Alexandre Casacurta', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(21, 'Lizandro Kirst da Silva', 'Especialista', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(22, 'Rafael Gastão', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(23, 'Luciano Zanuz', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(24, 'Rui Gureghian Scarinci', 'Doutor', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(25, 'Carlos Carbonera', 'Especialista', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(26, 'Jader Marques', 'Mestre', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(27, 'Rafael Lossurdo', 'Especialsita', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(28, 'Kelber Albeche', 'Especialsita', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(29, 'Daniel Krauze', 'Especialsita', NULL, 'M', 'face', 'linkedin', 'twitter', 'google', 'lattes'),
	(30, 'Priscila Schafhauzer', 'Especialista', NULL, 'F', 'face', 'linkedin', 'twitter', 'google', 'lattes');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.turma
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `id_cad_turma` int(11) NOT NULL,
  `semestre_turma` int(11) NOT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `cad_turma_idx` (`id_cad_turma`),
  CONSTRAINT `cad_turma` FOREIGN KEY (`id_cad_turma`) REFERENCES `cad_turma` (`id_cad_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.turma: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
REPLACE INTO `turma` (`id_turma`, `id_cad_turma`, `semestre_turma`, `turno`, `ativo`) VALUES
	(1, 1, 1, 'Noite', b'0');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.turma_disciplina
CREATE TABLE IF NOT EXISTS `turma_disciplina` (
  `id_turma_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `id_turma` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `sala` varchar(45) DEFAULT NULL,
  `dia_semana` int(11) NOT NULL,
  `ativo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_turma_disciplina`),
  KEY `turma_disciplina_idx` (`id_turma`),
  KEY `disciplina_professor_idx` (`id_professor`),
  KEY `disciplina_turma_idx` (`id_disciplina`),
  CONSTRAINT `disciplina_professor` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `disciplina_turma` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `turma_disciplina` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.turma_disciplina: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `turma_disciplina` DISABLE KEYS */;
REPLACE INTO `turma_disciplina` (`id_turma_disciplina`, `id_turma`, `id_professor`, `id_disciplina`, `sala`, `dia_semana`, `ativo`) VALUES
	(1, 1, 2, 1, NULL, 1, NULL),
	(2, 1, 2, 2, NULL, 2, NULL),
	(3, 1, 18, 3, NULL, 3, NULL),
	(4, 1, 5, 4, NULL, 4, NULL),
	(5, 1, 7, 5, NULL, 5, NULL),
	(6, 1, 6, 6, NULL, 1, NULL),
	(7, 1, 21, 7, NULL, 2, NULL),
	(8, 1, 7, 8, NULL, 3, NULL),
	(9, 1, 5, 9, NULL, 4, NULL),
	(10, 1, 3, 10, NULL, 5, NULL),
	(11, 1, 6, 11, NULL, 1, NULL),
	(12, 1, 17, 12, NULL, 2, NULL),
	(13, 1, 19, 13, NULL, 3, NULL),
	(14, 1, 23, 14, NULL, 4, NULL),
	(15, 1, 1, 15, NULL, 5, NULL),
	(16, 1, 13, 16, NULL, 6, NULL),
	(17, 1, 1, 17, NULL, 1, NULL),
	(18, 1, 1, 18, NULL, 2, NULL),
	(19, 1, 27, 19, NULL, 3, NULL),
	(20, 1, 25, 20, NULL, 4, NULL),
	(21, 1, 3, 21, NULL, 5, NULL),
	(22, 1, 14, 22, NULL, 1, NULL),
	(23, 1, 24, 23, NULL, 2, NULL),
	(24, 1, 12, 24, NULL, 3, NULL),
	(25, 1, 14, 25, NULL, 4, NULL),
	(26, 1, 15, 26, NULL, 5, NULL),
	(27, 1, 14, 27, NULL, 1, NULL),
	(28, 1, 11, 28, NULL, 2, NULL),
	(29, 1, 15, 29, NULL, 3, NULL),
	(30, 1, 16, 30, NULL, 4, NULL),
	(31, 1, 28, 31, NULL, 5, NULL);
/*!40000 ALTER TABLE `turma_disciplina` ENABLE KEYS */;


-- Copiando estrutura para tabela canudosway.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `perfil_idx` (`id_perfil`),
  CONSTRAINT `perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela canudosway.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id_usuario`, `login`, `password`, `id_perfil`) VALUES
	(1, '631210340', '112233', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Copiando estrutura para trigger canudosway.trigger_calculo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trigger_calculo` AFTER INSERT ON `disciplina_hashtag` FOR EACH ROW BEGIN
   CALL atualiza_situacao_disciplina(NEW.id_disciplina);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
