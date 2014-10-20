<head>
	<meta charset="UTF-8">	
	<link href="<?php echo base_url('/assets/css/jquery-ui.min.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/style.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/estilo_paginas.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('/assets/css/jqcloud.css');?>" rel="stylesheet" media="screen">
	
	<script src="<?php echo base_url('/assets/js/jquery-2.1.1.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jqcloud-1.0.4.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/form.js');?>"></script>
	
	<title>Canudo's WAY - Grade Curricular</title>
	
	<script>
		$(function() {
			
			$( "#accordion" ).accordion({heightStyle: "content"});
			
			$(".ulLista1,.dropSegunda").sortable({
                connectWith: ".dropSegunda,.ulLista1",
                dropOnEmpty: true,
				receive: function(event, ui) {
					var list = $(this);
					if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});
			$(".ulLista2,.dropTerca").sortable({
                connectWith: ".dropTerca,.ulLista2",
                dropOnEmpty: true,
				receive: function(event, ui) {
					var list = $(this);
					if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});
			$(".ulLista3,.dropQuarta").sortable({
                connectWith: ".dropQuarta,.ulLista3",
                dropOnEmpty: true,
				receive: function(event, ui) {
					var list = $(this);
					if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});
			$(".ulLista4,.dropQuinta").sortable({
                connectWith: ".dropQuinta,.ulLista4",
                dropOnEmpty: true,
				receive: function(event, ui) {
					var list = $(this);
					if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});
			$(".ulLista5,.dropSexta").sortable({
                connectWith: ".dropSexta,.ulLista5",
                dropOnEmpty: true,
				receive: function(event, ui) {
					var list = $(this);
					if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});
	 
			$(".ulListaSegunda,.dropSegunda").disableSelection();
			
			$('.logoBranco').click(function(){
				window.location =  window.location.pathname.substr(0, window.location.pathname.lastIndexOf('/'));
			})
		});

	</script>
	
	<title>Canudos's WAY</title>
</head>
<html>
	 
	<div id="tudo">
		<div id="cabecalho">
			<div id="barraTopo">
				<div class="logoBranco"></div>
				<div style="float:right;color:#FFF;margin: 15px 15px 0 0;">
					<span><b>Logado como:</b> Fulano de Tal</span>
				</div>
			</div>
			<div id="logoPagina" class="ico-grade"></div>
			<div id="tituloPagina">GRADE CURRICULAR</div>
		</div>
		
		<div class="sessao">
			<h1 class="titulo1">Arraste as cadeiras que deseja cursar neste semestre</h1>
		</div>
		
		<div class="sessao">
			<span class="tituloSemana">segunda-feira</span>
			<span class="tituloSemana">terça-feira</span>
			<span class="tituloSemana">quarta-feira</span>
			<span class="tituloSemana">quinta-feira</span>
			<span class="tituloSemana">sexta-feira</span>
		</div>
		
		<div class="sessao">
			<ul class="divDisciplinaHolder dropSegunda"></ul>
			<ul class="divDisciplinaHolder dropTerca"></ul>
			<ul class="divDisciplinaHolder dropQuarta"></ul>
			<ul class="divDisciplinaHolder dropQuinta"></ul>
			<ul class="divDisciplinaHolder dropSexta"></ul>
		</div>
		
		<div class="sessao">
			<button style="float:right" class="btnPadrao verde borda-verde">Salvar</button>
		</div>
		
		<div class="sessao">
			<div id="accordion">
				<h3>1º semestre</h3>
		
				<div>
					<div class="sessao">
						<span class="tituloSemana">segunda-feira</span>
						<span class="tituloSemana">terça-feira</span>
						<span class="tituloSemana">quarta-feira</span>
						<span class="tituloSemana">quinta-feira</span>
						<span class="tituloSemana">sexta-feira</span>
					</div>
					
					<?php
						foreach($dados as $dado){
							if($dado->semestre == "1"){
							?>
								<ul class="ulLista ulLista<?=$dado->dia_semana?>">
									<li class="divDisciplina">
										<h1><?=$dado->nome_disciplina." ".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
									</li>
								</ul>
							<?php
							}
						}
					?>
				</div>
			  <h3>2º semestre</h3>
			  <div>
					<div class="sessao">
						<span class="tituloSemana">segunda-feira</span>
						<span class="tituloSemana">terça-feira</span>
						<span class="tituloSemana">quarta-feira</span>
						<span class="tituloSemana">quinta-feira</span>
						<span class="tituloSemana">sexta-feira</span>
					</div>
					
					<?php
						foreach($dados as $dado){
							if($dado->semestre == "2"){
							?>
								<ul class="ulLista ulLista<?=$dado->dia_semana?>">
									<li class="divDisciplina">
										<h1><?=$dado->nome_disciplina." ".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
									</li>
								</ul>
							<?php
							}
						}
					?>	
				</div>
			  <h3>3º semestre</h3>
			  <div>
					<div class="sessao">
						<span class="tituloSemana">segunda-feira</span>
						<span class="tituloSemana">terça-feira</span>
						<span class="tituloSemana">quarta-feira</span>
						<span class="tituloSemana">quinta-feira</span>
						<span class="tituloSemana">sexta-feira</span>
					</div>
					
					<?php
						foreach($dados as $dado){
							if($dado->semestre == "3"){
							?>
								<ul class="ulLista ulLista<?=$dado->dia_semana?>">
									<li class="divDisciplina">
										<h1><?=$dado->nome_disciplina." ".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
									</li>
								</ul>
							<?php
							}
						}
					?>
				</div>
			  <h3>4º semestre</h3>
			  <div>
					<div class="sessao">
						<span class="tituloSemana">segunda-feira</span>
						<span class="tituloSemana">terça-feira</span>
						<span class="tituloSemana">quarta-feira</span>
						<span class="tituloSemana">quinta-feira</span>
						<span class="tituloSemana">sexta-feira</span>
					</div>
					
					<?php
						foreach($dados as $dado){
							if($dado->semestre == "4"){
							?>
								<ul class="ulLista ulLista<?=$dado->dia_semana?>">
									<li class="divDisciplina">
										<h1><?=$dado->nome_disciplina." ".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
									</li>
								</ul>
							<?php
							}
						}
					?>
				</div>
			  <h3>5º semestre</h3>
			  <div>
					<div class="sessao">
						<span class="tituloSemana">segunda-feira</span>
						<span class="tituloSemana">terça-feira</span>
						<span class="tituloSemana">quarta-feira</span>
						<span class="tituloSemana">quinta-feira</span>
						<span class="tituloSemana">sexta-feira</span>
					</div>
					
					<?php
						foreach($dados as $dado){
							if($dado->semestre == "5"){
							?>
								<ul class="ulLista ulLista<?=$dado->dia_semana?>">
									<li class="divDisciplina">
										<h1><?=$dado->nome_disciplina." ".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
									</li>
								</ul>
							<?php
							}
						}
					?>
				</div>
			  <h3>6º semestre</h3>
			 <div>
					<div class="sessao">
						<span class="tituloSemana">segunda-feira</span>
						<span class="tituloSemana">terça-feira</span>
						<span class="tituloSemana">quarta-feira</span>
						<span class="tituloSemana">quinta-feira</span>
						<span class="tituloSemana">sexta-feira</span>
					</div>
					
					<?php
						foreach($dados as $dado){
							if($dado->semestre == "6"){
							?>
								<ul class="ulLista ulLista<?=$dado->dia_semana?>">
									<li class="divDisciplina">
										<h1><?=$dado->nome_disciplina." ".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
									</li>
								</ul>
							<?php
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
	
	
	
</html>
<style>
.ui-accordion .ui-accordion-header{
	display: block;
	cursor: pointer;
	position: relative;
	margin: 1px 0 0 0;
	padding-top: 17px;
	font-size: 9pt;
	height: 25px;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
	background:#9473ba;
	border:none;
	color:#FFF;
	text-transform:uppercase;
	font-size:9pt;
	font-family:arial;
	font-weight:bold;
}
.ui-widget-content{
	background:transparent;
	border:none;
}
.ui-accordion .ui-accordion-content{
	overflow:hidden;
	padding:10px 0px 0px 0px;
}
</style>

<form id="getDetalhesDiciplina" action="<?=base_url('disciplina/getDetalhesDiciplina')?>" />

<div class="modal fade" id="modalDisciplina">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      <div id="dadosDisciplina"></div>
       <div id="wordcloud"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

