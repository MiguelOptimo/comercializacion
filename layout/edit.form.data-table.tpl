{assign var="_view_model"      value=GetModel($view_tbl)}

{if isset($WithToolbar)}
  <div id="ribbon_{$view_tbl}" class="ribbon ribbon-minimal">
    <div id="ribbon-tab" class="ribbon-tab">
      <div class="ribbon-section">

        <div class="ribbon-button ribbon-button-wide action-button data-table-add"
          id="add-page-btn-{$view_tbl}"   
          data-action="data-table-add" 
          data-table="{$view_tbl}" 
          data-id="{$primaryKey}"   
          >
          <img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/new-page.png" />
          <span class="button-title">Nuevo</span>
        </div>

        <div class="ribbon-button ribbon-button-wide action-button data-table-edit" 
          id="edit-page-btn-{$view_tbl}" 
          data-action="data-table-edit" 
          data-table="{$view_tbl}" 
          data-id="{$primaryKey}" 
          >
          <img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/edit-page.png" />
          <span class="button-title">Editar</span>
        </div>

      </div>

      <div class="ribbon-section-sep"></div>

      <div class="ribbon-section">
      
        <div class="ribbon-button ribbon-button-wide action-button data-table-del"
          id="del-page-btn-{$view_tbl}" 
          data-action="data-table-del"  
          data-table="{$view_tbl}" 
          data-id="{$primaryKey}"   
         >
          <img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/delete-page.png" />
          <span class="button-title">Eliminar</span>
        </div>

      </div>

    </div>

  </div><!-- ./ribbon -->
{/if}

<div id="{$view_tbl}_jqxWidget" class="jqxgrid_container">
  <div id="jqxLoader"></div>
  <div id="{$view_tbl}_jqxToolBar"></div>
  <div 
    id="{$view_tbl}_jqxgrid" 
    class="{$view_tbl}_jqxgrid jqxgrid" 
    data-table="{$view_tbl}" 
    data-controller="{ucfirst(strtolower($view_tbl))}"
    data-fk-tbl="{$view_tbl}"
    data-fk-ide="{$view_ide}"
    data-fk-value="{$primaryKey}"
  ></div>
</div>


{assign var="_json_columns" value="["}
{assign var="_datafields"   value="["}
{assign var="_row_index" value=0}
{assign var="_row_count" value=count($_view_model)}

