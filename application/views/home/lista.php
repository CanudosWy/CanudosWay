<div id="accordion">
	<h3>1º Semestre - ADS</h3>
	<div>
		<ul id="sortable" class="cadeiras">
			<?php
				foreach($dados as $dado){
					if($dado->semestre == "1"){
					?>
						<li class="ui-state-default"><?=$dado->nome_disciplina?></li>
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
						<li class="ui-state-default"><?=$dado->nome_disciplina?></li>
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
						<li class="ui-state-default"><?=$dado->nome_disciplina?></li>
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
						<li class="ui-state-default"><?=$dado->nome_disciplina?></li>
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
						<li class="ui-state-default"><?=$dado->nome_disciplina?></li>
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
						<li class="ui-state-default"><?=$dado->nome_disciplina?></li>
					<?php
					}
				}
			?>
		</ul>
	</div>
</div>