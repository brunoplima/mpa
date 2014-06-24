<?php 
	$config = array(
		'userauth/index' => array(
			array('field' => 'username'				,'label' => 'Usuário'						,'rules' => 'required'),
			array('field' => 'password'				,'label' => 'Senha'							,'rules' => 'required|callback__check_user_pass'),
		),
		'prova/index' => array(
			array('field' => 'discipline'			,'label' => 'Disciplina'					,'rules' => 'required'),
			array('field' => 'level'				,'label' => 'Dificuldade'					,'rules' => 'required'),
			array('field' => 'ammount'				,'label' => 'Número de questões'			,'rules' => 'required|is_natural_no_zero'),
		)
	);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */
