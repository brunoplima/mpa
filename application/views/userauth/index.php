<?php echo doctype('html5') ?>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<?php
		$meta = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'application-name', 'content' => 'Minha Prova - Aluno'),
			array('name' => 'description', 'content' => 'Minha Prova - Aluno'),
			array('name' => 'author', 'content' => 'Bruno Lima'),
		);
		echo meta($meta);
		?>
		<title>Minha Prova - Aluno</title>
		<?php echo link_tag('css/bootstrap.min.css');?>
		<?php echo link_tag('css/header.css');?>
		<?php echo link_tag('css/userAuth/index.css');?>
		<?php echo script_tag('js/jquery-2.1.1.min.js');?>
		<?php echo script_tag('js/bootstrap.min.js');?>
		<?php echo script_tag('js/portuguese.js');?>
		<script>$(document).ready(function(){$( "#username" ).focus();});</script>
	</head>
	<body>
		<div id="header"><div id="appTitle">Minha Prova - Aluno</div></div>
		<div id="topmenu"><div id='topmenu_content'></div></div>
		<div id="loginBox">
			<div id="loginTitle"><!-- Minha Prova - Aluno --></div>
			<div id="loginLogo"></div>
			<?php $type  = array('username'=> 'text',    'password'=>'password');?>
			<?php $label = array('username'=> 'Usuário', 'password'=>'Senha');?>
			<?php echo form_open('userauth/index',array('role'=>'form','id'=>'loginForm', 'autocomplete'=>'off')); ?>
				<?php foreach(array('username','password') as $field): ?>
				<?php $wClass = '';$feedback = '';if(form_error($field)!=''){$wClass = ' has-error has-feedback';$feedback = '<span style="top: 1px;"class="glyphicon glyphicon-remove form-control-feedback"></span>';} ?>
				<div class="form-group<?php echo $wClass?>">
					<?php echo "<input type='$type[$field]' class='form-control' name='$field' id='$field' placeholder='$label[$field]' value='".set_value($field)."'>$feedback"?>
					<?php echo form_error($field) ?>
				</div>
				<?php endforeach; ?>
				<a>Cadastrar-se</a><button type="submit" class="btn btn-primary btn-stretch-sides pull-right">Entrar</button>
			</form>
		</div>
		<div id="footer">Desenvolvido por <?php echo mailto('brunolima.uece@gmail.com', 'Bruno Lima')?> &middot; UECE &middot; 2014</div>
	</body>
</html>