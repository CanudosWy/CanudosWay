
$(document).ready(function() {


	$("select").multiselect();

	$('#filtroTitulo').on("click", function() {

		$('#divFiltro').fadeToggle("slow", "linear");

	});
	

	$("#accordion" ).accordion({heightStyle: "content"});

	$(".ulLista1,.dropSegunda").sortable({
		connectWith: ".dropSegunda,.ulLista1",
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
			if (list.children().length > 1) {
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
			if (list.children().length > 1) {
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
			if (list.children().length > 1) {
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
			if (list.children().length > 1) {
				alert("Selecione apenas uma cadeira!");
						// enviar o item para o lugar que estava
						$(ui.sender).sortable('cancel');
					}
					
				}
			});

	$(".ulListaSegunda,.dropSegunda").disableSelection();

	Filtros();
	
});

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

function Filtros(){

	$("input[name='multiselect_diaSemana']").click(function(){ 

		$("input[name='multiselect_diaSemana']").each(function(index, element){
			console.log(element);
		});

	});
}
