		<div id="sigupBox" class="ui-corner-all">
			<h1>Cadastro</h1>
			<hr>
			<?php
				echo form_open('userauth/signup', array('role'=>"form", 'autocomplete'=>'off'));
				$cnt = 0;

				$label[$cnt] = form_label('Usuário:', 'username', array('class'=>"control-label"));
				$input[$cnt] = form_input(array('name'=>'username','value'=>set_value('username'),'class'=>'form-control'));
				$error[$cnt] = form_error('username');
				$cnt++;

				$label[$cnt] = form_label('Nome:', 'realName', array('class'=>"control-label"));
				$input[$cnt] = form_input(array('name'=>'realName','value'=>set_value('realName'),'class'=>'form-control'));
				$error[$cnt] = form_error('realName');
				$cnt++;

				$label[$cnt] = form_label('IES:', 'college', array('class'=>"control-label")); 
				$input[$cnt] = form_dropdown('college',$colleges, set_value('college'), 'class="form-control"');
				$error[$cnt] = form_error('college');
				$cnt++;

				$label[$cnt] = form_label('Senha:', 'password', array('class'=>"control-label"));
				$input[$cnt] = form_password(array('id'=>'password','name'=>'password','value'=>set_value('password'),'class'=>'form-control'));
				$error[$cnt] = form_error('password');
				$cnt++;

				$label[$cnt] = form_label('Confirmação:', 'checkPassword', array('class'=>"control-label"));
				$input[$cnt] = form_password(array('id'=>'checkPassword','name'=>'checkPassword','value'=>set_value('checkPassword'),'class'=>'form-control'));
				$error[$cnt] = form_error('checkPassword');
				$cnt++;

				$this->load->view("flash");
				for($i=0 ; $i<$cnt ; $i++){
					echo $error[$i]=='' ? '<div class="form-group">' : '<div class="form-group has-error">';
					echo $label[$i];
					echo "<div class=''>";
					echo $input[$i].$error[$i];
					echo '</div>';
					echo '</div>';
				}
			?>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button type="button" class="btn btn-default" onclick="window.location='<?php echo site_url('aluno'); ?>'" style="margin-right: 5px">Cancelar</button>
				</div>

			<?php
				echo form_close();
			?>