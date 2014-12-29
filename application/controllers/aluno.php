<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aluno extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('form', 'url','html','script_tag','loadLayout'));
		if(!$this->session->userdata('mpa_logged_in')){
			redirect('userauth');
			die();
		}
	}

	public function index(){
		loadLayout(array('pageTitle'=>'Página Inicial','css'=>array('aluno/aluno')));
	}

}

/* End of file aluno.php */
/* Location: ./application/controllers/aluno.php */