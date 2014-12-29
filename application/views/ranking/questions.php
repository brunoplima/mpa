<?php if(isset($questions)): ?>
<table class="table table-hover table-condensed table-striped table_result">
	<thead>
		<tr><th>#</th><th>Questão</th><th><?php echo $colName ?></th><th></th></tr>
	</thead>
	<tbody>
		<?php $cnt = 0; foreach ($questions as $row): $cnt++; ?>
		<tr>
			<td><?php echo $cnt ?></td>
			<td><?php echo str_replace("\n","<br>",$row['description']) ?></td>
			<td><?php echo (isset($row['avg'])) ? number_format($row['avg'], 2) : $row['perc'] ?></td>
			<td>
				<button type="button" value="<?php echo $row['id']?>" class="btn btn-default other_resps" title="Respostas dos alunos"><span class="glyphicon glyphicon-comment"></span></button>
			</td>
		</tr>
		<?php endforeach ?>
		<?php if(count($questions) == 0): ?>
			<tr><td colspan="4" align="center">Nenhum registro encontrado</td></tr>
		<?php endif?>
	</tbody>
	<?php $found = count($questions); $found .= $found == 1 ? ' registro' : ' registros';?>
	<tfoot>
		<tr><td colspan="4" align="right"><?php echo "<b>Total: </b>$found";?></td></tr>
	</tfoot>
</table>
<script type="text/javascript">
	$(".table_result").tablePagination();
</script>
<?php endif ?>