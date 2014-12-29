$(function(){
	doResize();
	var resizeTimer = null;
	$(window).bind('resize', function() {
		if (resizeTimer) clearTimeout(resizeTimer);
		resizeTimer = setTimeout(doResize, 100);
	});


	$(".table_result .icon_actions").find("[class$=_delete]").attr('title', 'Excluir').addClass('icon_action_delete');
	$(".table_result .icon_actions").find("[class$=_view]").attr('title', 'Visualizar').addClass('icon_action_view');

	var baseUrlIdx = getBaseURLIndex();
	$('.table_result .icon_actions div').click(function(){
		var value      = $(this).find('input[type="hidden"]').attr('value');
		var className  = ($(this).get(0).className).split(" ");
		className = className[0];

		switch(className){
			case 'icon_action_prova_view':
				window.location = baseUrlIdx + 'prova/visualizar/' + value;
				break;
			case 'icon_action_prova_get_statistics':
				window.location = baseUrlIdx + 'prova/estatisticas/' + value;
				break;
			default:
				swal("Ação não definida", className, "warning")
				break;
		}
	});

	$(".other_resps").click(function(){
		var value = $(this).attr('value');
		window.location = baseUrlIdx + 'prova/respostas/' + value;
	});

});

function doResize() {
	$("#pageBody").css("height", window.innerHeight - 65);
};

function getBaseURL(){
	var wl = String(window.location.pathname);
	return window.location.origin + wl.substr(0, wl.indexOf('index.php'));
}

function getBaseURLIndex(){
	return getBaseURL() + 'index.php/';
}