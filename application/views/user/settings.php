<?php
	echo form_open('user/settings', array('class'=>"form-horizontal mpa_form", 'role'=>"form", 'autocomplete'=>'off')); 
	$cnt = 0;
	$labelWidth = 2;
	$inputWidth = 4;

	$label[$cnt] = form_label('Usuário*:', 'username', array('class'=>"col-sm-$labelWidth control-label"));
	$input[$cnt] = form_input(array('name'=>'username','value'=>set_value('username', $username),'class'=>'form-control'));
	$error[$cnt] = form_error('username');
	$cnt++;

	$label[$cnt] = form_label('Nome*:', 'realName', array('class'=>"col-sm-$labelWidth control-label"));
	$input[$cnt] = form_input(array('name'=>'realName','value'=>set_value('realName', $realName),'class'=>'form-control'));
	$error[$cnt] = form_error('realName');
	$cnt++;

	$label[$cnt] = form_label('', 'realName', array('class'=>"col-sm-$labelWidth control-label"));
	$input[$cnt] = $college;
	$error[$cnt] = form_error('realName');
	$cnt++;

	$label[$cnt] = form_label('Senha antiga:', 'oldPassword', array('class'=>"col-sm-$labelWidth control-label"));
	$input[$cnt] = form_password(array('id'=>'oldPassword','name'=>'oldPassword','value'=>set_value('oldPassword'),'class'=>'form-control'));
	$error[$cnt] = form_error('oldPassword');
	$cnt++;

	$label[$cnt] = form_label('Nova senha:', 'newPassword', array('class'=>"col-sm-$labelWidth control-label"));
	$input[$cnt] = form_password(array('id'=>'newPassword','name'=>'newPassword','value'=>set_value('newPassword'),'class'=>'form-control'));
	$error[$cnt] = form_error('newPassword');
	$cnt++;

	$label[$cnt] = form_label('Confirmação de senha:', 'checkPassword', array('class'=>"col-sm-$labelWidth control-label"));
	$input[$cnt] = form_password(array('id'=>'checkPassword','name'=>'checkPassword','value'=>set_value('checkPassword'),'class'=>'form-control'));
	$error[$cnt] = form_error('checkPassword');
	$cnt++;

	for($i=0 ; $i<$cnt ; $i++){
		echo $error[$i]=='' ? '<div class="form-group">' : '<div class="form-group has-error">';
		echo $label[$i];
		echo "<div class='col-sm-$inputWidth'>";
		echo $input[$i].$error[$i];
		echo '</div>';
		echo '</div>';
		if($i == 2)
			echo '<br><br>';
	}
?>
	<div class="form-group">
		<div class="col-sm-offset-<?php echo $labelWidth ?> col-sm-<?php echo $inputWidth ?>">
			<button type="submit" class="btn btn-primary pull-right">Salvar</button>
			<button type="button" class="btn btn-default pull-right" onclick="window.location='<?php echo site_url('aluno'); ?>'" style="margin-right: 5px">Cancelar</button>
		</div>
	</div>

	<script type="text/javascript">
	$(function() {
		if($("#oldPassword").val() == '') {
			$("#newPassword").prop('disabled', true).val('');
			$("#checkPassword").prop('disabled', true).val('');
		}
	});
	$("#oldPassword").change(function(){
		if($(this).val() == ''){
			$("#newPassword").prop('disabled', true).val('');
			$("#checkPassword").prop('disabled', true).val('');
		}
		else{
			$("#newPassword").prop('disabled', false);
			$("#checkPassword").prop('disabled', false);
		}
	})
	</script>
<?php
	echo form_close();