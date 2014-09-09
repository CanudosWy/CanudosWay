<?php

class MainModel extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    
	public function lista($tabela){
		
		$query = $this->db->get($tabela);
		
		return $query->result();
	}
	
	
	public function inserir($dados,$tabela){
		$query = $this->db;
		
		$query->set($dados);
		$query->insert($this->table);
		
		
		return $query->insert_id();
		
	}
	
	
}