$( document ).ready(function() {

	$("#containerVotacao").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		autoFocus: true,
		labels: {
			cancel: "Cancelar",
			current: "Passo atual",
			finish: "Finalizar",
			next: "Próximo",
			previous: "Anterior",
			loading: "Carregando ..."
		},
		onFinished: function (event, currentIndex)
		{
			//$('#formVotaocao').submit();
			var request = $.ajax({
				url: $('#formVotaocao').attr("action"),
				type: "POST",
				data: $('#formVotaocao').serialize(),
				dataType: "JSON"
			});
			request.done(function( msg ) {
				$('#conteudoAvaliacao').empty();
				$('#conteudoAvaliacao').html("<h2 class='votacaoSalva'>"+msg+"</h2>");
			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Erro ao salvar votação, tente novamente");
			});
		},
		titleTemplate: '<div><span class="number">#index#</span><span class="linha"></span></div>',
	});
});