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
		<link rel="shortcut icon" href="http://localhost/mpa/favicon.ico?v=2" />
		<?php echo link_tag('css/bootstrap.min.css');?>
		<?php echo link_tag('css/header.css');?>
		<?php echo link_tag('css/userAuth/signup.css');?>
		<?php echo script_tag('js/jquery-2.1.1.min.js');?>
		<?php echo script_tag('js/bootstrap.min.js');?>
		<?php echo script_tag('js/portuguese.js');?>
		<script>$(document).ready(function(){$( "#username" ).focus();});</script>
	</head>
	<body>
		<div id="header"><div id="appTitle">Minha Prova - Aluno</div></div>
		<div id="topmenu"><div id='topmenu_content'></div></div>
		<div id="sigupBox">


			<?php
				echo form_fieldset("Cadastro"); 
				echo form_open('userauth/signup', array('class'=>"form-horizontal", 'role'=>"form", 'autocomplete'=>'off')); 
				$cnt = 0;
				$labelWidth = 2;
				$inputWidth = 4;

				$label[$cnt] = form_label('Usuário:', 'username', array('class'=>"col-sm-$labelWidth control-label"));
				$input[$cnt] = form_input(array('name'=>'username','value'=>set_value('username'),'class'=>'form-control'));
				$error[$cnt] = form_error('username');
				$cnt++;

				$label[$cnt] = form_label('Nome:', 'realName', array('class'=>"col-sm-$labelWidth control-label"));
				$input[$cnt] = form_input(array('name'=>'realName','value'=>set_value('realName'),'class'=>'form-control'));
				$error[$cnt] = form_error('realName');
				$cnt++;

				$label[$cnt] = form_label('IES:', 'college', array('class'=>"col-sm-$labelWidth control-label")); 
				$input[$cnt] = form_dropdown('college',$colleges, set_value('college'), 'class="form-control"'); 
				$error[$cnt] = form_error('college'); 
				$cnt++;

				$label[$cnt] = form_label('Senha:', 'password', array('class'=>"col-sm-$labelWidth control-label"));
				$input[$cnt] = form_password(array('id'=>'password','name'=>'password','value'=>set_value('password'),'class'=>'form-control'));
				$error[$cnt] = form_error('password');
				$cnt++;

				$label[$cnt] = form_label('Confirmação:', 'checkPassword', array('class'=>"col-sm-$labelWidth control-label"));
				$input[$cnt] = form_password(array('id'=>'checkPassword','name'=>'checkPassword','value'=>set_value('checkPassword'),'class'=>'form-control'));
				$error[$cnt] = form_error('checkPassword');
				$cnt++;

				$this->load->view("flash");
				for($i=0 ; $i<$cnt ; $i++){
					echo $error[$i]=='' ? '<div class="form-group">' : '<div class="form-group has-error">';
					echo $label[$i];
					echo "<div class='col-sm-$inputWidth'>";
					echo $input[$i].$error[$i];
					echo '</div>';
					echo '</div>';
				}
			?>
				<div class="form-group">
					<div class="col-sm-offset-<?php echo $labelWidth ?> col-sm-<?php echo $inputWidth ?>">
						<button type="submit" class="btn btn-primary pull-right">Salvar</button>
						<button type="button" class="btn btn-default pull-right" onclick="window.location='<?php echo site_url('aluno'); ?>'" style="margin-right: 5px">Cancelar</button>
					</div>
				</div>

			<?php
				echo form_fieldset_close();
				echo form_close();
			?>












			
		</div>
		<div id="footer">Desenvolvido por <?php echo mailto('brunolima.uece@gmail.com', 'Bruno Lima')?> &middot; UECE &middot; 2014</div>
	</body>
</html>