	<input type="hidden" name="primarykey" id="primarykey" value="{$_primaryKey}" />
	<input type="hidden" name="issingle" value="{$issingle}" />
	<input type="hidden" name="save_and_return" id="save_and_return" value="0" />
	{foreach key=fieldname item=row  from=$_fields }

		{* ----------------------------------------------------------------------------------------------------
		   Asignación de variables
		   ---------------------------------------------------------------------------------------------------- *}
		{assign var="label"            value=$fieldname}
		{assign var="alttext"          value=""}
		{assign var="type"             value="text"}
		{assign var="required"         value=""}
		{assign var="data_validation"  value=""}
		{assign var="editable"         value=true}
		{assign var="visible"          value=true}
		{assign var="default"          value=""}
		{assign var="FK_TBL"           value=""}
		{assign var="FK_IDE"           value=""}
		{assign var="FK_DES"           value=""}
		{assign var="before_html"      value=""}
		{assign var="after_html"       value=""}
		{assign var="THIS_PK"          value=""}

		
		{* ----------------------------------------------------------------------------------------------------
		   Valores predeterminados
		   ---------------------------------------------------------------------------------------------------- *}
		{if isset($row.label)}
			{assign var="label"   value=$row.label}
		{/if}
		{if isset($row.before_html)}
			{assign var="before_html"   value=$row.before_html}
		{/if}
		{if isset($row.after_html)}
			{assign var="after_html"   value=$row.after_html}
		{/if}
		{if isset($row.editable)}
			{assign var="editable"   value=$row.editable}
		{/if}
		{if isset($row.visible)}
			{assign var="visible"   value=$row.visible}
		{/if}
		{if isset($row.isnull)}
			{if $row.isnull eq false}
				{assign var="required"          value="required"}
				{assign var="data_validation"   value='validate[required]'}

			{/if}
		{/if}
		{if isset($row.alt)}
			{assign var="alttext" value=$row.alttext}
		{/if}
		{if isset($row.type)}
			{assign var="type"    value=$row.type}
		{/if}
		{if isset($_dataRow[$fieldname])}
			{assign var="default" value=$_dataRow[$fieldname]}
		{/if}

		{* ----------------------------------------------------------------------------------------------------
		   HTML Before
		   ---------------------------------------------------------------------------------------------------- *}
		{$before_html}


		<!-- 
		   - table={$view_tbl}
		   - primaryKey={$primaryKey}
		   - field={$fieldname}
		   - type={$type}
		   - value={$default}
		   - {if $issingle eq true}Edit in place{/if}
		   -->

		{* ----------------------------------------------------------------------------------------------------
		   Seleccionar el tipo de entrada de datos a dibujar
		   ----------------------------------------------------------------------------------------------------  *}
		{if $type eq 'key'}
			{assign var="primaryKey"  value=$_dataRow[$fieldname]}
			{assign var="THIS_PK"     value=$fieldname}
			{include file="edit.form.key.tpl"}
			{*
			{inputeditable table=$view_tbl primaryKey=$primaryKey field=$fieldname value=$default style="withLabel" readonly=true dataDefinition=$data.fields }
			*}

		{else}
			{inputeditable table=$view_tbl primaryKey=$primaryKey field=$fieldname value=$default style="withLabel" readonly=false dataDefinition=$data.fields type=$type }

			<!--
				<div class="ui form form-group col-md-6 {$fieldname} {$type}">
				<div class="form-group label-floating">
					<label class="control-label" for="{$fieldname}">{$label}</label>
				    <input 
				    	type="text" 
				    	name="{$fieldname}" 
				    	id="{$fieldname}" 
				    	class="form-control {$fieldname} {$required} {$type}" 
				    	data-validation-engine=="{$data_validation}"
				    	value="{$default}" 
				    	{if $editable eq false } readonly {/if}
			    	/>
				</div>
			-->
		{/if}

		{* ----------------------------------------------------------------------------------------------------
		   HTML After
		   ---------------------------------------------------------------------------------------------------- *}
		{$after_html}

	{/foreach}
