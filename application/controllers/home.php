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
	
	public function index(){
		//passando de valores para a view
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		
		$this->load->view('home/inicio',$this->data);
	}
	
	public function grade(){
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		
		$this->data['dados']			=	$this->mainModel->lista($this->table);
		
		$this->load->view('home/grade',$this->data);
	}

	
}
