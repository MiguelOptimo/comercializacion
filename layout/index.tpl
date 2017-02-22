{extends file='layout/blank.tpl'}

{block name=content}

		<div class="ui-layout-center">

	        {block name=content_datatable}


				{assign var="view_tbl"     value=$data.TableName}
				{assign var="view_ide"     value=""}
				{assign var="view_order"   value=""}
				{assign var="primaryKey"   value=_primaryKey_}
				
	          {if isset($view_item.fk_order)}
	            {assign var="view_order"   value=$view_item.fk_order}
	          {/if}

	          {include file="edit.form.data-table.tpl"}

	        {/block}

		</div>

		<div class="ui-layout-east ui-layout-pane ui-layout-pane-east">

		</div><!-- /.ui-layout-east -->


{/block}

{block name=footer_content}
	
	<script type="text/javascript">
		var applayout;
		jQuery(document).ready(function($) {
				/*
				$("body").layout();
				$("body > .ui-layout-container").layout();
				*/

				/*
				applayout = $("body").layout({
					 east__size          : Math.floor(screen.availWidth * .25) // 50% screen width
					,resizable           : true	// when open, pane can be resized 
					,north__spacing_open : 0
					,showDebugMessages   : true
				});
				applayout.options.east.resizable = true;
				*/

				//$('#ribbon').ribbon();
				/*
				$('#enable-btn').click(function() {
					$('#del-table-btn').enable();
					$('#del-page-btn').enable();
					$('#save-btn').enable();
					$('#other-btn-2').enable();
					
					$('#enable-btn').hide();
					$('#disable-btn').show();	
				});
				$('#disable-btn').click(function() {
					$('#del-table-btn').disable();
					$('#del-page-btn').disable();
					$('#save-btn').disable();
					$('#other-btn-2').disable();
					
					$('#disable-btn').hide();
					$('#enable-btn').show();	
				});
				
				$('.ribbon-button').click(function() {
					if (this.isEnabled()) {
						alert($(this).attr('id') + ' clicked');
					}
				});
				*/
			//$.material.init();

			/**
			 *	DataGrid DEMO
			 * */
			/*
            var url = "{SITE_URL}/layout/assets/js/jqwidgets/demos/sampledata/products.xml";
            // prepare the data
            var source =
            {
                datatype: "xml",
                datafields: [
                    { name: 'ProductName', type: 'string' },
                    { name: 'QuantityPerUnit', type: 'int' },
                    { name: 'UnitPrice', type: 'float' },
                    { name: 'UnitsInStock', type: 'float' },
                    { name: 'Discontinued', type: 'bool' }
                ],
                root: "Products",
                record: "Product",
                id: 'ProductID',
                url: url
            };
            var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
                if (value < 20) {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #ff0000;">' + value + '</span>';
                }
                else {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #008000;">' + value + '</span>';
                }
            }
            var dataAdapter = new $.jqx.dataAdapter(source, {
                downloadComplete: function (data, status, xhr) { },
                loadComplete: function (data) { },
                loadError: function (xhr, status, error) { }
            });

            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                width: 850,
                source: dataAdapter,                
                pageable: true,
                autoheight: true,
                width: '100%',
                sortable: true,
                altrows: true,
                enabletooltips: true,
                editable: true,
                selectionmode: 'multiplecellsadvanced',
                columns: [
                  { text: 'Product Name', columngroup: 'ProductDetails', datafield: 'ProductName', width: 250 },
                  { text: 'Quantity per Unit', columngroup: 'ProductDetails', datafield: 'QuantityPerUnit', cellsalign: 'right', align: 'right', width: 200 },
                  { text: 'Unit Price', columngroup: 'ProductDetails', datafield: 'UnitPrice', align: 'right', cellsalign: 'right', cellsformat: 'c2', width: 200 },
                  { text: 'Units In Stock', datafield: 'UnitsInStock', cellsalign: 'right', cellsrenderer: cellsrenderer, width: 100 },
                  { text: 'Discontinued', columntype: 'checkbox', datafield: 'Discontinued' }
                ],
                columngroups: [
                    { text: 'Product Details', align: 'center', name: 'ProductDetails' }
                ]
            });
            */

		});
	</script>


{/block}