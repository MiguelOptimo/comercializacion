console.log("layout/app.toolbar.events.js");
var _option_controller_ = "";
var _option_table_      = "";
var _option_primaryKey_ = "";
var _option_action_     = "";
var _option_model_name_ = "";
var _option_table_id_   = "";
var _option_fk_ide_     = "";
var _option_fk_value_   = "";

jQuery( document ).ready(function( $ ) {
	$("body").on("click","#btn_save_and_return",function(){
		$("#save_and_return").val("1");
		$("#form_"+_controller_).submit();
	})

	$( "body" ).on( "click", ".ribbon-button", function() {

		_option_controller_ = $( this ).data('controller');
		_option_table_      = $( this ).data('table');
		_option_primaryKey_ = $( this ).data('id');
		_option_action_     = $( this ).data('action');
		_option_ignore_     = $( this ).data('ignore');

		_option_model_name_ = capitalizeFirstLetter(_option_table_);
		_option_table_id_   = "#"+_option_table_ + "_jqxgrid"; console.log(_option_table_id_);
    	_option_fk_ide_     = $( _option_table_id_ ).data('fk-ide');
    	_option_fk_value_   = $( _option_table_id_ ).data('fk-value');

		if(_option_ignore_ == "true"){
			console.log( _option_action_ + " : omitido.");
			return true;
		}

		switch( _option_action_ ){
			case 'btn-sel':
				//ShowDialogView(_option_controller_ , _option_primaryKey_);
				console.log("Mostrar");
				break;
			case 'btn-add':
				window.location.href = _site_url + "/"+_option_controller_+"/add";
				console.log("Insertar nuevo");
				break;

			case 'btn-upd':
				if(_datatable_row_id_ == '' || _datatable_row_id_ == 0){
					return true;
				}
				//console.log("Actualizar");
				window.location.href = _site_url +"/" + _option_controller_ + "/upd/"+md5(_datatable_row_id_);
				break;
			case 'btn-del':
				if(_datatable_row_id_ =='' || _datatable_row_id_ == 0){
					return true;
				}
				console.log("Eliminar");
		        BootstrapDialog.confirm({
		            title: 'Advertencia',
		            message: '&Eacute;sta operaci&oacute;n eliminar&aacute; de forma permanente el rengl&oacute;n seleccionado. ¿Desea continuar?',
		            type: BootstrapDialog.TYPE_WARNING, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
		            closable: true, // <-- Default value is false
		            draggable: true, // <-- Default value is false
		            btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
		            btnOKLabel: 'Eliminar informaci&oacute;n', // <-- Default value is 'OK',
		            btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
		            callback: function(result) {
		                // result will be true if button was click, while it will be false if users close the dialog directly.
		                if(result) {
							var url      = _site_url +"/" + _option_controller_ + "/del/"+md5(_datatable_row_id_)+"/?isJSON=true&timestamp=" + $.now();
							var jqxhr    = $.post( url, {} , function( r ){}, "json" );

							jqxhr.done(function(data) {
								console.log(data.status);
								if(data.status == "error"){
									console.log("------------------ ERROR ------------------");
									console.log(data);
								}
								else{
				                    var selectedrowindex = $("#"+_option_table_+"_jqxgrid").jqxGrid('getselectedrowindex');
				                    var rowscount = $("#"+_option_table_+"_jqxgrid").jqxGrid('getdatainformation').rowscount;
				                    var id = $("#"+_option_table_+"_jqxgrid").jqxGrid('getrowid', selectedrowindex);
				                    $("#"+_option_table_+"_jqxgrid").jqxGrid('deleterow', id);
								}
							})
							.fail(function(data) {
								console.log(data);
								//webix.message({ type:"error", text:"Servicio no disponible. Error Ajax." + data });
							});
		                }else {
		                    //MessageBox('Nope.');
		                }
		            }
		        });				
				/*
                var selectedrowindex = $("#"+_option_table_+"_jqxgrid").jqxGrid('getselectedrowindex');
                var rowscount = $("#"+_option_table_+"_jqxgrid").jqxGrid('getdatainformation').rowscount;
                var id = $("#"+_option_table_+"_jqxgrid").jqxGrid('getrowid', selectedrowindex);
                $("#"+_option_table_+"_jqxgrid").jqxGrid('deleterow', id);
				*/
				break;
			case 'btn-import':
				console.log("Importar");
				break;
			case 'btn-pdf':
    			/*
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');
                $("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'xml', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'csv', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'tsv', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'html', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'json', 'jqxGrid');
    			*/
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'pdf', 'jqxGrid');
				break;
			case "btn-export":
				console.log("Exportar");

    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');
    			/*
                $("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'xml', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'csv', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'tsv', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'html', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'json', 'jqxGrid');
    			$("#"+_option_table_+"_jqxgrid").jqxGrid('exportdata', 'pdf', 'jqxGrid');
    			*/
				break;
			/**
			 *	Opciones para Datatable
			 *	ToDo: Ejecutar funcion personalizada al cerrar el dialogo: Como "Reload table".
			 * */
			case "data-table-add":
		        console.log('data-table-add');
		        var url = _site_url + "/"+_option_model_name_+"/add/?issingle=true&_option_fk_ide_="+_option_fk_ide_+"&_option_fk_value_="+_option_fk_value_+"&timestamp=" + $.now() ;

	        	MessageBox( {title: "Agregar nuevo elemento", url : url } );
	        	
				break;
			case "data-table-edit":
		        console.log('data-table-edit');
		        if(_datatable_row_id_ =='' || _datatable_row_id_ == 0){
		          MessageBox("Debe seleccionar un elemento");
		          return true;
		        }
		        var url = _site_url + "/"+_option_model_name_+"/upd/"+md5(_datatable_row_id_)+"/?issingle=true&_option_fk_ide_="+_option_fk_ide_+"&_option_fk_value_="+_option_fk_value_+"&timestamp=" + $.now() ;

	        	MessageBox( {title: "Editar elemento", url : url } );
				break;
			case "data-table-del":
		        console.log('data-table-del');
	        	MessageBox( _option_action_ );

				break;
			case '':
				break;
			default:
				console.log( _option_action_ );
		}
	});
	
});
