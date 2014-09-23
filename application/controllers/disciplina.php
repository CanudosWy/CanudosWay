<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('mainController.php');

class Disciplina extends MainController {

	
	public function __construct(){
		parent::__construct();
		
		$this->titulo 				=	"DISCIPLINAS";
		$this->table				=	"disciplina";
		$this->sessao				=	"disciplina";
		$this->campos				=	array('nome');//campos da tabela
		$this->load->model('DisciplinaModel', 'disciplinaModel');
	}


	public function getDetalhesDiciplina(){
		
		echo json_encode($this->disciplinaModel->detalhesDiciplina($_GET["id"]));

	}

	
}

