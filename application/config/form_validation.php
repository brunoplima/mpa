<?php 
	$config = array(
		'userauth/index' => array(
			array('field' => 'username'				,'label' => 'Usuário'									,'rules' => 'required'),
			array('field' => 'password'				,'label' => 'Senha'										,'rules' => 'required|callback__check_user_pass'),
		),
		'userauth/signup' => array(
			array('field' => 'username'				,'label' => 'Usuário'									,'rules' => 'required|callback__check_username_uniqueness_signup'),
			array('field' => 'realName'				,'label' => 'Nome'										,'rules' => 'required'),
			array('field' => 'college'				,'label' => 'IES'											,'rules' => 'callback__check_college_existence'),
			array('field' => 'password'				,'label' => 'Senha'										,'rules' => 'required|min_length[4]'),
			array('field' => 'checkPassword'	,'label' => 'Confirmação'							,'rules' => 'required|matches[password]'),
		),
		'prova/generate' => array(
			array('field' => 'discipline'			,'label' => 'Disciplina'							,'rules' => 'required|callback__check_disciplines'),
			array('field' => 'level'					,'label' => 'Dificuldade'							,'rules' => 'required|callback__check_levels'),
			array('field' => 'ammount'				,'label' => 'Número de questões'			,'rules' => 'required|is_natural_no_zero|less_than[100]'),
		),
		'prova/evaluateAndStore' => array(
			array('field' => 'generateTime'		,'label' => 'GT'											,'rules' => 'required'),
		),
		'user/settings' => array(
			array('field' => 'username'				,'label' => 'Usuário'									,'rules' => 'required|callback__check_username_uniqueness'),
			array('field' => 'realName'				,'label' => 'Nome'										,'rules' => 'required'),
			array('field' => 'oldPassword'		,'label' => 'Senha antiga'						,'rules' => 'callback__check_user_pass_change'),
			array('field' => 'newPassword'		,'label' => 'Nova senha'							,'rules' => 'min_length[4]'),
		),
	);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */
