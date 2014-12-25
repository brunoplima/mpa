<?php
Class Prova_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getDisciplines(){
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

	public function getDiscipline($id){
		$this->db->select('name');
		$this->db->where('id', $id);
		$query = $this->db->get('disciplines');
		if($query->num_rows() != 1)
			return NULL;
		$ret = $query->result();
		return $ret[0]->name;
	}

	public function getQuestions($data){
		// TODO Melhorar Aleatoriedade
		$this->db->select('q.id, q.description');
		$this->db->from('questions AS q');
		$this->db->join('disciplines_questions AS dq', 'q.id=dq.question_id');
		$this->db->join('disciplines AS d'           , 'd.id=dq.discipline_id');
		$this->db->where('d.id',$data['discipline']);
		$this->db->order_by('RAND()');
		$this->db->limit($data['ammount']);
		$query = $this->db->get();
		$ret = array();
		foreach ($query->result() as $row)
			$ret[$row->id] = $row->description;
		return $ret;
	}

	public function getOptions($questionId){
		$this->db->select('id, text');
		$this->db->where('question_id', $questionId);
		$this->db->order_by('RAND()');
		$query = $this->db->get('options');
		$ret = array();
		foreach ($query->result() as $row)
			$ret[$row->id] = $row->text;
		return $ret;
	}

	public function getCorrectOption($questionId){
		$this->db->select('id');
		$this->db->where('question_id', $questionId);
		$this->db->where('correct', true);
		$this->db->limit(1);
		$query = $this->db->get('options');
		if($query->num_rows() != 1)
			return NULL;
		$row = $query->result();
		return $row[0]->id;
	}


	public function storeTest($questions, $data, $disciplineId, $userId){
		$this->db->trans_start();
		$fields['id_aluno']      = $userId;
		$fields['id_discipline'] = $disciplineId;
		$fields['date_add']      = date('Y-m-d H:i:s');
		$this->db->insert('mpa_test', $fields);
		$testId = $this->db->insert_id();

		foreach($questions as $questionId){
			$fields = array('id_test' => $testId, 'id_question' => $questionId);
			if(!isset($data["question_$questionId"]))
				$data["question_$questionId"] = '';
			$correctOption = $this->getCorrectOption($questionId);
			if($correctOption !== NULL){
				$fields['id_answer']  = $data["question_$questionId"] != '' ? $data["question_$questionId"] : NULL;
				$fields['is_correct'] = ($correctOption == $data["question_$questionId"]) ? 1 : 0;
			}
			else
				$fields['answer']  = $data["question_$questionId"];
			$this->db->insert('mpa_question', $fields);
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return null;
		return $testId;
	}

	public function getStatistics($testId){
		$this->db->select("DATE_FORMAT(date_add, '%d/%m/%Y %H:%i:%s') AS stored", false);
		$this->db->where('id', $testId);
		$query = $this->db->get('mpa_test');
		if($query->num_rows() != 1)
			return null;
		$time = $query->result_array();
		$time = $time[0]['stored'];

		$stats = array('time'=>$time, 'demanded'=>0,'answered'=>0, 'correct'=>0, 'wrong'=>0, 'objetivas'=>0, 'subjetivas'=>0);
		$this->db->select('answer, id_answer, is_correct');
		$this->db->where('id_test', $testId);
		$query = $this->db->get('mpa_question');
		$stats['demanded'] = $query->num_rows();
		foreach ($query->result() as $row) {
			if($row->answer != ''or $row->id_answer != '') $stats['answered']++;
			if($row->is_correct != ''){
				$stats['objetivas']++;
				if($row->is_correct == 0) $stats['wrong']++;
				elseif($row->is_correct == 1) $stats['correct']++;
			}
			else
				if($row->is_correct == '') $stats['subjetivas']++;
		}
		return $stats;
	}

	public function getList($userId){
		$this->db->select("t.id, d.name AS discipline");
		$this->db->select("DATE_FORMAT(t.date_add, '%d/%m/%Y %H:%i:%s') AS stored", false);
		$this->db->from("mpa_test t, disciplines d");
		$this->db->where("t.id_discipline", "d.id", false);
		$this->db->where("t.id_aluno", $userId);
		$this->db->order_by("t.id DESC");
		$query = $this->db->get();
		return $query->result();
	}

	public function getTest($testId){
		$this->db->select("DATE_FORMAT(t.date_add, '%d/%m/%Y %H:%i:%s') AS stored, d.name AS discipline", false);
		$this->db->from('mpa_test t, disciplines d');
		$this->db->where('t.id_discipline', 'd.id', false);
		$this->db->where('t.id', $testId);
		$query = $this->db->get();
		if($query->num_rows() != 1)
			return null;
		$row = $query->result_array();
		$test['stored']     = $row[0]['stored'];
		$test['discipline'] = $row[0]['discipline'];

		$this->db->select('enun.description enunciado, q.answer, o.text resposta, q.is_correct');
		$this->db->from('mpa_question q');
		$this->db->join('questions AS enun','enun.id=q.id_question');
		$this->db->join('options AS o', 'o.id = q.id_answer', 'left');
		$this->db->where('id_test', $testId);
		$this->db->order_by('q.id');
		$query = $this->db->get();
		return array('test'=>$test, 'questions'=>$query->result_array());
	}
}

/* End of file prova_model.php */
/* Location: ./application/models/prova_model.php */