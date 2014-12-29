<?php if(isset($students)): ?>
<table class="table table-hover table-condensed table-striped table_result">
	<thead>
		<tr><th>#</th><th>Usuário</th><th>Nome</th><th><?php echo $colName ?></th></tr>
	</thead>
	<tbody>
		<?php $cnt = 0; foreach ($students as $row): $cnt++; ?>
		<tr>
			<td><?php echo $cnt ?></td>
			<td><?php echo $row['username'] ?></td>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['cnt'] ?></td>
		</tr>
		<?php endforeach ?>
		<?php if(count($students) == 0): ?>
			<tr><td colspan="4" align="center">Nenhum registro encontrado</td></tr>
		<?php endif?>
	</tbody>
	<?php $found = count($students); $found .= $found == 1 ? ' registro' : ' registros';?>
	<tfoot>
		<tr><td colspan="4" align="right"><?php echo "<b>Total: </b>$found";?></td></tr>
	</tfoot>
</table>
<script type="text/javascript">
	$(".table_result").tablePagination();
</script>
<?php endif ?>