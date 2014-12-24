<?php if($this->session->flashdata('success') !== FALSE): ?>
<div class="alert alert-success"><div onclick="$(this).parent().hide();" class="alert-close-x alert-close-success">&times;</div><?php echo $this->session->flashdata('success') ?></div>
<?php endif; ?>

<?php if($this->session->flashdata('error') !== FALSE): ?>
<div class="alert alert-danger"><div onclick="$(this).parent().hide();" class="alert-close-x alert-close-danger">&times;</div><?php echo $this->session->flashdata('error') ?></div>
<?php endif; ?>

<?php if($this->session->flashdata('warning') !== FALSE): ?>
<div class="alert alert-warning"><div onclick="$(this).parent().hide();" class="alert-close-x alert-close-warning">&times;</div><?php echo $this->session->flashdata('warning') ?></div>
<?php endif; ?>

<style type="text/css">
.alert{
	position: relative;
}

.alert-close-x{
	position: absolute;
	top: 5px;
	right: 10px;
	font-size: 21px;
	font-weight: 700;
	line-height: 1;
	color: #000;
	text-shadow: 0 1px 0 #fff;
	filter: alpha(opacity=20);
	opacity: .5;
}

.alert-success a, .alert-success a, .alert-warning a, .alert-danger a, .alert-console a{
	text-decoration: underline;
}
.alert-success a {
	color: #245269;
}
.alert-success a {
	color: #2b542c;
}
.alert-warning a {
	color: #66512c;
}
.alert-danger a {
	color: #843534;
}
.alert-console a {
	color: #428bca;
}
.alert-success a:hover, .alert-success a:hover, .alert-warning a:hover, .alert-danger a:hover {
	color: black;
}

.alert-close-success{
	color: #31708f;
}
.alert-close-success{
	color: #3c763d;
}
.alert-close-warning{
	color: #8a6d3b;
}
.alert-close-danger{
	color: #a94442;
}
.alert-close-console{
	color: #ffffff;
}
.alert-close-x:hover{
	cursor: pointer;
	filter: alpha(opacity=100);
	opacity: 1;
}
</style>