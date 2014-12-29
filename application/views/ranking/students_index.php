<h1>Escolha um Critério:</h1><br>
<div class="list-group">
	<a href="<?php echo site_url('ranking/alunos/correcao') ?>" class="list-group-item">
		<h3 class="list-group-item-heading">Correção</h3>
		<p class="list-group-item-text">Quantidade de questões repondidas corretamente<br><small><i>(Apenas Questões Objetivas)</i></small></p>
	</a>

	<a href="<?php echo site_url('ranking/alunos/resolucao') ?>" class="list-group-item">
		<h3 class="list-group-item-heading">Resolução</h3>
		<p class="list-group-item-text">Quantidade total de questões repondidas no sistema<br><small><i>(Questões Objetivas e Subjetivas)</i></small></p>
	</a>

	<a href="<?php echo site_url('ranking/alunos/aproveitamento') ?>" class="list-group-item">
		<h3 class="list-group-item-heading">Aproveitamento</h3>
		<p class="list-group-item-text">Taxa de acerto sobre o total de questões respondidas<br><small><i>(Questões Objetivas e Subjetivas)</i></small></p>
	</a>
</div>