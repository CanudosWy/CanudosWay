
$(document).ready(function() {

	
	$("#diaSemana").multiselect({
		checkAll: function(){
			for(i = 1; i <= 6; i++ ){
				$('#accordion').find('.ulLista' + i).show();
			}
		},
		uncheckAll: function(){
			for(i = 1; i <= 6; i++ ){
				$('#accordion').find('.ulLista' + i).hide();
			}
		}
	});

	$("#professor").multiselect({
		checkAll: function(){	
			$("input[name='multiselect_professor']").each( function(){

				$('#accordion').find('.ulProfessor' + $(this).val()).show();

			});
		},
		uncheckAll: function(){
			$("input[name='multiselect_professor']").each( function(){

				$('#accordion').find('.ulProfessor' + $(this).val()).hide();

			});
		}
	});

	$("#dificuldade").multiselect({
		checkAll: function(){
			alert('All Multiselect items selected!');
		},
		uncheckAll: function(){
			alert('All Multiselect items unselected!');
		}
	});

	$('#filtroTitulo').on("click", function() {

		$('#divFiltro').fadeToggle("slow", "linear");

	});
	

	$("#accordion" ).accordion({heightStyle: "content"});

	$(".ulLista1,.dropSegunda").sortable({
		connectWith: ".dropSegunda,.ulLista1",
		dropOnEmpty: true,
		receive: function(event, ui) {
			var list = $(this);				
			
			if(list.children().attr('situacao') == 'C'){
				alert("Esta cadeira está com situação 'Cursando'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if(list.children().attr('situacao') == 'A'){
						alert("Esta cadeira já foi cursada e está com situação 'Aprovado'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if (list.children().length > 1) {
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
			
			if(list.children().attr('situacao') == 'C'){
				alert("Esta cadeira está com situação 'Cursando'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if(list.children().attr('situacao') == 'A'){
						alert("Esta cadeira já foi cursada e está com situação 'Aprovado'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if (list.children().length > 1) {
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
			
			if(list.children().attr('situacao') == 'C'){
				alert("Esta cadeira está com situação 'Cursando'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if(list.children().attr('situacao') == 'A'){
						alert("Esta cadeira já foi cursada e está com situação 'Aprovado'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if (list.children().length > 1) {
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
			
			if(list.children().attr('situacao') == 'C'){
				alert("Esta cadeira está com situação 'Cursando'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if(list.children().attr('situacao') == 'A'){
						alert("Esta cadeira já foi cursada e está com situação 'Aprovado'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});
	$(".ulLista6,.dropSabado").sortable({
		connectWith: ".dropSabado,.ulLista6",
		dropOnEmpty: true,
		receive: function(event, ui) {
			var list = $(this);
			
			if(list.children().attr('situacao') == 'C'){
				alert("Esta cadeira está com situação 'Cursando'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if(list.children().attr('situacao') == 'A'){
						alert("Esta cadeira já foi cursada e está com situação 'Aprovado'!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}else if (list.children().length > 1) {
						alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});

	$(".ulListaSegunda,.dropSegunda").disableSelection();

	Filtros();
	Buttons();
	
});

function avaliarDisciplina(aluno,disciplina,turma){

	var request = $.ajax({
		url: $('#getDetalhesDiciplina').attr("action"),
		type: "GET",
		data: { id : disciplina },
		dataType: "JSON"
	});
	request.done(function( msg ) {
		$.each(msg, function(index, values) {
			if(index == 0){
				$('.modal-title').html('Avaliando disciplina: '+values.nome_disciplina);	
				
			}
		});		

	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});

	$('#conteudoAvaliacao').load("http://localhost/CanudosWay/home/votacao/"+aluno+"/"+disciplina+"/"+turma);
	$('#modalAvaliarDisciplina').modal();

}

function Filtros(){

	$("input[name='multiselect_diaSemana']").click(function(){ 
		
		if($(this).is(':checked') == true){			
			$('#accordion').find('.ulLista' + $(this).val()).show();
		}else{
			$('#accordion').find('.ulLista' + $(this).val()).hide();
		}

	});	

	$("input[name='multiselect_professor']").click(function(){ 

		if($(this).is(':checked') == true){			
			$('#accordion').find('.ulProfessor' + $(this).val()).show();
		}else{
			$('#accordion').find('.ulProfessor' + $(this).val()).hide();
		}

	});
}

function Buttons(){

	$('#btnSalvarDisciplinas').click(function() {

		if($("#divDisciplinaSalvar .divDisciplinaHolder .divDisciplina").length > 0){
			var $disciplinas = new Array();
			$("#divDisciplinaSalvar .divDisciplinaHolder .divDisciplina").each(function( index ) {
				$disciplinas.push({
					'id_aluno' : $(this).attr('idAluno'),
					'id_turma_disciplina' : $(this).attr('idTurmaDisciplina'),
					'situacao' : $(this).attr('situacao')
				});					

			});

			var request = $.ajax({
				url: $('#salvarDisciplinas').val(),
				type: "POST",
				data: {'data' : JSON.stringify($disciplinas)},
				dataType: "JSON"
			});
			request.done(function( msg ) {			
				alert(msg);
			});

			request.fail(function( jqXHR, textStatus ) {
				alert( "Erro ao salvar resgistro, tente novamente!");
			});
		}else{
			alert("Informe pelo menos uma disciplina!");	
		}

	});
}
