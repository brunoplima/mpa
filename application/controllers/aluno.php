<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluno extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','html','script_tag'));
		// self::$data['title'] = "Siscove - Sistema de Controle de Despesas com Veículos - AESP/CE";
		// self::$data['app_title'] = "Controle de Despesas com Veículos";
		if(!$this->session->userdata('mpa_logged_in')){
			redirect('userauth');
			die();
		}
	}

	public function index(){
		$this->_loadLayout(array('title'=>'Minha Prova ~ Aluno', 'css'=>array('aluno/aluno.css')));
	}

	public function _loadLayout($vars = array()) {
		$callers = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
		$view = $callers[1]['function'];
		$this->load->view("header", $vars);
		$this->load->view("aluno/$view");
		$this->load->view("footer");
	}
}

/* End of file aluno.php */
/* Location: ./application/controllers/aluno.php */