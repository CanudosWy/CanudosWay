
function avaliarDisciplina($id){

	var request = $.ajax({
		url: $('#getDetalhesDiciplina').attr("action"),
		type: "GET",
		data: { id : $id },
		dataType: "JSON"
	});
	request.done(function( msg ) {
		$.each(msg, function(index, values) {
			if(index == 0){
				$('.modal-title').html('Avaliando disciplina: '+values.nome_disciplina);	
				
			}
		});
		$('#dadosDisciplina').html(html);

	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
		
	$('#conteudoAvaliacao').load("http://localhost:8070/CanudosWay/home/votacao");
	$('#modalAvaliarDisciplina').modal();

}