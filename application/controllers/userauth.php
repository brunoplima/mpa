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
			$data = $this->userauth_model->getData($this->input->post('username'));
			$sess_array = array( 
				'username' => $this->input->post('username'),
				'name'     => $data['name'],
				'userId'   => $data['id'],
			); 
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


	public function signup(){
		$this->load->helper(array('html', 'form', 'script_tag'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
		if($this->form_validation->run() !== FALSE){
			try{
				$data = $this->input->post(NULL, TRUE);
				$this->load->model('userauth_model');
				$this->userauth_model->createUser($data);
				$this->session->set_flashdata('success', 'Cadastro realizado com sucesso');
				redirect('userauth');
			}
			catch(Exception $e){
				$this->session->set_flashdata('error', "Não foi possível salvar. Houve um erro. Erro: {$e->getMessage()}");
				redirect('userauth/signup');
			}
		}
		$this->load->model('commom_model');
		$colleges = $this->commom_model->getColleges();
		$this->load->view("userauth/signup", array('colleges'=>$colleges));
		$this->load->view("footer");
	}

	public function _check_username_uniqueness_signup($username){
		$this->load->model('userauth_model');
		$this->form_validation->set_message('_check_username_uniqueness_signup', 'Usuário já em uso');
		return $this->userauth_model->check_username_uniqueness_signup($username);
	}

	public function _check_college_existence($college){
		if($college == '')
			return true;
		if(!is_numeric($college)){
			$this->form_validation->set_message('_check_college_existence', 'Inválido');
			return false;
		}
		$this->form_validation->set_message('_check_college_existence', 'Universidade não cadastrada');
		$this->load->model('commom_model');
		return $this->commom_model->check_college_existence($college);

	}
}

/* End of file userauth.php */
/* Location: ./application/controllers/userauth.php */