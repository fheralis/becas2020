
$(document).ready(function(){
	
	$("#btnPersonales").click(function(event) {
		$("#tab-personales").removeClass('active');
		$("#tab-escolares").removeClass('disabled');
		$("#tab-escolares").addClass('active');
		$("#personales").removeClass('active');
		$("#personales").removeClass('show');
		$("#escolares").addClass('active');
		$("#escolares").addClass('show');
	});

	$("#btnEscolares").click(function(event) {
		$("#tab-escolares").removeClass('active');
		$("#tab-estudio").removeClass('disabled');
		$("#tab-estudio").addClass('active');
		$("#escolares").removeClass('active');
		$("#escolares").removeClass('show');
		$("#estudio").addClass('active');
		$("#estudio").addClass('show');
	});

});




