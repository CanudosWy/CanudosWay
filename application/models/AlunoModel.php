<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AlunoModel extends CI_Model {

    var $id_aluno   = '';
    var $matricula = '';
    var $nome   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_alunos()
    {
        $query = $this->db->get('aluno', 10);
        return $query->result();
    }
/*
    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
*/
}