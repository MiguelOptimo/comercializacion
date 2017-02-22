jQuery( document ).ready(function( $ ) {
	console.log('layout/Rcp/index.js');
	$("body").on("click","#btn_fac", function (){
		_option_controller_ = $( this ).data('controller');
		if(_datatable_row_id_ == '' || _datatable_row_id_ == 0){
			return true;
		}
		MessageBox("Se requiere un enlace con API de su proveedor de facturas. <hr>Ejemplo:<br> https://esquemas.enlacefiscal.com/API/v5_0.xsd?id_fol=00000");
	} );

});
