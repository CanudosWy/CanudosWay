<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Canudo's Way - Login</title>
	<link href="<?php echo base_url('application/assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('application/assets/css/style.css');?>" rel="stylesheet" media="screen">
	<script src="<?php echo base_url('application/assets/js/jquery-2.1.1.min.js');?>" ></script>
	<script src="<?php echo base_url('application/assets/js/bootstrap.min.js');?>" ></script>
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
					<li><a href="#">Link</a></li>
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
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar">
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</form>    
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

		Conteúdo
		</div>
		<div class="panel-footer">
			
		Rodapé
		</div>
	</div>

</body>
</html>


