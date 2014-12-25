<?php if(isset($test)): //echo '<pre>'.print_r($test,true).'</pre>'?>
	<h1 align="center">Resultado da Prova #<?php echo $id?></h1>
	<hr>
	<div id="prova_title"><b>Disciplina:</b> <i><?php echo $test['discipline'] ?></i></div>
	<?php foreach ($questions as $key => $question): ?>
		<?php
			$classPanel = 'default';
			$titlePanel = 'Questão subjetiva';
			if($question['is_correct'] === '0') {$classPanel = 'danger'; $titlePanel = 'Resposta incorreta';}
			elseif($question['is_correct'] === '1') {$classPanel = 'success'; $titlePanel = 'Resposta correta';}
		?>
		<div class="panel panel-<?php echo $classPanel?>" title="<?php echo $titlePanel?>">
			<div class="panel-heading">
			<button type="button" value="<?php echo $question['id_question']?>" class="btn btn-<?php echo $classPanel?> pull-right other_resps" title="Respostas dos alunos"><span class="glyphicon glyphicon-comment"></span></button>
				<h3 class="panel-title"><?php echo $key+1 ?>) <?php echo str_replace("\n","<br>",$question['enunciado']) ?></h3>
			</div>
			<div class="panel-body">
				<?php
					if(isset($question['resposta']))
						echo $question['resposta'];
					else
						echo str_replace("\n", "<br>", $question['answer']);
				?>
			</div>
		</div>
	<?php endforeach ?>
	<div class="prova_timestamp pull-left">Prova corrigida em <?php echo $test['stored']?></div>
	<div class="pull-right">
		<!-- <button type="button" class="btn btn-default" id="redo">Gerar nova prova <span class="glyphicon glyphicon-file"></span></button> -->
		<button type="button" class="btn btn-default" id="list">Minhas provas <span class="glyphicon glyphicon-list"></span></button>
		<button type="button" class="btn btn-primary" id="stats">Ver estatísticas <span class="glyphicon glyphicon-stats"></span></button>
	</div>
<?php endif ?>
<style>
.panel-body{
	padding: 20px;
}
#prova_title{
	font-size: larger;
	margin: 25px;
}
</style>
<script type="text/javascript">
	$("#redo").click(function(){window.location="<?php echo site_url('prova/gerar')?>";});
	$("#list").click(function(){window.location="<?php echo site_url('prova/lista')?>";});
	$("#stats").click(function(){window.location='<?php echo site_url("prova/estatisticas/$id")?>';});
</script>