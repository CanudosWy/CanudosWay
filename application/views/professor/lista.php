<div class="sessao" style="margin: 10px 0 30px 0">
	<form method="post" action="<?=base_url('professor/busca')?>">
		<h6>Procure por um professor aqui</h6>
		<input type="text" name="busca" id="buscaProcessor"/>	
		<input type="submit" value="Pesquisar" class="btnPadrao verde" style="border:none;"/> 
	</form>
</div>

<div class="sessao" style="margin: 0px 0 30px 0">
	<h4><?=(isset($busca) && $busca != '') ? 'Resultado da busca por: '.$_POST['busca'] : ''?></h4>
</div>
<div class="sessao">
<?php
	foreach($dados as $prof){		
	?>
		<div class="descProf">
			<img src="<?=($prof->sexo == 'F') ? base_url('assets/img/img/girl.png') : base_url('assets/img/img/boy.png')?>" width="128" height="128" alt="foto professor"/>
			<h5><?=$prof->nome?></h5>
			<p><?=$prof->curriculo?></p>
			<a href="<?=base_url('professor/detalhe/'.$prof->id_professor)?>" class="btnPadrao verde" style="float:right;">Perfil Completo</a>
			<div class="divSocial">
				<a target="blank" href="<?=($prof->facebook != '') ? $prof->facebook: '' ?>" class="logo-social logo-face" style="display:<?=($prof->facebook != '') ? 'block' : 'none' ?>"></a>
				<a target="blank" href="<?=($prof->linkedin != '') ? $prof->linkedin: '' ?>" class="logo-social logo-face" style="display:<?=($prof->linkedin != '') ? 'block' : 'none' ?>"></a>
				<a target="blank" href="<?=($prof->twitter != '') ? $prof->twitter: '' ?>" class="logo-social logo-face" style="display:<?=($prof->twitter != '') ? 'block' : 'none' ?>"></a>
				<a target="blank" href="<?=($prof->google != '') ? $prof->google: '' ?>" class="logo-social logo-face" style="display:<?=($prof->google != '') ? 'block' : 'none' ?>"></a>
			</div>
		</div>
	<?php	}	?>
</div>
