$( document ).ready(function() {

	form();

});

function form(){
	$( "#sortable" ).sortable();
	$( "#sortable" ).disableSelection();

	$( "#accordion" ).accordion();
}

function detalhesDisciplina(id){

	$('#getDetalhesDiciplina').click(function( event ) {

		event.preventDefault();

		var request = $.ajax({
			url: $('#getDetalhesDiciplina').attr("action"),
			type: "GET",
			data: { id : id },
			dataType: "JSON"
		});

		request.done(function( msg ) {
			var html = "";
			
			$.each(msg, function(index, values) {
				if(index == 0){
					html += '<p>Curso: '+values.curso+'</p>';
					html += '<p>Turma: '+values.turma+'</p>';
					html += '<p>Disciplina: '+values.nome_disciplina+'</p>';
					html += '<p>Caracteristicas: '+values.caracterizacao+'</p>';
					html += '<p>Pré requisito: '+values.pre_requisito+'</p>';
					html += '<p>Semestre: '+values.semestre+'º Semestre</p>';
					html += '<p>EAD: '+(values.ead == '1' ? 'Sim' : 'Não')+'</p>';
					html += '<p>Competencia essenciais: '+values.competencia_essencial+'</p>';
					html += '<p>Professor: '+values.professor+'</p>';
					html += '<p>Horas: '+values.horas+'</p>';
					html += '<p>Hashtags:</p>';
				}
				html += '<p> '+values.hashtag+'</p>';
			});
			$('.modal-body').html(html);

		});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});

	});
$('#modalDisciplina').modal();
}
