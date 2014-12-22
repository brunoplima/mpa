<?php
Class UserAuth_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function check_user_pass($username, $password){
		$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		$this->db->limit(1);
		$query = $this->db->get('aluno');
		return $query->num_rows() == 1;
	}

	public function getData($username){
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get('aluno');
		if($query->num_rows() == 1){
			$ret = $query->result_array();
			return array('id' => $ret[0]['id'], 'name' => $ret[0]['name']);
		}
		return NULL;
	}

	public function check_username_uniqueness_signup($username){
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get('aluno');
		return $query->num_rows() == 0;
	}

	public function createUser($data){
		$fields['username']   = $data['username'];
		$fields['name']       = $data['realName'];
		$fields['password']   = md5($data['password']);
		$fields['id_college'] = $data['college'];
		$this->db->insert('aluno', $fields);
		return $this->db->affected_rows() > 0;
	}
}

/* End of file userauth_model.php */
/* Location: ./application/models/userauth_model.php */