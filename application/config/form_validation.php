<?php 
	$config = array(
		'userauth/index' => array(
			array('field' => 'username'				,'label' => 'Usuário'						,'rules' => 'required'),
			array('field' => 'password'				,'label' => 'Senha'							,'rules' => 'required|callback__check_user_pass'),
		)
	);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */
