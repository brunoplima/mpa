<?php
Class Aluno_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
}

/* End of file aluno_model.php */
/* Location: ./application/models/aluno_model.php */