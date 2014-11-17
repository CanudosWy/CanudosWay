<a href="<?=base_url('professor')?>"  style="float:left;margin-bottom:20px;" class="btnPadrao azul">VOLTAR</a>

<div class="sessao">
	<div class="detalhePerfil">
		<img src="<?=($professor->sexo == 'F') ? base_url('assets/img/img/girl.png') : base_url('assets/img/img/boy.png')?>" width="128" height="128" alt="foto professor"/>
		<h5><?=$professor->nome?></h5>
		<div class="divSocial">
			<a target="blank" href="<?=($professor->facebook != '') ? $professor->facebook: '' ?>" class="logo-social logo-face" style="display:<?=($professor->facebook != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->linkedin != '') ? $professor->linkedin: '' ?>" class="logo-social logo-in" style="display:<?=($professor->linkedin != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->twitter != '') ? $professor->twitter: '' ?>" class="logo-social logo-twitter" style="display:<?=($professor->twitter != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->google != '') ? $professor->google: '' ?>" class="logo-social logo-google" style="display:<?=($professor->google != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->curriculo_lattes != '') ? $professor->curriculo_lattes: '' ?>" class="logo-social logo-lattes" style="display:<?=($professor->curriculo_lattes != '') ? 'block' : 'none' ?>"></a>
		</div>
	</div>

	<div class="detalhePerfilCurriculo">
		<h5 style="font-weight:bold;margin:0;">Resumo do currículo</h5>
		<p><?=$professor->curriculo?></p>
	</div>

</div>


<div class="sessao">
	<h5 style="font-weight:bold;margin:0;">Disciplinas que sou professor(a):</h5>
	<?php
	foreach($disciplinas as $disciplina){
		echo ('<a href="#" onclick="detalhesDisciplina(' . $disciplina->id_disciplina . ');" class="disciplinasProf">' . $disciplina->nome_disciplina. '</a>');

	}  ?>
</div>

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
