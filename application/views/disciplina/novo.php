<h1 class="h1Form"><?=$acao?> :: <?=$titulo?></h1>
<div class="divFormPadrao">		
	<form class="formaCadastroPadrao" action="<?=base_url().$this->sessao.'/salvar'?>" method="post" name="cadCategoria">
		<div class="divLabel"> 
			<label>Nome da Disciplina:</label>
			<input type="text" name="nome"/>
		</div>
		<input class="btnSalvar" type="submit" name="salvar" value="SALVAR"/>
		<a class="btnSalvar" href="<?=base_url().$sessao.'/lista'?>">CANCELAR</a>
	</form>
</div>
