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
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" class="active" href="#">Home</a>
			</div>   
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?=base_url()?>disciplina/novo">Cadastro Disciplina</a></li>
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				<button type="button" class="btn btn-primary navbar-btn">Sign in</button> 
			</div>
		</div>
	</nav>

	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>

	<div class="panel panel-default">
		<div class="panel-body">
			<div id="accordion">
				<h3>1º Semestre - Grade Currícular</h3>
				<div>
					<ul id="sortable" class="cadeiras">
						<li class="ui-state-default">Algoritmo de Programação</li>
						<li class="ui-state-default">Laboratório de Programação</li>
						<li class="ui-state-default">3</li>
						<li class="ui-state-default">4</li>
						<li class="ui-state-default">5</li>
						<li class="ui-state-default">6</li>
						<li class="ui-state-default">7</li>
						<li class="ui-state-default">8</li>
						<li class="ui-state-default">9</li>
						<li class="ui-state-default">10</li>
						<li class="ui-state-default">11</li>
						<li class="ui-state-default">12</li>
					</ul>
				</div>
				<h3>2º Semestre</h3>
				<div>
					<ul id="sortable">
						<li class="ui-state-default">1</li>
						<li class="ui-state-default">2</li>
						<li class="ui-state-default">3</li>
						<li class="ui-state-default">4</li>
						<li class="ui-state-default">5</li>
						<li class="ui-state-default">6</li>
						<li class="ui-state-default">7</li>
						<li class="ui-state-default">8</li>
						<li class="ui-state-default">9</li>
						<li class="ui-state-default">10</li>
						<li class="ui-state-default">11</li>
						<li class="ui-state-default">12</li>
					</ul>
				</div>
				<h3>3º Semestre</h3>
				<div>
					<ul id="sortable">
						<li class="ui-state-default">1</li>
						<li class="ui-state-default">2</li>
						<li class="ui-state-default">3</li>
						<li class="ui-state-default">4</li>
						<li class="ui-state-default">5</li>
						<li class="ui-state-default">6</li>
						<li class="ui-state-default">7</li>
						<li class="ui-state-default">8</li>
						<li class="ui-state-default">9</li>
						<li class="ui-state-default">10</li>
						<li class="ui-state-default">11</li>
						<li class="ui-state-default">12</li>
					</ul>
				</div>
				<h3>4º Semestre</h3>
				<div>
					<ul id="sortable">
						<li class="ui-state-default">1</li>
						<li class="ui-state-default">2</li>
						<li class="ui-state-default">3</li>
						<li class="ui-state-default">4</li>
						<li class="ui-state-default">5</li>
						<li class="ui-state-default">6</li>
						<li class="ui-state-default">7</li>
						<li class="ui-state-default">8</li>
						<li class="ui-state-default">9</li>
						<li class="ui-state-default">10</li>
						<li class="ui-state-default">11</li>
						<li class="ui-state-default">12</li>
					</ul>
				</div>
				<h3>5º Semestre</h3>
				<div>
					<ul id="sortable">
						<li class="ui-state-default">1</li>
						<li class="ui-state-default">2</li>
						<li class="ui-state-default">3</li>
						<li class="ui-state-default">4</li>
						<li class="ui-state-default">5</li>
						<li class="ui-state-default">6</li>
						<li class="ui-state-default">7</li>
						<li class="ui-state-default">8</li>
						<li class="ui-state-default">9</li>
						<li class="ui-state-default">10</li>
						<li class="ui-state-default">11</li>
						<li class="ui-state-default">12</li>
					</ul>
				</div>
				<h3>6º Semestre</h3>
				<div>
					<ul id="sortable">
						<li class="ui-state-default">1</li>
						<li class="ui-state-default">2</li>
						<li class="ui-state-default">3</li>
						<li class="ui-state-default">4</li>
						<li class="ui-state-default">5</li>
						<li class="ui-state-default">6</li>
						<li class="ui-state-default">7</li>
						<li class="ui-state-default">8</li>
						<li class="ui-state-default">9</li>
						<li class="ui-state-default">10</li>
						<li class="ui-state-default">11</li>
						<li class="ui-state-default">12</li>
					</ul>
				</div>
			</div>
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


