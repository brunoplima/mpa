$(document).ready(function(){
	setInterval(function(){resize()},10);
	$('form input[type=text], input[type=password], input[type=radio], select, textarea').on('change invalid', function() {
		var textfield = $(this).get(0);
		textfield.setCustomValidity('');
		if (textfield.validity.valueMissing) {
			textfield.setCustomValidity('Preencha o campo obrigatório');  
		}
	});
});

function resize(){
	$("#layoutContent").height($('body').height()*0.5);
}