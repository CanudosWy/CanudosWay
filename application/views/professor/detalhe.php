<a href="<?=base_url('professor')?>"  style="float:left;margin-bottom:20px;" class="btnPadrao azul">VOLTAR</a>

<div class="sessao">
	<div class="detalhePerfil">
		<img src="<?=($professor->sexo == 'F') ? base_url('assets/img/img/girl.png') : base_url('assets/img/img/boy.png')?>" width="128" height="128" alt="foto professor"/>
		<h5><?=$professor->nome?></h5>
		<div class="divSocial">
			<a target="blank" href="<?=($professor->facebook != '') ? $professor->facebook: '' ?>" class="logo-social logo-face" style="display:<?=($professor->facebook != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->linkedin != '') ? $professor->linkedin: '' ?>" class="logo-social logo-face" style="display:<?=($professor->linkedin != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->twitter != '') ? $professor->twitter: '' ?>" class="logo-social logo-face" style="display:<?=($professor->twitter != '') ? 'block' : 'none' ?>"></a>
			<a target="blank" href="<?=($professor->google != '') ? $professor->google: '' ?>" class="logo-social logo-face" style="display:<?=($professor->google != '') ? 'block' : 'none' ?>"></a>
		</div>
	</div>

	<div class="detalhePerfilCurriculo">
		<h5 style="font-weight:bold;margin:0;">Resumo do currículo</h5>
		<p><?=$professor->curriculo?></p>
	</div>

</div>

<div class="sessao">
	<h5 style="font-weight:bold;margin:0;">Disciplinas que sou professor(a):</h5>
	<?foreach($disciplinas as $disciplina){?>
		<a href="" class="disciplinasProf"><?=$disciplina->nome_disciplina?></a>
	<?}?>
</div>