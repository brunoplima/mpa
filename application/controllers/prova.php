<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prova extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session','table'));
		$this->load->helper(array('form', 'url','html','script_tag','loadLayout'));
		if(!$this->session->userdata('mpa_logged_in')){
			redirect('userauth');
			die();
		}
	}

	public function index(){
		$this->load->model('prova_model');
		$disciplines = ($this->prova_model->getDisicplines());
		$levels      = ($this->prova_model->getLevels());
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
		if ($this->form_validation->run() == FALSE){
			loadLayout(array('disciplines'=>$disciplines, 'levels'=>$levels));
		}
		else{
			echo 'OK';
		}
	}
}

/* End of file prova.php */
/* Location: ./application/controllers/prova.php */