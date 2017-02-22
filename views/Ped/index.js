jQuery( document ).ready(function( $ ) {
	console.log('layout/Ven/index.js');
	$("body").on("click","#btn_impr_oc", function (){
		_option_controller_ = $( this ).data('controller');
		if(_datatable_row_id_ == '' || _datatable_row_id_ == 0){
			MessageBox("Selecciona una opci&oacute;n.");
			return true;
		}
		var url = _site_url +"/Ped/Print_oc/"+md5(_datatable_row_id_);
		MessageBox({ url: url });
	} );
});
