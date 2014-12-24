<?php echo doctype('html5') ?>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<?php
		$meta = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'application-name', 'content' => 'Minha Prova - Aluno'),
			array('name' => 'description', 'content' => 'Minha Prova - Aluno'),
			array('name' => 'author', 'content' => 'Bruno Lima'),
		);
		echo meta($meta);
		$pageTitle = isset($title) ? $title : 'Minha Prova - Aluno';
		?>
		<title><?php echo $pageTitle ?></title>
		<link rel="shortcut icon" href="http://localhost/mpa/favicon.ico?v=2" />
		<?php echo link_tag('css/bootstrap.min.css');?>
		<?php echo link_tag('css/header.css');?>
		<?php echo link_tag('css/commom.css');?>
		<?php echo link_tag('css/pace-flash-blue.css');?>
		<?php echo link_tag('css/sweet-alert.css');?>
		<?php if(isset($css)) foreach ($css as $file) echo link_tag("css/$file.css");?>
		<?php echo script_tag('js/jquery-2.1.1.min.js');?>
		<?php echo script_tag('js/bootstrap.min.js');?>
		<?php echo script_tag('js/commom.js');?>
		<?php echo script_tag('js/pace.min.js');?>
		<?php echo script_tag('js/sweet-alert.min.js');?>
		<?php if(isset($js))  foreach ($js as $file)  echo script_tag("js/$file.js"); ?>
		<script>$(document).ready(function(){$( "#username" ).focus();});</script>
	</head>
	<body>
		<div id="header">
			<div id="appTitle">Minha Prova - Aluno</div>
				<div id="user" class="dropdown pull-right">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->session->userdata('mpa_logged_in')['name']; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('user/settings')?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('userauth/logout')?>" style="color: red"><span class="glyphicon glyphicon-remove"></span> Sair</a></li>
					</ul>
				</div>
		</div>
		<div id="topmenu">
			<div id='topmenu_content'>
				<ul>
					<li><?php echo anchor('aluno', '<span class="glyphicon glyphicon-home"></span>');?></li>
					<li class='has-sub'><?php echo anchor('user', 'Prova');?>
						<ul>
							<li><a><?php echo anchor('prova/gerar', 'Gerar');?></a></li>
							<li><a>Corrigir</a></li>
						</ul>
					</li>
					<li class='has-sub'><a>Ranking de questões</a>
						<ul>
							<li><a>Direto</a></li>
							<li><a>Baseado Respostas</a></li>
						</ul>
					</li>
					<li class='has-sub'><a>Minhas respostas</a>
						<ul>
							<li><a>Ver</a></li>
							<li><a>Compartilhar</a></li>
						</ul>
					</li>
					<li><a>Ranking de alunos</a></li>
				</ul>
			</div>
		</div>
		<div id="layoutContent">
			<div id="tableWrapper">
				<div id="tableRow">
					<div id="tableContent">
