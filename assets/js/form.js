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

	$("#wordcloud").html('');
	var word_list = new Array();

	request.done(function( msg ) {
		var html = "";

		$.each(msg, function(index, values) {
			if(index == 0){
				$('.modal-title').html(values.nome_disciplina);	
				html += '<p><strong> '+values.caracterizacao+'</strong></p>';
				html += '<p>'+values.competencia_essencial+'</p>';
				html += '<p><strong>Pré requisito:</strong> '+values.pre_requisito+'</p>';
				html += '<p><strong>Semestre:</strong> '+values.semestre+'º Semestre</p>';
				html += '<p><strong>EAD:</strong> '+(values.ead == '1' ? 'Sim' : 'Não')+'</p>';
				html += '<span class="floatLeft"><p><strong>Professor:</strong> '+values.professor+'</p><p id="professor" class="iconeInfo"></p></span>';
				html += '<div id="divCurriculo" style="display: none;"><p>'+values.curriculo+'</p></div>';
				html += '<p><strong>Horas:</strong> '+values.horas+'</p>';
				html += '<p><strong>Hashtags:</strong></p>';
			}
			
			word_list.push({text: values.hashtag, weight: values.qtdehashtag});
		});
		$('#dadosDisciplina').html(html);

	});

request.fail(function( jqXHR, textStatus ) {
	alert( "Request failed: " + textStatus );
});
$('#modalDisciplina').unbind();
$('#modalDisciplina').modal( );

$('#modalDisciplina').on('shown.bs.modal', function (e) {

	$('#professor').on("click", function() {

		$('#divCurriculo').fadeToggle("slow", "linear");

	});
	nuvemHashTag(word_list);
});

}

function nuvemHashTag(word_list){	
	
	$(function() {
		$("#wordcloud").jQCloud(word_list, {
			width: 500,
			height: 100
		});
	});
}
