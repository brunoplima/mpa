<?php if(isset($stats)): //echo '<pre>'.print_r($stats,true).'</pre>'?>

<h1>Resultado da Prova #<?php echo $id?></h1>
<hr>
<div class="container">
	<div class="column">
		<div class="columnTitle"><br>Resolução</div>
		<canvas id="answeredChart" width="200" height="200"></canvas>
		<div id="answeredLegend"></div>
	</div>
	<div class="column">
		<div class="columnTitle">Tipo&nbsp;de&nbsp;Questão<br><small>(Respondidas)</small></div>
		<canvas id="typeChart" width="200" height="200"></canvas>
		<div id="typeLegend"></div>
	</div>
	<div class="column">
		<div class="columnTitle">Correção<br><small>(Objetivas)</small></div>
		<canvas id="accuraceChart" width="200" height="200"></canvas>
		<div id="accuraceLegend"></div>
	</div>
</div>
<br><br>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Resumo</h3>
	</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr><th></th><th></th><th>Qtde.</th></tr>
			</thead>
			<tbody>
				<tr style="font-size: x-large"><th colspan="2">Total de questões</th>                                                        <td><b><?php echo $stats['demanded'] ?></b></td></tr>
				<tr>                           <td colspan="2" id="answeredRow">Respondidas</td>                                             <td><?php echo $stats['answered'] ?></td></tr>
				<tr>                           <td colspan="2" id="notAnsweredRow">Não respondidas </td>                                     <td><?php echo $stats['demanded']-$stats['answered'] ?></td></tr>
				<tr>                           <td rowspan="2" id="objetivasRow">Objetivas</td>          <td id="correctsRow">Corretas</td>  <td><?php echo $stats['correct'] ?></td></tr>
				<tr>                                                                                     <td id="wrongRow">Incorretas</td>   <td><?php echo $stats['wrong'] ?></td></tr>
				<tr>                           <td colspan="2" id="subjetivasRow">Subjetivas</td>                                            <td><?php echo $stats['subjetivas'] ?></td></tr>
			</tbody>
		</table>
	</div>
</div>
<hr>
<div class="prova_timestamp pull-left">Prova corrigida em <?php echo $stats['time']?></div>
<div class="pull-right">
	<!-- <button type="button" class="btn btn-default" id="redo">Gerar nova prova <span class="glyphicon glyphicon-file"></span></button> -->
	<button type="button" class="btn btn-default" id="list">Minhas provas <span class="glyphicon glyphicon-list"></span></button>
	<button type="button" class="btn btn-primary" id="view">Ver respostas <span class="glyphicon glyphicon-eye-open"></span></button>
</div>

<script type="text/javascript">
$(function(){
	setTimeout(answeredChartCall, 0);
	setTimeout(typeChartCall, 400);
	setTimeout(accuraceChartCall, 800);
});
function answeredChartCall(){answeredChart(<?php echo $stats['answered'] ?>, <?php echo $stats['demanded']-$stats['answered'] ?>);}
function typeChartCall(){typeChart(<?php echo $stats['objetivas'] ?>, <?php echo $stats['subjetivas'] ?>);}
function accuraceChartCall(){accuraceChart(<?php echo $stats['correct'] ?>,<?php echo $stats['wrong'] ?>);}
$("#redo").click(function(){window.location="<?php echo site_url('prova/gerar')?>";});
$("#list").click(function(){window.location="<?php echo site_url('prova/lista')?>";});
$("#view").click(function(){window.location='<?php echo site_url("prova/visualizar/$id")?>';});
</script>
<?php endif ?>