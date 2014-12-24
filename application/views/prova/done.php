<?php if(isset($prova)): //echo '<pre>'.print_r($prova,true).'</pre>'?>
<?php echo form_open('prova/corrigir', array('id'=>'prova_form','role'=>"form", 'autocomplete'=>'off')); ?>
	<div id="prova_title"><b>Disciplina:</b> <i><?php echo $discipline ?></i> </div>
	<hr>
	<?php $cnt=0; foreach ($prova['questions'] as $id => $description): $cnt++ ?>
		<div class="question"><?php echo "$cnt) $description" ?></div>
		<div class="answer">
			<?php if(count($prova['options'][$id]) > 0): ?>
				<?php
				$letter = 'a';
				foreach ($prova['options'][$id] as $answerId => $opt){
					$radio = array(
						'name'  => "question_$id",
						'id'    => "answer_$answerId",
						'value' => $answerId,
					);
					echo $letter.') '.form_radio($radio).' '.form_label($opt, "answer_$answerId", array('class'=>"control-label")).'<br>';
					$letter++;
				}
				?>
			<?php else: ?>
				<?php echo form_textarea(array('name'  => "question_$id",'class'=>"form-control")) ?>
			<?php endif ?>
		</div>
	<?php endforeach ?>
	<div id="submit_area">
		<button type="button" class="btn btn-warning pull-left" id="redo">Gerar novamente <span class="glyphicon glyphicon-repeat"></span></button>
		<button type="submit" class="btn btn-primary pull-right">Armazenar <span class="glyphicon glyphicon-cloud"></span></button>
		<button type="button" class="btn btn-default pull-right" id="save_pdf">PDF <span class="glyphicon glyphicon-save"></span></button>
	</div>
<?php $gt = date('d/m/Y H:i:s'); echo form_hidden('generateTime', $gt); ?>
<?php echo form_close(); ?>
<?php endif ?>
<div class="prova_timestamp">Prova gerada em <?php echo $gt?></div>


<style>
#prova_title{
	font-size: x-large;
}
#prova_form{
	padding: 10px;
}
.question{
	font-weight: bold;
	margin-top: 10px;
}
.answer{
	margin-left: 20px;
	margin-right: 20px;
}
.answer label{
	font-weight: normal;
}
#submit_area{
	height: 50px;
	margin-top: 20px;
}

#save_pdf{
	margin-right: 10px;
}
</style>
<script>
$("#save_pdf").click(function(){
	swal({
		title: "Disponível em breve",
		imageUrl: "<?php echo base_url().'/images/PDF_64.png'?>"
	});
});
$("#redo").click(function(){
	swal(
		{
			title: "Gerar novamente",
			text: "Uma nova prova será gerada e você perderá os dados não armazenados",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#f0ad4e",
			confirmButtonText: "Continuar",
			closeOnConfirm: false
		},
		function(){
			location.reload();
		}
	);
});
</script>