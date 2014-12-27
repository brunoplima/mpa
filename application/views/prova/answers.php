<?php if(isset($answers)):?>
<button type="button" class="btn btn-primary pull-right" id="evaluateButton">
	<?php if(isset($avgLevel)): ?>
	<span class="badge" title="Dificuldade da questão"><?php echo $avgLevel ?></span>
	<?php else: ?>
	<span class="glyphicon glyphicon-check" title="Dificuldade da questão"></span>
	<?php endif ?>
</button>
<h3>Respostas dos Alunos</h3>
<h4><b>Questão:</b> <i><?php echo str_replace("\n","<br>",$question['question'])?></i></h4>
<?php if($question['answer'] != ''):?>
<h5><b>Resposta:</b> <i><?php echo $question['answer']?></i></h5>
<?php endif ?>
<hr>

<table class="table table-condensed table-hover" id="table_answers">
	<thead><th width="150">Autor</th><th width="150">Data</th><th width="20"></th><th>Resposta</th></thead>
	<tbody>
	<?php foreach ($answers as $key => $answer): ?>
		<tr>
			<td><?php echo $answer['author'] == $me ? '<i>Eu</i>' : $answer['author'] ?></td>
			<td><?php echo $answer['stored'] ?></td>
			<?php
				if(isset($answer['resposta'])){
					$img = '<td></td>';
					if($answer['is_correct'] === '0')
						$img = '<td title="Resposta Incorreta">'.img(base_url().'images/icons/delete_16.png').'</td>';
					elseif($answer['is_correct'] === '1')
						$img = '<td title="Resposta Correta">'.img(base_url().'images/icons/yes_16.png').'</td>';
					echo "$img</td><td>$answer[resposta]</td>";
				}
				else
					echo "<td></td><td>$answer[answer]</td>";
			?>
		</tr>
	<?php endforeach ?>
	<?php if(count($answers) == 0): ?>
		<tr><td colspan="4" align="center">Nenhum registro encontrado</td></tr>
	<?php endif?>
	</tbody>
	<?php $found = count($answers); $found .= $found == 1 ? ' registro' : ' registros';?>
	<tfoot>
		<tr><td colspan="4" align="right"><?php echo "<b>Total: </b>$found";?></td></tr>
	</tfoot>
</table>
<script type="text/javascript">
	$("#table_answers").tablePagination();
	<?php $js  = 'id = "levels" class = "form-control" onchange="evaluateLevel()" title="Minha avaliação"'; ?>
	var content = '<form><?php echo str_replace("\n","",form_dropdown("level",$levels, set_value("level", $myLevel), $js)) ?></form>';
	$('#evaluateButton').popover({
		title: "Dificuldade da questão",
		content: content,
		html: true,
		placement: 'bottom',
	});
	function evaluateLevel(){
		var value = $('#levels').val();
		$('#evaluateButton').popover('destroy');

		$.ajax({
			type: "POST",
			url: '<?php echo site_url("prova/setMyLevel/$id") ?>/' + value,
			success: function(resp){
				if(resp.code != 0) swal('Um erro foi encontrado', 'Não foi possível salvar sua opinião no momento.\nPor favor, tente mais tarde', 'error');
				else{
					swal({title: value,text: "Avaliação armazenada com sucesso",timer: 1000});
					$.ajax({
						type: "POST",
						url: '<?php echo site_url("prova/getAvgLevel/$id") ?>',
						success: function(resp){
							if(resp.code == 0)
								$('#evaluateButton').html('<span class="badge" title="Dificuldade da questão">' + resp.avg + '</span>');
						},
						dataType: 'json',
						async: true
					});
				}
			},
			error: function(){swal('Um erro foi encontrado', 'Não foi possível salvar sua opinião no momento.\nPor favor, tente mais tarde', 'error');},
			dataType: 'json'
		});


	};
</script>
<style type="text/css">
	#avgLevel{
		text-align: center;
		margin-top: 15px;
	}
</style>
<?php endif ?>