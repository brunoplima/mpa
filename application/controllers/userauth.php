<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserAuth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
	}

	public function index(){
		if($this->session->userdata('mpa_logged_in') !== FALSE)
			redirect('aluno');
		$this->load->helper(array('html', 'form', 'script_tag'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
		if ($this->form_validation->run() == FALSE){
			$this->load->view("userauth/index");
			$this->load->view("footer");
		}
		else{
			$this->load->model('userauth_model');
			$sess_array = array( 
				'username' => $this->input->post('username'),
				'name'     => $this->userauth_model->getName($this->input->post('username')),
			); 
			$this->session->set_userdata(array('username'=>$this->input->post('username')));
			$this->session->set_userdata('mpa_logged_in', $sess_array);
			redirect('aluno');
		}
	}

	function _check_user_pass($password){
		$username = $this->input->post('username');
		$this->load->model('userauth_model');
		$this->form_validation->set_message('_check_user_pass', 'Usuário e senha não correspondem'); 
		return $this->userauth_model->check_user_pass($username, $password);
	}

	public function logout(){
		$this->session->unset_userdata('mpa_logged_in');
		redirect('userauth');
	}
}

/* End of file userauth.php */
/* Location: ./application/controllers/userauth.php */