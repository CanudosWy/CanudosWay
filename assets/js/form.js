$( document ).ready(function() {

	form();
	buttons();
});

function form(){
	$( "#sortable" ).sortable();
	$( "#sortable" ).disableSelection();

	$( "#accordion" ).accordion();
}

function buttons(){

	
}

function detalhesDisciplina(id){

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
				html += '<span class="floatLeft"><p>Professor: '+values.professor+'</p><p id="professor" class="glyphicon glyphicon-info-sign"></p></span>';
				html += '<div id="divCurriculo" style="display: none;"><p>'+values.curriculo+'</p></div>';
				html += '<p>Horas: '+values.horas+'</p>';
				html += '<p>Hashtags:</p>';
			}
			html += '<p> '+values.hashtag+'</p>';
		});
		$('#dadosDisciplina').html(html);

	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});

	$('#modalDisciplina').modal();
	
	setTimeout(function(){

		$('#professor').on("click", function() {

			$('#divCurriculo').toggle();
			
		});
        nuvemHashTag();
	}, 2000);

}

function nuvemHashTag(){

	 var word_list = new Array(
        {text: "Lorem", weight: 13, link: "https://github.com/lucaong/jQCloud"},
        {text: "Ipsum", weight: 10.5, link: "http://jquery.com/"},
        {text: "Dolor", weight: 9.4},
        {text: "Sit", weight: 8},
        {text: "Amet", weight: 6.2},
        {text: "Consectetur", weight: 5},
        {text: "Adipiscing", weight: 5},
        {text: "Elit", weight: 5},
        {text: "Nam et", weight: 5},
        {text: "Leo", weight: 4},
        {text: "Sapien", weight: 4, link: "http://www.lucaongaro.eu/"},
        {text: "Pellentesque", weight: 3},
        {text: "habitant", weight: 3},
        {text: "morbi", weight: 3},
        {text: "tristisque", weight: 3},
        {text: "senectus", weight: 3},
        {text: "et netus", weight: 3},
        {text: "et malesuada", weight: 3},
        {text: "fames", weight: 2},
        {text: "ac turpis", weight: 2},
        {text: "egestas", weight: 2},
        {text: "Aenean", weight: 2},
        {text: "vestibulum", weight: 2},
        {text: "elit", weight: 2},
        {text: "sit amet", weight: 2},
        {text: "metus", weight: 2},
        {text: "adipiscing", weight: 2},
        {text: "ut ultrices", weight: 2},
        {text: "justo", weight: 1},
        {text: "dictum", weight: 1},
        {text: "Ut et leo", weight: 1},
        {text: "metus", weight: 1},
        {text: "at molestie", weight: 1},
        {text: "purus", weight: 1},
        {text: "Curabitur", weight: 1},
        {text: "diam", weight: 1},
        {text: "dui", weight: 1},
        {text: "ullamcorper", weight: 1},
        {text: "id vuluptate ut", weight: 1},
        {text: "mattis", weight: 1},
        {text: "et nulla", weight: 1},
        {text: "Sed", weight: 1}
      );

 	$(function() {
        $("#wordcloud").jQCloud(word_list, {
		  width: 500,
		  height: 200
		});
      });
}
