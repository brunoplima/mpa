<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prova extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session','table','form_validation'));
		$this->load->helper(array('form', 'url','html','script_tag','loadLayout'));
		if(!$this->session->userdata('mpa_logged_in')){
			redirect('userauth');
			die();
		}
		$this->load->model('prova_model');
	}

	public function generate(){
		$vars = array();
		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
		if($this->form_validation->run() !== FALSE){
			$data = $this->input->post(NULL, TRUE);
			$prova['questions'] = $this->prova_model->getQuestions($data);
			if(!$prova['questions']){
				$this->session->set_flashdata('error', 'Nenhuma questão atende aos critérios. Por favor, tente novamente');
				redirect('prova/gerar');
			}
			if(count($prova['questions']) < $data['ammount'])
				$vars['warnMessage'] = "A quantidade de questões solicitadas é superior à existente no sistema";
			$this->session->set_userdata('questions',array_keys($prova['questions']));
			$this->session->set_userdata('discipline', $data['discipline']);
			foreach (array_keys($prova['questions']) as $id)
				$prova['options'][$id] = $this->prova_model->getOptions($id);
			$vars['test'] = $prova;
			$vars['discipline'] = $this->prova_model->getDiscipline($data['discipline']);
			loadLayoutView($vars,"prova/done");
		}
		else{
			$vars['disciplines'] = $this->prova_model->getDisciplines();
			$vars['levels']      = array(''=>'', 1=>"1 (Muito fácil)", 2=>2, 3=>3, 4=>4, 5=>"5 (Muito Difícil)",12=>12);
			loadLayout($vars);
		}
	}

	public function evaluateAndStore(){
		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
		if($this->form_validation->run() !== FALSE){
			$data = $this->input->post(NULL, TRUE);
			$gt = $data['generateTime'];
			unset($data['generateTime']);
			$questions    = $this->session->userdata('questions');
			$disciplineId = $this->session->userdata('discipline');
			$s = $this->session->userdata('mpa_logged_in');
			$userId       = $s['userId'];
			$testId = $this->prova_model->storeTest($questions, $data, $disciplineId, $userId);
			if($testId){
				$this->session->unset_userdata('questions');
				$this->session->unset_userdata('discipline');
				redirect("prova/estatisticas/$testId");
			}
		}
		redirect('prova/gerar');
	}

	public function statistics($testId){
		$stats = $this->prova_model->getStatistics($testId);
		if($stats == null)
			show_404();
		$js  = array('Chart.min', 'Chart.legend', 'prova/statistics');
		$css = array('Chart.legend', 'prova/statistics');
		loadLayout(array('stats'=>$stats, 'id'=> $testId,'js'=>$js, 'css'=>$css));
	}

	public function myList(){
		$s = $this->session->userdata('mpa_logged_in');
		$list = $this->prova_model->getList($s['userId']);
		loadLayout(array('list'=>$list));
	}

	public function view($testId){
		$s = $this->session->userdata('mpa_logged_in');
		$ret = $this->prova_model->getTest($testId, $s['userId']);
		if($ret == null)
			show_404();
		loadLayout(array('id'=>$testId,'test'=>$ret['test'], 'questions'=>$ret['questions']));
	}

	public function answers($questionId){
		$question = $this->prova_model->getQuestion($questionId);
		if(!isset($question))
			show_404();
		$answers = $this->prova_model->getAnswers($questionId);
		$s = $this->session->userdata('mpa_logged_in');
		loadLayout(array('me'=>$s['username'],'answers'=>$answers, 'question'=>$question, 'js'=>array('jquery.tablePagination.0.5.min'), 'css'=>array('tablePagination')));
	}

	public function _check_disciplines($discipline){
		$disciplines = $this->prova_model->getDisciplines();
		$this->form_validation->set_message('_check_disciplines', 'Disciplina inválida');
		return isset($disciplines[$discipline]);
	}
	public function _check_levels($level){
		$levels = array(1,2,3,4,5);
		$this->form_validation->set_message('_check_levels', 'Dificuldade inválida');
		return in_array($level, $levels);
	}
}

/* End of file prova.php */
/* Location: ./application/controllers/prova.php */