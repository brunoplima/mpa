<?php
Class Ranking_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getQuestions($type){
		$this->db->select('q.id, q.description');
		if($type == 'feedback'){
			$this->db->select_avg("l.level","avg");
			$this->db->from('aluno_question_level l, questions q');
			$this->db->where('q.id','l.id_question', false);
			$this->db->order_by('avg DESC');
		}
		elseif($type == 'resolucao'){
			$this->db->select('ROUND(100 * (SUM(mq.is_correct)/COUNT(*)), 2) AS perc', false);
			$this->db->from('mpa_question mq, questions q');
			$this->db->where('q.id','mq.id_question', false);
			$this->db->where('mq.is_correct IS NOT NULL');
			$this->db->order_by('perc DESC');
		}
		else
			return array();
		$this->db->group_by('q.id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getStudents($type){
		if($type != 'correcao' and $type != 'resolucao' and $type != 'aproveitamento')
			return array();
		$this->db->select('a.id, a.username, a.name');
		if($type == 'aproveitamento')
			$this->db->select('ROUND(100 * (SUM(q.is_correct)/COUNT(*)), 2) AS cnt', false);
		elseif($type == 'resolucao')
			$this->db->select('COUNT(*) AS cnt');
		elseif($type == 'correcao')
			$this->db->select('SUM(q.is_correct) AS cnt');
		$this->db->from('mpa_question q, mpa_test t, aluno a');
		$this->db->where('t.id','q.id_test', false);
		$this->db->where('a.id','t.id_aluno', false);
		$this->db->group_by('a.id');
		$this->db->order_by('cnt DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file ranking_model.php */
/* Location: ./application/models/ranking_model.php */