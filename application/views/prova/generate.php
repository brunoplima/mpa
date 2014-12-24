<?php
	echo form_fieldset("Gerar Prova"); 
	echo form_open('prova/gerar', array('class'=>"form-horizontal", 'role'=>"form", 'autocomplete'=>'off')); 
	$cnt = 0;
	$labelWidth = 2;
	$inputWidth = 4;

	$label[$cnt] = form_label('Disciplina*:', 'discipline', array('class'=>"col-sm-$labelWidth control-label")); 
	$input[$cnt] = form_dropdown('discipline',$disciplines, set_value('discipline'), 'autofocus class="form-control"'); 
	$error[$cnt] = form_error('discipline'); 
	$cnt++;

	$label[$cnt] = form_label('Dificuldade*:', 'level', array('class'=>"col-sm-$labelWidth control-label")); 
	$input[$cnt] = form_dropdown('level',$levels, set_value('level'), 'class="form-control"'); 
	$error[$cnt] = form_error('level'); 
	$cnt++;

	$label[$cnt] = form_label('Núm. Questões*:', 'ammount', array('class'=>"col-sm-$labelWidth control-label")); 
	$input[$cnt] = form_input(array('name'=>'ammount','value'=>set_value('ammount'),'class'=>'form-control')); 
	$error[$cnt] = form_error('ammount'); 
	$cnt++;

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
			<button type="submit" class="btn btn-primary pull-right">Gerar prova <span class="glyphicon glyphicon-chevron-right"></span></button>
		</div>
	</div>
<?php
	echo form_fieldset_close();
	echo form_close();