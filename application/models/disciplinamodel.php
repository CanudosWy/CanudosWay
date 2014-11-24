<?php

class DisciplinaModel extends MainModel {


	function __construct()
	{
		parent::__construct();
	}

	public function detalhesDiciplina($id_disciplina){
		
		$this->db->select('disc.nome_disciplina, disc.horas, disc.semestre,
			disc.ead, disc.pre_requisito, disc.caracterizacao, disc.competencia_essencial,
			cur.nome as curso, cadt.nome as turma, pro.nome as professor, pro.curriculo, h.nome as hashtag,
			count(dh.id_disciplina_hashtag) as qtdehashtag, h.descricao as descr_hash');
		$this->db->from('disciplina as disc');
		$this->db->join('curso_disciplina as cd', 'disc.id_disciplina = cd.id_disciplina');
		$this->db->join('curso as cur', 'cd.id_curso = cur.id_curso');
		$this->db->join('turma_disciplina as td', 'disc.id_disciplina = td.id_disciplina');
		$this->db->join('turma as t', 'td.id_turma = t.id_turma');
		$this->db->join('cad_turma as cadt', 't.id_cad_turma = cadt.id_cad_turma');
		$this->db->join('professor as pro', 'td.id_professor = pro.id_professor');
		$this->db->join('disciplina_hashtag as dh', 'disc.id_disciplina = dh.id_disciplina', 'left');
		$this->db->join('hashtag as h', 'dh.id_hashtag = h.id_hashtag', 'left');
		$this->db->where('disc.id_disciplina', $id_disciplina);
		$this->db->group_by('h.id_hashtag');

		$query = $this->db->get();
		
		return $query->result();
	}

	public function grade(){		

		$sql = "select *, 
		p.nome as nome_professor,
		(SELECT situacao
			FROM aluno_turma_disciplina as atd
			WHERE atd.id_turma_disciplina = td.id_turma_disciplina) as situacao
		from aluno as a
		join aluno_curso as ac on(a.id_aluno = ac.id_aluno)
		join curso as c on(ac.id_curso =  c.id_curso)
		join curso_disciplina as cd on (c.id_curso = cd.id_curso)
		join disciplina as d on(cd.id_disciplina = d.id_disciplina)
		join turma_disciplina as td on(d.id_disciplina = td.id_disciplina)
		join turma as t on(td.id_turma = t.id_turma)
		join cad_turma as ct on(t.id_cad_turma = ct.id_cad_turma)
		join professor as p on(p.id_professor = td.id_professor)
		where a.id_aluno = 4";

		$query = $this->db->query($sql);		

		return $query->result();

	}
	
	public function hashtags(){
		$query = $this->db->get('hashtag');
		
		return $query->result();
	}
	
	public function salvarVotacao($dados){
		$this->db->insert_batch('disciplina_hashtag', $dados);
	}
	
	public function validaAlunoVotacao($aluno,$disciplina){
		
		$this->db->select('*')->from('disciplina_hashtag')->where('id_aluno', $aluno)->where('id_disciplina', $disciplina); 
		$query = $this->db->get();
		
		return $query->num_rows();
		
	}
}

