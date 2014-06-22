<?php
Class UserAuth_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function check_user_pass($username, $password){
        $this->db->where('username',$username);
        $this->db->where('password',MD5($password));
        $this->db->limit(1);
        $query = $this->db->get('aluno');
        return $query->num_rows() == 1;
    }

    function getName($username){
        $this->db->select('name');
        $this->db->where('username',$username);
        $this->db->limit(1);
        $query = $this->db->get('aluno');
        if($query->num_rows() == 1){
            $ret = $query->result_array();
            return $ret[0]['name'];
        }
        return NULL;
    }
}

/* End of file userauth_model.php */
/* Location: ./application/models/userauth_model.php */