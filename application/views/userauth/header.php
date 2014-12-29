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
		<?php echo link_tag('css/userAuth/main.css');?>
		<?php echo script_tag('js/jquery-2.1.1.min.js');?>
		<?php echo script_tag('js/bootstrap.min.js');?>
		<?php echo script_tag('js/portuguese.js');?>
		<?php echo script_tag('js/window_behaviour.js');?>
		<script>$(document).ready(function(){$( "#username" ).focus();});</script>
	</head>
	<body>
		<div id="pageHeader">
			<div id="headerContent">
				<div id="appTitle"><a href="<?php echo site_url()?>">Minha Prova - <small>Aluno</small></a></div>
			</div>
		</div>