{foreach key=_item_fieldname_ item=_item_field_  from=$_view_model }
  {* ----------------------------------------------------------------------------------------------------
     Contador del ciclo
     ---------------------------------------------------------------------------------------------------- *}
  {assign var="_row_index" value=$_row_index+1}

  {assign var="row_type"     value="text"}
  {assign var="row_label"    value=$_item_fieldname_}
  {assign var="row_visible"  value=true}
  {assign var="row_width"    value=""}
  {assign var="col_width"    value=150}

  {if isset($_item_field_.label)}
    {assign var="row_label"   value=$_item_field_.label}
  {/if}

  {assign var="row_label"   value=str_replace("'","&#039;",$row_label)}

  {if isset($_item_field_.type)}
    {assign var="row_type"    value=$_item_field_.type}
  {/if} 
  {if isset($_item_field_.visible)}
    {assign var="row_visible"    value=$_item_field_.visible}
  {/if}
  {if $row_type eq 'key' || $row_type eq 'pass' || $row_type eq 'linked' || $row_type eq 'select'}
    {assign var="row_visible"    value=false}
  {/if}

  {if isset($_item_field_.width)}
    {assign var="row_width"    value=$_item_field_.width}
  {/if}
  {if $_row_index eq 1}
    {assign var="col_width" value=50}
  {/if}

  {* ----------------------------------------------------------------------------------------------------
     Generar la cadena JSON para el item
     ---------------------------------------------------------------------------------------------------- *}
  {if $_row_index neq 1}
    {assign var="_json_columns" value="$_json_columns ,"}
    {assign var="_datafields" value="$_datafields , "}
  {/if}

  
  {assign var="_json_columns" value="$_json_columns \n { datafield:'$view_tbl.$_item_fieldname_', text:'$row_label', filtertype:'textbox',  adjust:false, minwidth: 150"}

  {assign var="_datafields" value="$_datafields { name:'$view_tbl.$_item_fieldname_' } "}
  
  {if $row_visible neq true }
    {assign var="_json_columns" value="$_json_columns  , hidden:true "}
  {/if}

  {assign var="_json_columns" value="$_json_columns  } "}

  {if $row_type eq 'select' }
    {if $_row_index neq 1}
      {assign var="_json_columns" value="$_json_columns ,"}
      {assign var="_datafields" value="$_datafields , "}
    {/if}
    {assign var="_json_columns" value="$_json_columns \n { datafield:'SELECT_$_item_fieldname_', text:'$row_label', filtertype:'textbox',  adjust:false, minwidth: 50 } "}
    {assign var="_datafields" value="$_datafields { name:'SELECT_$_item_fieldname_' } "}
  {/if}


  {if $row_type eq 'linked' }
    {assign var="_fk_des_"     value=$_item_field_.references.fk_des}
    {assign var="_fk_fields_"  value=array()}
    {assign var="_fk_label_"   value=$row_label}

    {if isset($_item_field_.references.fk_fields)}
      {assign var="_fk_fields_"    value=$_item_field_.references.fk_fields}
    {/if}

    {if isset($_item_field_.references.fk_label)}
      {assign var="_fk_label_"    value=$_item_field_.references.fk_label}
    {/if}

    {assign var="_fk_label_"   value=str_replace("'","&#039;",$_fk_label_)}
    {assign var="_fk_des_"   value=str_replace("'","&#039;",$_fk_des_)}

    {assign var="_json_columns" value="$_json_columns ,  \n { datafield:'$_fk_des_', text:'$_fk_label_', filtertype:'textbox',  adjust:true, minwidth: 150 } "}
    {assign var="_datafields" value="$_datafields ,  \n { name:'$_fk_des_' } "}

    {foreach key=_fk_fields_key_ item=_fk_fields_field_  from=$_fk_fields_ }
      {assign var="_row_index" value=$_row_index+1}
      {assign var="_fk_label_"     value=""}
      {if isset($_fk_fields_field_.label)}
        {assign var="_fk_label_"     value=$_fk_fields_field_.label}
      {else}
        {assign var="_fk_label_"     value=$_fk_fields_field_}
      {/if}
      {assign var="_fk_label_"   value=str_replace("'","&#039;",$_fk_label_)}

      {assign var="_json_columns" value="$_json_columns ,  \n { datafield:'$_fk_fields_key_', text:'$_fk_label_', filtertype:'textbox',  adjust:true, minwidth: 150 } "}

      {assign var="_datafields" value="$_datafields , \n { name:'$_fk_fields_key_' } "}

    {/foreach}


  {else}


  {/if}

{/foreach}
{assign var="_json_columns" value="$_json_columns ]"}

{assign var="_datafields" value="$_datafields ]"}

{* 
  - Generar los parametros adicionales para el filtrado de la tabla cuando esta se localiza dentro de una zona EDIT relacionada
 *}
{assign var="_params_original_" value="$_params_"}
{if $view_ide neq "" }
  {assign var="_params_" value=urlencode("$view_ide='$primaryKey'")}
  {assign var="_params_" value="filter=$_params_"}
{/if}
<script type="text/javascript">
  console.log("view_tbl={$view_tbl}");
  console.log("_primaryKey={$primaryKey}");
  console.log("filter={$_params_}");
  var _dataTable_ = { 
      columns    : {$_json_columns},
      fields     : {$_datafields},
      controller : '{ucfirst(strtolower($view_tbl))}',
      table      : '{$view_tbl}',
      filter     : '{$_params_}'
  };
  //dataTables.push( _dataTable_ );
  dataTables['{$view_tbl}'] = _dataTable_;
</script>

{assign var="_params_" value="$_params_original_"}