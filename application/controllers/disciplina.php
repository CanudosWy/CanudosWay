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

	public function salvar(){

		$disciplinas = json_decode($this->input->post('data'));
		$data = array();
		foreach ($disciplinas as $key => $value) {	
			if($value->situacao != "C" || $value->situacao != "A"){	

				array_push($data, array(
					'id_aluno' => $value->id_aluno,				
					'id_turma_disciplina' => $value->id_turma_disciplina			
					));

			}else{
				echo json_encode($this->data['msg']	=	"Disciplina já cursando/cursada!");
				break;
			}
		}

		$this->disciplinaModel->salvarDisciplina($data);
		echo json_encode($this->data['msg']	=	"Registro salvo com sucesso!");
				
	}
	
}

