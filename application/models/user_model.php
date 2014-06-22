<?php
Class User_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getUsers(){
        $query = $this->db->get('aluno');
        if($query->num_rows() > 0)
            return $query->result_array();
        return array();
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */