<?php
Class Commom_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getColleges(){
		$query = $this->db->get('colleges');
		$ret = array(''=>'');
		foreach ($query->result() as $row)
			$ret[$row->id] = $row->name;
		return $ret;
	}

	public function check_college_existence($college){
		$this->db->where('id',$college);
		$query = $this->db->get('colleges');
		return $query->num_rows() > 0;
	}
}

/* End of file commom_model.php */
/* Location: ./application/models/commom_model.php */