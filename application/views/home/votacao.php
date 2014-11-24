<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">	
	<link href="<?php echo base_url('/assets/css/steps.css');?>" rel="stylesheet" media="screen">
	
	<script src="<?php echo base_url('/assets/js/jquery-2.1.1.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/bootstrap.min.js');?>"></script>
	
	<script src="<?php echo base_url('/assets/js/jquery.steps.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/votacao.js');?>"></script>
	
	<title>Canudo's WAY - <?=$titulo?></title>
	
</head>
<body>
	<form id="formVotaocao" method="POST" action="<?=base_url('home/salvarVotacao')?>" >
		
		<input type="hidden" name="id_disciplina" value="<?=$disciplina?>"/>
		<input type="hidden" name="id_turma" value="<?=$turma?>"/>
		<input type="hidden" name="id_aluno" value="<?=$aluno?>"/>
		
		
		<div id="containerVotacao">
			<h3>Dificuldade</h3>
			<section>
				<h3 class="titulo">TEMA: Dificuldade</h3>
				
				<?php
					foreach($dados as $hashtag){
						if($hashtag->tema == "Dificuldade"){
						?>
							<span class="hashtag"><input type="radio" name="dificuldade" value="<?=$hashtag->id_hashtag?>"/> <span><?=$hashtag->nome?></span></span>
						<?php	
						}
					}
				?>
			</section>
			<h3>Trabalhos</h3>
			<section>
				<h3 class="titulo">TEMA: Trabalhos</h3>
				
				<?php
					foreach($dados as $hashtag){
						if($hashtag->tema == "Trabalhos"){
						?>
							<span class="hashtag"><input type="radio" name="trabalhos" value="<?=$hashtag->id_hashtag?>"/> <span><?=$hashtag->nome?></span></span>
						<?php	
						}
					}
				?>
			</section>
			<h3>Provas</h3>
			<section>
				<h3 class="titulo">TEMA: Provas</h3>
				
				<?php
					foreach($dados as $hashtag){
						if($hashtag->tema == "Provas"){
						?>
							<span class="hashtag"><input type="radio" name="provas" value="<?=$hashtag->id_hashtag?>"/> <span><?=$hashtag->nome?></span></span>
						<?php	
						}
					}
				?>
			</section>
			<h3>Quantidade de Conteudo</h3>
			<section>
				<h3 class="titulo">TEMA: Quantidade de Conteudo</h3>
				
				<?php
					foreach($dados as $hashtag){
						if($hashtag->tema == "Quantidade de Conteudo"){
						?>
							<span class="hashtag"><input type="radio" name="quantidadeConteudo" value="<?=$hashtag->id_hashtag?>"/> <span><?=$hashtag->nome?></span></span>
						<?php	
						}
					}
				?>
			</section>
		</div>
	</form>
</body>