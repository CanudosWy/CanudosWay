<?php

class DisciplinaModel extends MainModel {


	function __construct()
	{
		parent::__construct();
	}

	public function detalhesDiciplina($id_disciplina){
		
		$this->db->select('disc.nome_disciplina, disc.horas, disc.semestre,
			disc.ead, disc.pre_requisito, disc.caracterizacao, disc.competencia_essencial,
			cur.nome as curso, cadt.nome as turma, pro.nome as professor, pro.curriculo, h.nome as hashtag, h.descricao as descr_hash');
		$this->db->from('disciplina as disc');
		$this->db->join('curso_disciplina as cd', 'disc.id_disciplina = cd.id_disciplina');
		$this->db->join('curso as cur', 'cd.id_curso = cur.id_curso');
		$this->db->join('turma_disciplina as td', 'disc.id_disciplina = td.id_disciplina');
		$this->db->join('turma as t', 'td.id_turma = t.id_turma');
		$this->db->join('cad_turma as cadt', 't.id_cad_turma = cadt.id_cad_turma');
		$this->db->join('professor as pro', 'td.id_professor = pro.id_professor');
		$this->db->join('disciplina_hashtag as dh', 'disc.id_disciplina = dh.id_disciplina');
		$this->db->join('hashtag as h', 'dh.id_hashtag = h.id_hashtag');
		$this->db->where('disc.id_disciplina', $id_disciplina);

		$query = $this->db->get();
		
		return $query->result();
	}

	public function grade(){
		
		$this->db->select('*');
		$this->db->from('disciplina as d');
		$this->db->join('turma_disciplina as td', 'd.id_disciplina = td.id_disciplina');		

		$query = $this->db->get();
		
		return $query->result();
	}
}

