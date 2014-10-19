<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainController extends CI_Controller {
	
	//armazena o titulo da pagina atual
	var $title;
	
	//armazena o titulo da pagina
	var $pageTitle;
	
	//armazena o caminho da acao a ser coloca em um botão ou link
	var $action;
	
	//armazena o caminho para voltar a lista deseja
	var $back;
	
	//armazena a quantidade de registro por pagina
	var $rec_number;
	
	//armazena a tabela espefica
	var $table;
	
	//armazena a sessao
	var $sessao;
	
	//armazena o numero da pagina para exibir na lista
	var $pagina;
	
	//armazena os campos da tabela para usar no cadastro,etc
	var $campos = array();
	
	//armazena os dados da tabela para usar no cadastro,etc
	var $data;
	
	//armazena o campo para usar no update
	var $updateField;
	
	var $campoWhere;
	
	var $idWhere;
	
	
	function __construct() {
        parent::__construct();
		//carrega o model com metodos padrao	
		$this->load->model('MainModel', 'mainModel');			
	}
	
	public function index()
	{
	
		redirect(base_url().$this->sessao.'/lista');
		
	}
	
	public function lista(){
		
		//passando de valores para a view
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		$this->data['dados']			=	$this->mainModel->lista($this->table);
		$this->data['pagina']			=	$this->sessao.'/lista';	
		
		$this->load->view('template',$this->data);
		
	}
	
	public function novo(){
		
		//passando de valores para a view
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		$this->data['acao']			=	'novo';
		$this->data['pagina']			=	$this->sessao.'/novo';	
		
		$this->load->view('template',$this->data);
		
	}
	
	public function salvar($id = false){
		
		$dados			= array();
		
		foreach($this->campos as $campo){
			if($campo == 'senha'){
				$dados[$campo]	=	md5($this->input->post($campo));
			}else{
				$dados[$campo]	=	$this->input->post($campo);
			}
		}		
		if($this->mainModel->inserir($dados,$this->table)){
			redirect(base_url().$this->sessao.'/lista');
		}else{
			echo 'ERRO AO INSERIR '.$this->sessao;
		}
		
		
	}
	
	
	
}
