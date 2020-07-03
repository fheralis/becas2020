var testPersonales=false;
var testAcademico=false;
var testSocioEconomicos=false;


$(document).ready(function(){
	
});

/*habilita el comprobante para el solicitante*/
function irHome(){
	window.location.href = $("#base_url").val()+"index.php/solicitudes/detalles";
}

/*inhabilita y habilita los tabs*/
function enabledTabs(tab1,tab2,from){
	$("#tab-"+tab1).removeClass('active');
	$("#tab-"+tab2).removeClass('disabled');
	$("#tab-"+tab2).addClass('active');
	$("#"+tab1).removeClass('active');
	$("#"+tab1).removeClass('show');
	$("#"+tab2).addClass('active');
	$("#"+tab2).addClass('show');
	$(from+" > fieldset").prop('disabled',true);
	window.scrollTo(0,0);
}




