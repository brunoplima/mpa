<h1>Minhas provas</h1><hr>
<table class="table table-hover table-condensed table-striped table_result">
	<thead>
		<tr><th>#</th><th>Data</th><th>Disciplina</th><th width="100px" class='icon_actions'>Ações</th></tr>
	</thead>
	<tbody>
		<?php foreach ($list as $row): ?>
		<tr>
			<td><?php echo $row->id ?></td>
			<td><?php echo $row->stored ?></td>
			<td><?php echo $row->discipline ?></td>
			<td class='icon_actions'>
				<div class='icon_action_prova_delete'>
					<input type="hidden" value="<?php echo $row->id; ?>" />
				</div>
				<div class='icon_action_prova_get_statistics' title="Ver Resultado">
					<input type="hidden" value="<?php echo $row->id; ?>"/>
				</div>
				<div class='icon_action_prova_view'>
					<input type="hidden" value="<?php echo $row->id; ?>"/>
				</div>
			</td>
		</tr>
		<?php endforeach ?>
		<?php if(count($list) == 0): ?>
			<tr><td colspan="4" align="center">Nenhum registro encontrado</td></tr>
		<?php endif?>
	</tbody>
	<?php $found = count($list); $found .= $found == 1 ? ' registro' : ' registros';?>
	<tfoot>
		<tr><td colspan="4" align="right"><?php echo "<b>Total: </b>$found";?></td></tr>
	</tfoot>
</table>