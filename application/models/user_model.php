<?php
Class User_model extends CI_Model
{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getUsers(){
			$query = $this->db->get('aluno');
			if($query->num_rows() > 0)
				return $query->result_array();
			return array();
		}

		public function getData($id){
			// $this->db->select('id, name');
			$this->db->where('id',$id);
			$this->db->limit(1);
			$query = $this->db->get('aluno');
			$ret = $query->result_array();
			return isset($ret[0]) ? $ret[0] : NULL;
		}

		public function check_user_pass_change($id, $password){
			$this->db->where('id',$id);
			$this->db->where('password',MD5($password));
			$this->db->limit(1);
			$query = $this->db->get('aluno');
			return $query->num_rows() == 1;
		}

		public function _check_username_uniqueness($id, $username){
			$this->db->where('username',$username);
			$query = $this->db->get('aluno');
			if($query->num_rows() > 1)
				return false;
			if($query->num_rows() == 1){
				$user = $query->result_array();
				return $user[0]['id'] == $id;
			}
			return true;
		}

		public function changeUser($id, $data){
			if(!is_numeric($id))
				throw new Exception("ID deve ser numérico", 1);
			$fields['username'] = $data['username'];
			$fields['name']     = $data['realName'];
			if(isset($data['newPassword']))
				$fields['password'] = md5($data['newPassword']);
			$this->db->where('id',$id);
			$query = $this->db->update('aluno', $fields);
			return $this->db->affected_rows() > 0;
		}

		// Retorna o nome da IES do aluno
		public function getCollege($id){
			$this->db->select('a.id_college, c.name');
			$this->db->from('aluno AS a');
			$this->db->join('colleges AS c', 'a.id_college = c.id');
			$this->db->where('a.id',$id);
			$query = $this->db->get();
			if($query->num_rows() != 1)
				return '';
			$college = $query->result_array();
			return $college[0]['name'];
		}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */