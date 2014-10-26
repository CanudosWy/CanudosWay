<?php

class ProfessorModel extends MainModel {


	function __construct()
	{
		parent::__construct();
	}
	
	public function get($id){
		
		$this->db->where('id_professor', $id);
		$query = $this->db->get('professor');
		
		return $query->row();
	}
	
	public function getDisciplinas($id){
		
		$this->db->select('distinct(d.nome_disciplina)');
		$this->db->from('turma_disciplina td');
		$this->db->join('disciplina d', 'td.id_disciplina = d.id_disciplina');
		$this->db->where('td.id_professor', $id);
		
		$query = $this->db->get();
		
		return $query->result();
	}
}

