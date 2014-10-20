<form id="getDetalhesDiciplina" action="<?=base_url('disciplina/getDetalhesDiciplina')?>" />

<div class="modal fade" id="modalDisciplina">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
        <h4 class="modal-title">Detalhes da Disciplina</h4>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="accordion">
	<h3>1º Semestre - ADS</h3>
	<div>
		<ul id="sortable" class="cadeiras">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "1"){
					?>
						<li class="ui-state-default "><a href="#" class="glyphicon glyphicon-eye-open" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);" title="Visualizar"></a><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
	<h3>2º Semestre - ADS</h3>
	<div>
		<ul id="sortable">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "2"){
					?>
						<li class="ui-state-default"><a href="#" class="glyphicon glyphicon-eye-open" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);" title="Visualizar"></a><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
	<h3>3º Semestre - ADS</h3>
	<div>
		<ul id="sortable">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "3"){
					?>
						<li class="ui-state-default"><a href="#" class="glyphicon glyphicon-eye-open" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);" title="Visualizar"></a><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
	<h3>4º Semestre - ADS</h3>
	<div>
		<ul id="sortable">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "4"){
					?>
						<li class="ui-state-default"><a href="#" class="glyphicon glyphicon-eye-open" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);" title="Visualizar"></a><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
	<h3>5º Semestre - ADS</h3>
	<div>
		<ul id="sortable">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "5"){
					?>
						<li class="ui-state-default"><a href="#" class="glyphicon glyphicon-eye-open" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);" title="Visualizar"></a><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
	<h3>6º Semestre - ADS</h3>
	<div>
		<ul id="sortable">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "6"){
					?>
						<li class="ui-state-default"><a href="#" class="glyphicon glyphicon-eye-open" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);" title="Visualizar"></a><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
</div>