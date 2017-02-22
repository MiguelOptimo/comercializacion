jQuery( document ).ready(function( $ ) {
  console.log('layout/edit.form.data-table.js');
  //  https://www.tinymce.com/docs/get-started/basic-setup/
  //  http://www.hermosaprogramacion.com/2015/10/servicio-web-restful-android-php-mysql-json/
  console.log(dataTables);
  $( ".jqxgrid" ).each(function( index ) {
    var view_tbl = $( this ).data('table'); //  Nombre de la tabla
    var view_ctl =  dataTables[view_tbl].controller; //  Controlador
    //dataTables[view_tbl]['jqxGrid'] = $( this );
    console.log('Configurando jqxGrid['+index+']: ' + view_tbl + ' | URL : ' + _site_url+"/"+view_ctl+"/source" + (dataTables[view_tbl].filter =="" ? "" : "?"+dataTables[view_tbl].filter));
    console.log( dataTables[view_tbl].fields );
    //  $("#jqxLoader").jqxLoader({  width: 100, height: 60, imagePosition: 'top', autoOpen: true });

    $( this ).jqxGrid({
        width              : '100%',
        //theme            : 'office2013',
        theme            : 'arctic',
        source             : new $.jqx.dataAdapter({
                              datatype: "json",
                              datafields: dataTables[view_tbl].fields,
                              url: _site_url+"/"+view_ctl+"/source" + (dataTables[view_tbl].filter=="" ? "" : "?"+dataTables[view_tbl].filter),//?{$_params_}
                              pager: function (pagenum, pagesize, oldpagenum) {
                                  // callback called when a page or page size is changed.
                                  console.log('callback called when a page or page size is changed.');
                              },
                            }),
        columnsresize      : true,
        sortable           : true,
        pageable           : true,
        autoheight         : true,
        altrows            : true,
        autoshowfiltericon : true,
        filterable         : true,
        showfilterrow      : true,
        //filtermode         : 'excel',
        groupable          : true,
        pagesize           : 15,
        pagesizeoptions    : ['15','30', '50' , '100', '250', '500' , '1000' , '1500','3000','5000','7000', '10000'],
        columns            : dataTables[view_tbl].columns,
        ready              : function () {
                              //console.log ($(this) );
                              var gridinfo = this.getdatainformation();
                              var rowscount = gridinfo.rowscount;

                              //$("."+dataTables[i].table+"_jqxgrid").jqxGrid( { pagesizeoptions: ['10', '20', '50', '100', rowscount] } );
                              //$("."+dataTables[i].table+"_jqxgrid").jqxGrid( { pagesize : 50 } );
                              this.localizestrings( localizationobj );
                              //this.autoresizecolumns();
                              console.log ( 'Carga de jqxGrid completa. ' + rowscount + ' filas recuperadas');
                              return true;
                              //alert(rowscount);
                            }
    });

  });

});

var click = new Date();
var lastClick = new Date();
var lastRow = -1;
$(".jqxgrid").on('rowclick', function (event) {
    click = new Date();
    if (click - lastClick < 300) {
        if (lastRow == event.args.rowindex) {
            /*
             *  Evento DbleClick sobre la fila
             */
            /*
            _option_controller_ = $( this ).data('controller');
            _option_table_      = $( this ).data('table');
            console.log("DblClick to rowindex:" + lastRow + ' | Field ID: '+_datatable_row_id_);
            console.log("ShowDialogView(" + _option_controller_ + " , " + _datatable_row_id_ + ");");
            ShowDialogView(_option_controller_ , _datatable_row_id_);
            */
            console.log("Evento DblClick no implementado.");
        }
    }
    lastClick = new Date();
    lastRow = event.args.rowindex;
});

// display selected row index.
$( ".jqxgrid" ).on('rowselect', function (event) {
    var rowindex = event.args.rowindex;
    var firstColumn = $( this ).jqxGrid('columns').records[0];
    var datarow = $( this ).jqxGrid('getrowdata', rowindex);
    _datatable_row_id_ = datarow[firstColumn.datafield];
    if( $("#btn-sel").length ){
      $("#btn-sel").enable();
    }
    if( $("#btn-upd").length ){
      $("#btn-upd").enable();
    }
    if( $("#btn-del").length ){
      $("#btn-del").enable();
    }
    console.log('Field ID: '+_datatable_row_id_);

    _option_controller_ = $( this ).data('controller');
    _option_table_      = $( this ).data('table');
    console.log("DblClick to rowindex:" + lastRow + ' | Field ID: '+_datatable_row_id_);
    console.log("ShowPaneLeft(" + _option_controller_ + " , " + _datatable_row_id_ + ");");

    if( typeof(applayout) !== "undefined"){
      console.log("applayout.show('east');");
      applayout.show('east');

      ShowPaneLeft({ 
          "controller": _option_controller_
        , "primaryKey" : _datatable_row_id_
      });
      
    }

});
// display unselected row index.
$( ".jqxgrid" ).on('rowunselect', function (event) {
    var _unselect_row_index_text = event.args.rowindex;
    console.log('_unselect_row_index_text:'+_unselect_row_index_text);
});

//  GoogleChrome Debug Tool
//  https://developers.google.com/web/tools/chrome-devtools/console/command-line-reference?utm_source=dcc&utm_medium=redirect&utm_campaign=2016q3#geteventlistenersobject
//  getEventListeners( $("#prj_jqxgrid") );
