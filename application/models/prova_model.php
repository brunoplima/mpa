<?php
Class Prova_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getDisicplines(){
        $this->db->select('id, name');
        $query = $this->db->get('disciplines');
        if($query->num_rows() > 0){
            $q = $query->result_array();
            $ret = array();
            foreach ($q as $key => $value) {
                $ret[$value['id']] = $value['name'];
            }
            return $ret;
        }
        return array();
    }

    function getLevels(){
        $this->db->select('id, value');
        $query = $this->db->get('level_questions');
        if($query->num_rows() > 0){
            $q = $query->result_array();
            $ret = array();
            foreach ($q as $key => $value) {
                $ret[$value['id']] = $value['value'];
            }
            return $ret;
        }
        return array();
    }
}

/* End of file prova_model.php */
/* Location: ./application/models/prova_model.php */