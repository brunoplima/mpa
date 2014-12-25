<?php if(isset($answers)):?>
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
</script>
<?php endif ?>