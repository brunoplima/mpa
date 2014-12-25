$(function(){

	$(".table_result .icon_actions").find("[class$=_delete]").attr('title', 'Excluir').addClass('icon_action_delete');
	$(".table_result .icon_actions").find("[class$=_view]").attr('title', 'Visualizar').addClass('icon_action_view');

	$('.table_result .icon_actions div').click(function(){
		var value     = $(this).find('input[type="hidden"]').attr('value');
		var className = ($(this).get(0).className).split(" ");
		className = className[0];
		// var wl = getWindowLocation();

		switch(className){
			case 'icon_action_prova_view':
				window.location = '../prova/visualizar/' + value;
				break;
			case 'icon_action_prova_get_statistics':
				window.location = '../prova/estatisticas/' + value;
				break;
			default:
				swal("Ação não definida", className, "warning")
				break;
		}
	});

});

// function getWindowLocation(){
// 	var wl = String(window.location).replace("http://", "").replace("https://", "").replace("http://www", "").replace("https://www", "");
// 	return wl.substr(0, wl.indexOf('index.php')) + 'index.php';
// }