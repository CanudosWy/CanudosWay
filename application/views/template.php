<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">		
	<link href="<?php echo base_url('/assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/style.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/estilo_paginas.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/jqcloud.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/jquery.multiselect.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/jquery.multiselect.filter.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/prettify.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/jquery-ui.css');?>" rel="stylesheet" media="screen">
	
	<script src="<?php echo base_url('/assets/js/jquery-2.1.1.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jqcloud-1.0.4.js');?>"></script>	
	<script src="<?php echo base_url('/assets/js/angular.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/angularApp.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/prettify.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jquery.multiselect.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jquery.multiselect.filter.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jquery.multiselect.br.js');?>"></script>

	<script src="<?php echo base_url('/assets/js/form.js');?>"></script>
	
	<title>Canudo's WAY - <?=$titulo?></title>
	
</head>
<body>
	
	<div id="tudo">
		<div id="cabecalho">
			<div id="barraTopo">
				<a href="<?=base_url()?>" class="logoBranco"></a>
				<div style="float:right;color:#FFF;margin: 15px 15px 0 0;">
					<span><b>Logado como:</b> Fulano de Tal</span>
				</div>
			</div>
			<div id="logoPagina" class="<?=$classe_icone?>"></div>
			<div id="tituloPagina"><?=$titulo?></div>
		</div>
		
		<div class="sessao">
			<?php $this->load->view($pagina);?>
		</div>
	</div>

</body>	
</html>