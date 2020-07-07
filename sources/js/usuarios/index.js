$(document).ready(function(){
	var url = $("#url").val() + "index.php/usuarios/datatable/";
	var table=$('#datatable').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
		"url": url,
    	"type": "POST"
		},
		"columns": [
			{ "data": "usuario_id" },
			{ "data": "usuario" },
			{ "data": "tipo_usuario" },
			{ "data": "status_usuariu" },
			{ "data": "nombre_institucion" },
			{ "defaultContent": '<div class="btn-group" role="group"><button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" id="editar" href="javascript:void(0);"><span class="mdi mdi-square-edit-outline"> Editar</span></a><a class="dropdown-item" id="eliminar" href="javascript:void(0);"><span class="mdi mdi-delete"> Eliminar</span></a></div></div>'}
		],
		"columnDefs": [
      {
          "targets": [0],
          "visible": false,
          "searchable": false
      }
    ],
    "scrollX":        true,
    "scrollY":        "350px",
    //dom: 'Bfrtip',
    //"dom": '<"top"i>rt<"bottom"flp><"clear">',
   	//dom: 'lftipr',
   	dom: 'lB<"top"f>rt<"bottom"p><"clear">',
    buttons: [
      //'colvis',
      //'copy',
      'excel',
      'csv',
      'pdf',
      {
        extend: 'colvis',
        text: 'Columnas visibles',
        columns: ':gt(0)'
      }
      // {
      // 	extend: 'print',
      //   text: 'Imprimir'
      // },
      // {
      //   extend: 'colvis',
      //   text: 'Columnas visibles',
      //   columns: ':gt(0)'
      // },
      // {
      //   extend: 'colvisRestore',
      //   text: 'Restaurar columnas',
      //   columns: ':gt(0)'
      // }
    ],
		"oLanguage": {
        "sProcessing":     "Procesando...",
		    "sLengthMenu": 'Mostrar <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">All</option>'+
		        '</select> registros',    
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtrar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por favor espere - cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
        }
	});

	$('#datatable tbody').on('click','#editar', function () {
      var data = table.row( $(this).parents('tr') ).data();
      alert("Editar: "+ data["usuario_id"] );
  });

  $('#datatable tbody').on('click','#eliminar', function () {
      var data = table.row( $(this).parents('tr') ).data();
      alert("Eliminar: "+ data["usuario_id"] );
  });

	// $('#datatable tfoot th').each( function () {
 	//    var title = $(this).text();
 	//    $(this).html( '<input type="text" placeholder="'+title+'" />' );
 	//  });

 //  table.columns().every( function () {
 //    var that = this;
 //    $('input',this.footer()).on('keyup change',function(){
 //      if(that.search()!==this.value){
 //        that
 //        	.search(this.value)
 //        	.draw();
 //      }
 //    });
 //  });

});