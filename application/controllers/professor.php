<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


include('mainController.php');

class Professor extends MainController {

	public function __construct(){
		parent::__construct();
		
		$this->titulo 				=	"CORPO DOCENTE";
		$this->table				=	"professor";
		$this->sessao				=	"professor";
		$this->campos				=	array('nome','curriculo');
	}
	
	public function index(){
		//passando de valores para a view
		$this->data['pagina']			=	'professor/lista';
		$this->data['classe_icone']		=	'ico-prof';
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		
		$this->data['dados']			=	$this->mainModel->lista($this->table);
		
		$this->load->view('template',$this->data);
	}
	
	public function busca(){
		//passando de valores para a view
		$this->data['pagina']			=	'professor/lista';
		$this->data['classe_icone']		=	'ico-prof';
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		
		$this->data['busca']			=	$_POST['busca'];
		
		$this->data['dados']			=	$this->mainModel->searchSingleFieldLike($this->table,'nome');
		
		$this->load->view('template',$this->data);
	}
	
	public function detalhe($id){
		
			$this->load->model('ProfessorModel', 'professorModel');
			
			//passando de valores para a view
			$this->data['pagina']			=	'professor/detalhe';
			$this->data['classe_icone']		=	'ico-prof';
			$this->data['titulo']			=	$this->titulo;
			$this->data['sessao']			=	$this->sessao;
			
			$this->data['disciplinas']		=	$this->professorModel->getDisciplinas($id);
			$this->data['professor']		=	$this->professorModel->get($id);
			
			$this->load->view('template',$this->data);
		
	}
	
	public function professores(){
		echo json_encode($this->mainModel->lista($this->table));
	}
	
}
