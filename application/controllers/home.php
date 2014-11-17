<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


include('mainController.php');

class Home extends MainController {

	public function __construct(){
		parent::__construct();
		
		$this->titulo 				=	"HOME";
		$this->table				=	"disciplina";
		$this->sessao				=	"home";
		$this->campos				=	array('nome_disciplina','semestre','horas');//campos da tabela
		$this->load->model('DisciplinaModel', 'disciplinaModel');
	}
	
	public function index(){
		//passando de valores para a view
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		
		$this->load->view('home/inicio',$this->data);
	}
	
	public function grade(){
		$this->data['pagina']			=	'home/grade';
		$this->data['classe_icone']		=	'ico-grade';
		$this->data['titulo']			=	'GRADE CURRICULAR';
		$this->data['sessao']			=	$this->sessao;
		
		$this->data['dados']			=	$this->disciplinaModel->grade();
		
		$this->load->view('template',$this->data);
	}
	
	public function votacao(){
		//passando de valores para a view
		$this->data['pagina']			=	'home/votacao';
		$this->data['classe_icone']		=	'ico-grade';
		$this->data['titulo']			=	'GRADE CURRICULAR';
		$this->data['sessao']			=	$this->sessao;
		
		$this->data['dados']			=	$this->disciplinaModel->hashtags();
		
		$this->load->view('home/votacao',$this->data);
	}

	
}
