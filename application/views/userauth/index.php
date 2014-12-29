		<div id="loginBox" class="ui-corner-all">
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
				<a href="<?php echo site_url('userauth/signup')?>">Cadastrar-se</a><button type="submit" class="btn btn-primary btn-stretch-sides pull-right">Entrar</button>
			</form>