
$(document).ready(function(){
	
	$('#frmEstudio').submit(function(event) {
		//alert("1");

		str = $(this).serialize();
		alert(str);

		return false;
	});

	

});

function verVal(val){
	var select = $(val).find("option:selected");
	var option = select.data("libre");

	var id=$(val).attr("id");//+"-"+$(val).val();

	if(option=='S'){
		$("#div"+id).show();
	}else{
		$("#div"+id).hide();
	}
}



