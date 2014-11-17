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
			alert("Submitted!");
		},
		titleTemplate: '<div><span class="number">#index#</span><span class="linha"></span></div>',
	});
});