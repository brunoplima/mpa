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
		?>
		<title>Minha Prova - Aluno</title>
		<link rel="shortcut icon" href="http://localhost/mpa/favicon.ico?v=2" />
		<?php echo link_tag('css/bootstrap.min.css');?>
		<?php echo link_tag('css/header.css');?>
		<?php echo link_tag('css/commom.css');?>
		<?php echo link_tag('css/pace-flash-white.css');?>
		<?php echo link_tag('css/sweet-alert.css');?>
		<?php if(isset($css)) foreach ($css as $file) echo link_tag("css/$file.css");?>
		<?php echo script_tag('js/jquery-2.1.1.min.js');?>
		<?php echo script_tag('js/bootstrap.min.js');?>
		<?php echo script_tag('js/window_behaviour.js');?>
		<?php echo script_tag('js/commom.js');?>
		<?php echo script_tag('js/pace.min.js');?>
		<?php echo script_tag('js/sweet-alert.min.js');?>
		<?php if(isset($js))  foreach ($js as $file)  echo script_tag("js/$file.js"); ?>
		<?php if(isset($highlight)):?>
		<script>$(document).ready(function(){$( '#<?php echo "menu_$highlight" ?>' ).addClass('active');});</script>
		<?php endif ?>

	</head>
	<body>
		<div id="pageHeader">
			<div id="headerContent">
				<div id="appTitle"><?php echo anchor(site_url(), 'Minha Prova - <small>Aluno</small>');?></div>
				<ul class="nav nav-pills" id="topmenu">
					<li role="presentation" id="menu_aluno"><?php echo anchor(site_url(), 'Início');?></li>
					<li role="presentation" class="dropdown" id="menu_prova">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							Prova <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><?php echo anchor('prova/gerar', 'Gerar');?></li>
							<li><?php echo anchor('prova/lista', 'Minhas provas');?></li>
						</ul>
					</li>
					<li role="presentation" class="dropdown pull-right" id="menu_prova">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							<?php $s=$this->session->userdata('mpa_logged_in'); echo $s['name']; ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><?php echo anchor('user/settings', '<span class="glyphicon glyphicon-cog"></span> Configurações');?></li>
							<li><?php echo anchor('userauth/logout', '<span class="glyphicon glyphicon-remove" style="color: red"></span> Sair');?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div id="pageBody" class="ui-corner-bottom">
			<?php if(isset($pageTitle)): ?>
			<div id="pageTitle"><?php echo $pageTitle?></div>
			<?php endif ?>
			<div id="bodyContent" class="ui-corner-all">
