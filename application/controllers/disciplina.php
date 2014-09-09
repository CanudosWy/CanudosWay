<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('mainController.php');

class Disciplina extends MainController {

	
	public function __construct(){
		parent::__construct();
		
		$this->titulo 				=	"DISCIPLINAS";
		$this->table				=	"disciplinas";
		$this->sessao				=	"disciplina";
		$this->campos				=	array('nome');//campos da tabela
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
