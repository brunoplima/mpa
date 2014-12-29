<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ranking extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session','table','form_validation'));
		$this->load->helper(array('form', 'url','html','script_tag','loadLayout'));
		if(!$this->session->userdata('mpa_logged_in')){
			redirect('userauth');
			die();
		}
		$this->load->model('ranking_model');
	}

	public function index(){
		redirect(site_url());
	}

	public function questions_index(){
		loadLayout(array('pageTitle'=>'Ranking de Questões'));
	}

	public function questions($type){
		switch ($type) {
			case 'feedback':  $tmp='Feedback';  $vars['colName'] = 'Avaliação'; break;
			case 'resolucao': $tmp='Resolução'; $vars['colName'] = 'Acertos&nbsp;(%)'; break;
			default: redirect('ranking/questoes');
		}
		$vars['pageTitle'] = "Ranking de Questões<small><i> - $tmp</i></small> <a href='".site_url('ranking/questoes')."' class='btn btn-default pull-right' title='Alterar Critério'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";
		$vars['questions']  = $this->ranking_model->getQuestions($type);
		$vars['js'] = array('jquery.tablePagination.0.5.min');
		$vars['css'] = array('tablePagination');
		loadLayout($vars);
	}

	public function students_index(){
		loadLayout(array('pageTitle'=>'Ranking de Alunos'));
	}
	public function students($type){
		switch ($type) {
			case 'correcao':       $vars['colName'] = 'Respostas&nbsp;Corretas';break;
			case 'resolucao':      $vars['colName'] = 'Questões&nbsp;Respondidas';break;
			case 'aproveitamento': $vars['colName'] = 'Aproveitamento&nbsp;(%)';break;
			default: redirect('ranking/alunos');
		}
		$vars['pageTitle'] = "Ranking de Alunos<small><i> - $vars[colName]</i></small> <a href='".site_url('ranking/alunos')."' class='btn btn-default pull-right' title='Alterar Critério'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";
		$vars['students']  = $this->ranking_model->getStudents($type);
		$vars['js'] = array('jquery.tablePagination.0.5.min');
		$vars['css'] = array('tablePagination');
		loadLayout($vars);
	}
}

/* End of file ranking.php */
/* Location: ./application/controllers/ranking.php */