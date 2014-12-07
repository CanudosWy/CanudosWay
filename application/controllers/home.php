<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


include('mainController.php');

class Home extends MainController {

	public function __construct(){
		parent::__construct();
		
		$this->titulo 				=	"HOME";
		$this->table				=	"disciplina";
		$this->sessao				=	"home";
		$this->campos				=	array('nome_disciplina','semestre','horas');//campos da tabela
		
		$newdata = array(
			'userid'  => '1'
			);
		$this->session->set_userdata($newdata);
		
		$this->load->model('DisciplinaModel', 'disciplinaModel');
		
	}
	
	public function index(){
		//passando de valores para a view
		$this->data['titulo']			=	$this->titulo;
		$this->data['sessao']			=	$this->sessao;
		
		$this->load->view('home/inicio',$this->data);
	}
	
	public function grade(){
		$id_user = $this->session->userdata('userid');		
		$this->data['pagina']			=	'home/grade';
		$this->data['classe_icone']		=	'ico-grade';
		$this->data['titulo']			=	'GRADE CURRICULAR';
		$this->data['sessao']			=	$this->sessao;
		
		$this->data['dados']			=	$this->disciplinaModel->grade($id_user);
		$this->data['dadosProfessor']	=	$this->disciplinaModel->professor($id_user);
		
		$this->load->view('template',$this->data);
	}
	
	public function votacao($aluno,$disciplina,$turma){
		
		if($this->disciplinaModel->validaAlunoVotacao($aluno,$disciplina) > 0){
			//ja votou para essa disciplina
			
			$this->data['msg']			=	"Você ja votou nesta disciplina";
			
			$this->load->view('home/votacaoErro',$this->data);

		}else{
			//passando de valores para a view
			$this->data['pagina']			=	'home/votacao';
			$this->data['classe_icone']		=	'ico-grade';
			$this->data['titulo']			=	'GRADE CURRICULAR';
			$this->data['sessao']			=	$this->sessao;
			
			$this->data['dados']			=	$this->disciplinaModel->hashtags();
			$this->data['aluno']			=	$aluno;
			$this->data['disciplina']		=	$disciplina;
			$this->data['turma']			=	$turma;
			
			$this->load->view('home/votacao',$this->data);
		}
	}
	
	public function salvarVotacao(){

		$aluno			=	$this->input->post('id_aluno');
		$disciplina		=	$this->input->post('id_disciplina');
		$turma			=	$this->input->post('id_turma');
		
		$data = array();
		
		if($this->input->post('dificuldade') != false){
			array_push($data, array(
				'id_aluno' => $aluno ,
				'id_disciplina' => $disciplina ,
				'id_turma_disciplina' => $turma,
				'id_hashtag' => $this->input->post('dificuldade')
				));
		} 
		if($this->input->post('trabalhos') != false){
			array_push($data, array(
				'id_aluno' => $aluno ,
				'id_disciplina' => $disciplina ,
				'id_turma_disciplina' => $turma,
				'id_hashtag' => $this->input->post('trabalhos')
				));
		} 
		if($this->input->post('provas') != false){
			array_push($data, array(
				'id_aluno' => $aluno ,
				'id_disciplina' => $disciplina ,
				'id_turma_disciplina' => $turma,
				'id_hashtag' => $this->input->post('provas')
				));
		} 
		if($this->input->post('quantidadeConteudo') != false){
			array_push($data, array(
				'id_aluno' => $aluno ,
				'id_disciplina' => $disciplina ,
				'id_turma_disciplina' => $turma,
				'id_hashtag' => $this->input->post('quantidadeConteudo')
				));
		} 
		
		$this->disciplinaModel->salvarVotacao($data);
		
		echo json_encode($this->data['msg']	=	"Votação salva com sucesso!");
		
		
	}
	
	public function dificuldade($id_disciplina){
	
		var_dump($this->disciplinaModel->dificuldade($id_disciplina));
	}
	
}
