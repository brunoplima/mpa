<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('html', 'url', 'script_tag', 'loadLayout'));
	}

	public function index(){
		$this->load->model('user_model');
		$users = $this->user_model->getUsers();
		loadLayout(array('users'=>$users, 'css'=>array('user/'.__FUNCTION__)));
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

/* End of file user.php */
/* Location: ./application/controllers/user.php */