<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('html', 'url', 'script_tag', 'loadLayout'));
		if(!$this->session->userdata('mpa_logged_in')){
			redirect('userauth');
			die();
		}
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

	public function settings(){
		$s = $this->session->userdata('mpa_logged_in');
		$realName = $s['name'];
		$username = $s['username'];

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
		$this->load->model('user_model');
		if($this->form_validation->run() !== FALSE){
			try{
				$data = $this->input->post(NULL, TRUE);
				$this->user_model->changeUser($s['userId'],$data);
				$s['username'] = $data['username'];
				$s['name'] = $data['realName'];
				$this->session->set_userdata('mpa_logged_in',$s);
				$this->session->set_flashdata('success', 'Alteração realizada com sucesso');
			}
			catch(Exception $e){
				$this->session->set_flashdata('error', "Não foi possível salvar. Houve um erro. Favor contate o suporte. Erro: {$e->getMessage()}");
			}
			redirect('aluno');
		}
		loadLayout(array('realName'=>$realName, 'username'=>$username, 'college'=>$this->user_model->getCollege($s['userId'])));
	}

	public function _check_user_pass_change($password){
		if($password == '')
			return true;
		$s = $this->session->userdata('mpa_logged_in');
		$id = $s['userId'];
		$this->load->model('user_model');
		$this->form_validation->set_message('_check_user_pass_change', 'Senha incorreta');
		return $this->user_model->check_user_pass_change($id, $password);
	}

	public function _check_username_uniqueness($username){
		$s = $this->session->userdata('mpa_logged_in');
		$id = $s['userId'];
		$this->load->model('user_model');
		$this->form_validation->set_message('_check_username_uniqueness', 'Nome de usuário já em uso');
		return $this->user_model->_check_username_uniqueness($id, $username);
	}

	
	public function _check_match_new_password($check){
		$newPassword = $this->input->post('newPassword');
		if($newPassword == '') return true;
		$this->form_validation->set_message('_check_match_new_password', 'Senha não confere.');
		return $check == $newPassword;
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */