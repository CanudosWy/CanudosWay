	<script src="<?php echo base_url('/assets/js/grade.js');?>"></script>
	
	
	<div class="sessao">
		<h1 class="titulo1">Arraste as cadeiras que deseja cursar neste semestre</h1>
	</div>
	
	<div class="sessao">
		<span class="tituloSemana">segunda-feira</span>
		<span class="tituloSemana">terça-feira</span>
		<span class="tituloSemana">quarta-feira</span>
		<span class="tituloSemana">quinta-feira</span>
		<span class="tituloSemana">sexta-feira</span>
		<span class="tituloSemana">sábado</span>
	</div>
	
	<div class="sessao" id="divDisciplinaSalvar">
		<ul class="divDisciplinaHolder dropSegunda"></ul>
		<ul class="divDisciplinaHolder dropTerca"></ul>
		<ul class="divDisciplinaHolder dropQuarta"></ul>
		<ul class="divDisciplinaHolder dropQuinta"></ul>
		<ul class="divDisciplinaHolder dropSexta"></ul>
		<ul class="divDisciplinaHolder dropSabado"></ul>
	</div>
	
	<div class="sessao">
		<input id="salvarDisciplinas" value="<?=base_url('disciplina/salvar')?>" type="hidden" />
		<button id="btnSalvarDisciplinas" style="float:right" class="btnPadrao verde borda-verde">Salvar</button>
	</div>

	<div class="sessao divFiltroContent">
		<h1 class="titulo1" id="filtroTitulo">Filtros </h1>		
		<div class="sessao" id="divFiltro" style="display: none;">
			<label>Dias da semana:</label>
			<select title="Basic example" id="diaSemana" multiple="multiple" name="example-basic" size="5">
				<option selected="selected" value="1">segunda-feira</option>
				<option selected="selected" value="2">terça-feira</option>
				<option selected="selected" value="3">quarta-feira</option>
				<option selected="selected" value="4">quinta-feira</option>	
				<option selected="selected" value="5">sexta-feira</option>
				<option selected="selected" value="6">sábado</option>			
			</select>
			<label>Professor:</label>
			<select title="Basic example" id="professor" multiple="multiple" name="example-basic" size="5">
				<?php
				foreach($dadosProfessor as $dado){	
					?>
					<option selected="selected" value="<?=$dado->id_professor ?>"><?=$dado->nome_professor ?></option>

					<?php } ?>								
				</select>
				<label>Dificuldade:</label>
				<select title="Basic example" id="dificuldade" multiple="multiple" name="example-basic" size="5">
					<option selected="selected" value="F">Fácil</option>
					<option selected="selected" value="M">Médio</option>
					<option selected="selected" value="D">Difícil</option>								
				</select>

			</div>
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
						<span class="tituloSemana">sábado</span>
					</div>
					
					<?php 				
					foreach($dados as $dado){						
						if($dado->semestre == "1"){

							?>
							<div class="disciplina">
								<ul class="ulLista ulLista<?=$dado->dia_semana?> ulProfessor<?=$dado->id_professor?> ulDificuldade<?=$dado->nivel_dificuldade?>" >
									<li class="divDisciplina" situacao="<?=$dado->situacao?>" idTurmaDisciplina="<?=$dado->id_turma_disciplina?>" idAluno="<?=$dado->id_aluno?>">
										<h1><?=$dado->nome_disciplina."<br>".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
										<span class="avaliarDisciplina" onclick="avaliarDisciplina(<?=$dado->id_aluno?>,<?=$dado->id_disciplina?>,<?=$dado->id_turma_disciplina?>)"><span class="avaliarDisciplinaIco"></span></span>						
									</li>	
									<div class="progress" style="height: 10px;">
										<div  data-toggle="tooltip" data-placement="top" title="Dificuldade - Facil - 50%" class="progress-bar progress-bar-success" style="width: 50%">
											<span class="sr-only">50%</span>
										</div>	
										<div data-toggle="tooltip" data-placement="top" title="Dificuldade - Médio - 25%" class="progress-bar progress-bar-warning" style="width: 25%">
											<span class="sr-only">25%</span>
										</div>								
										<div data-toggle="tooltip" data-placement="top" title=" Dificuldade - Difícil - 25%" class="progress-bar progress-bar-danger" style="width: 25%">
											<span class="sr-only">25%</span>
										</div>
									</div>						
								</ul>
							</div>
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
						<span class="tituloSemana">sábado</span>
					</div>
					
					<?php
					foreach($dados as $dado){
						if($dado->semestre == "2"){
							?>
							<div class="disciplina">
								<ul class="ulLista ulLista<?=$dado->dia_semana?> ulProfessor<?=$dado->id_professor?> ulDificuldade<?=$dado->nivel_dificuldade?>" >
									<li class="divDisciplina" situacao="<?=$dado->situacao?>" idTurmaDisciplina="<?=$dado->id_turma_disciplina?>" idAluno="<?=$dado->id_aluno?>">
										<h1><?=$dado->nome_disciplina."<br>".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
										<span class="avaliarDisciplina" onclick="avaliarDisciplina(<?=$dado->id_aluno?>,<?=$dado->id_disciplina?>,<?=$dado->id_turma_disciplina?>)"><span class="avaliarDisciplinaIco"></span></span>						
									</li>
								</ul>
							</div>
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
						<span class="tituloSemana">sábado</span>
					</div>
					
					<?php
					foreach($dados as $dado){
						if($dado->semestre == "3"){
							?>
							<div class="disciplina">
								<ul class="ulLista ulLista<?=$dado->dia_semana?> ulProfessor<?=$dado->id_professor?> ulDificuldade<?=$dado->nivel_dificuldade?>">
									<li class="divDisciplina" situacao="<?=$dado->situacao?>" idTurmaDisciplina="<?=$dado->id_turma_disciplina?>" idAluno="<?=$dado->id_aluno?>">
										<h1><?=$dado->nome_disciplina."<br>".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
										<span class="avaliarDisciplina" onclick="avaliarDisciplina(<?=$dado->id_aluno?>,<?=$dado->id_disciplina?>,<?=$dado->id_turma_disciplina?>)"><span class="avaliarDisciplinaIco"></span></span>						
									</li>
								</ul>
							</div>
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
						<span class="tituloSemana">sábado</span>
					</div>
					
					<?php
					foreach($dados as $dado){
						if($dado->semestre == "4"){
							?>
							<div class="disciplina">
								<ul class="ulLista ulLista<?=$dado->dia_semana?> ulProfessor<?=$dado->id_professor?> ulDificuldade<?=$dado->nivel_dificuldade?>">
									<li class="divDisciplina" situacao="<?=$dado->situacao?>" idTurmaDisciplina="<?=$dado->id_turma_disciplina?>" idAluno="<?=$dado->id_aluno?>">
										<h1><?=$dado->nome_disciplina."<br>".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
										<span class="avaliarDisciplina" onclick="avaliarDisciplina(<?=$dado->id_aluno?>,<?=$dado->id_disciplina?>,<?=$dado->id_turma_disciplina?>)"><span class="avaliarDisciplinaIco"></span></span>						
									</li>
								</ul>
							</div>
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
						<span class="tituloSemana">sábado</span>
					</div>
					
					<?php
					foreach($dados as $dado){
						if($dado->semestre == "5"){
							?>
							<div class="disciplina">
								<ul class="ulLista ulLista<?=$dado->dia_semana?> ulProfessor<?=$dado->id_professor?> ulDificuldade<?=$dado->nivel_dificuldade?>">
									<li class="divDisciplina" situacao="<?=$dado->situacao?>" idTurmaDisciplina="<?=$dado->id_turma_disciplina?>" idAluno="<?=$dado->id_aluno?>">
										<h1><?=$dado->nome_disciplina."<br>".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
										<span class="avaliarDisciplina" onclick="avaliarDisciplina(<?=$dado->id_aluno?>,<?=$dado->id_disciplina?>,<?=$dado->id_turma_disciplina?>)"><span class="avaliarDisciplinaIco"></span></span>						
									</li>
								</ul>
							</div>
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
						<span class="tituloSemana">sábado</span>
					</div>
					
					<?php
					foreach($dados as $dado){
						if($dado->semestre == "6"){
							?>
							<div class="disciplina">
								<ul class="ulLista ulLista<?=$dado->dia_semana?> ulProfessor<?=$dado->id_professor?> ulDificuldade<?=$dado->nivel_dificuldade?>">
									<li class="divDisciplina" situacao="<?=$dado->situacao?>" idTurmaDisciplina="<?=$dado->id_turma_disciplina?>" idAluno="<?=$dado->id_aluno?>">
										<h1><?=$dado->nome_disciplina."<br>".$dado->nome?></h1>
										<span class="infoDisciplina" onclick="detalhesDisciplina(<?=$dado->id_disciplina?>);"><span class="infoDisciplinaIco"></span></span>						
										<span class="avaliarDisciplina" onclick="avaliarDisciplina(<?=$dado->id_aluno?>,<?=$dado->id_disciplina?>,<?=$dado->id_turma_disciplina?>)"><span class="avaliarDisciplinaIco"></span></span>						
									</li>
								</ul>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		
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
			
			<div class="modal fade" id="modalAvaliarDisciplina">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<div id="conteudoAvaliacao"></div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

