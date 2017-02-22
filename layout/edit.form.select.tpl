{assign var="_options"   value=$row.options}
{if $issingle eq true}
	<div class="project_detail {$fieldname} {$type}">
		<div class="title label-{$fieldname} {$required} {$type}">{$label}</div>
		{assign var="_option_options" value=""}
		{assign var="_option_label_default" value=""}
		{foreach key=optionvalue item=row  from=$_options }
			{assign var="_option_label" value=""}
			{if isset($row.label)}
				{assign var="_option_label"   value=$row.label}
			{else}
				{assign var="_option_label"   value=$row}
			{/if}

			{if $_option_options neq ""}
				{assign var="_option_options" value="$_option_options , "}
			{/if}
			{assign var="_option_options" value="$_option_options { value: '$optionvalue', text: '$_option_label' } "}

			{if $optionvalue eq $default}
				{assign var="_option_label_default" value="$_option_label"}
			{/if}
		{/foreach}
		<div 
			id          = "{$fieldname}" 
			class       = "form-control {if $editable eq false } input_no_editable {else} input_editable {/if} {$fieldname} {$fieldname} {$required} {$type}"
	    	data-mode   = "inline"
	    	data-type   = "select"
	    	data-source = "[ {$_option_options} ]"
	    	data-value  = "{$_option_label_default}"
			>
			
		</div>
	</div>
{else}
	<div class="ui form form-group col-md-6 {$fieldname} {$type}">
		<div class="inline field col-lg-12 {$fieldname} {$type}">
			<label class="col-sm-3 control-label no-padding-right {$fieldname} {$required} {$type}">{$label} :</label>
			<div class="col-sm-9 {$fieldname} {$type}">
				<div class="input-control select {$fieldname} {$type}">
					<select 
						class="form-control select2 {$fieldname} {$required} {$type}"
				    	name="{$fieldname}" 
				    	id="{$fieldname}" 
					>
						<option value=''>Selecciona una opci&oacute;n</option>
						{foreach key=optionvalue item=row  from=$_options }
						{assign var="_option_label" value=""}
						{assign var="_option_icon" value=""}

						{if isset($row.label)}
							{assign var="_option_label"   value=$row.label}
						{else}
							{assign var="_option_label"   value=$row}
						{/if}
						{if isset($row.icon)}
							{assign var="_option_icon"   value=$row.icon}
						{/if}

						<option value='{$optionvalue}' {if $optionvalue eq $default}  selected="selected" {/if} data-icon='{$_option_icon}' >{$_option_label}</option>
						{/foreach}
					</select>								
				</div>

			</div>
		</div>
	</div>
{/if}