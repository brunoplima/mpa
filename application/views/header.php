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
		<?php echo link_tag('css/bootstrap.min.css');?>
		<?php echo link_tag('css/header.css');?>
		<?php if(isset($css)) foreach ($css as $file) echo link_tag("css/$file");?>
		<?php echo script_tag('js/jquery-2.1.1.min.js');?>
		<?php echo script_tag('js/bootstrap.min.js');?>
		<?php if(isset($js))  foreach ($js as $file)  echo link_tag("js/$file"); ?>
		<script>$(document).ready(function(){$( "#username" ).focus();});</script>
	</head>
	<body>
		<div id="header">
			<div id="appTitle">Minha Prova - Aluno</div>
				<div id="user" class="dropdown pull-right">
					<a data-target="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->session->userdata('mpa_logged_in')['username']; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a data-target="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo site_url('userauth/logout')?>" style="color: red"><span class="glyphicon glyphicon-remove"></span> Sair</a></li>
					</ul>
				</div>
		</div>
		<div id="topmenu">
			<div id='topmenu_content'>
				<ul>
					<li><?php  echo anchor('aluno', 'Página Inicial');?></li>
				</ul>
			</div>
		</div>
