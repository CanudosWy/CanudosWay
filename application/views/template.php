<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Canudo's Way - Login</title>
	<link href="<?php echo base_url('application/assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('application/assets/css/style.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('application/assets/css/jquery-ui.min.css');?>" rel="stylesheet" media="screen">
	<script src="<?php echo base_url('application/assets/js/jquery-2.1.1.min.js');?>" ></script>
	<script src="<?php echo base_url('application/assets/js/bootstrap.min.js');?>" ></script>
	<script src="<?php echo base_url('application/assets/js/jquery-ui.min.js');?>" ></script>
	<script>
		$(function() {
			$( "#sortable" ).sortable();
			$( "#sortable" ).disableSelection();
		});		
	</script>
</head>
<body>

	<div class="page-header">

		<h1>Logo Canudo's Way <small>Aplicativo que possibilita você planejar o melhor caminho para concluir o seu curso na Faculdade Senac.</small></h1>
	</div>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">    
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?=base_url()?>home">HOME</a></li>
					<li><a href="#">MENU</a></li>
					<li><a href="#">MENU</a></li>
				</ul>
				<button type="button" class="btn btn-primary navbar-btn">Login</button> 
			</div>
		</div>
	</nav>

	<ol class="breadcrumb">
		<li><a href="<?php echo base_url().'home'?>">Home</a></li>
		<li class="active">Lista</li>
	</ol>

	<div class="panel panel-default">
		<div class="panel-body">
			<?php $this->load->view($pagina)?>
		</div>
		<div class="panel-footer">
			Rodapé
		</div>
	</div>

</body>
<script>

	$( "#accordion" ).accordion();
</script>
</html>


