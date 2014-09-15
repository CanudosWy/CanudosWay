<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


include('mainController.php');

class Home extends MainController {

	public function __construct(){
		parent::__construct();
		
		$this->titulo 				=	"HOME";
		$this->table				=	"disciplina";
		$this->sessao				=	"home";
		$this->campos				=	array('nome_disciplina','semestre','horas');//campos da tabela
	}

	
}
