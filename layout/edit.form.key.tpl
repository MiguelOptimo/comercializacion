{if $issingle eq true}
	{inputeditable table=$view_tbl primaryKey=$primaryKey field=$fieldname value=$default style="withLabel" readonly=true dataDefinition=$data.fields }
{else}
    <input 
    	type="hidden" 
    	name="{$fieldname}" 
    	id="{$fieldname}" 
    	class="form-control {$fieldname} {$required} {$type}" 
    	value="{$default}" 
    	placeholder="{$alttext}"
	/>
	<!--
	<div class="ui form form-group col-md-6 {$fieldname} {$type}">
		<div class="inline field col-lg-12 {$fieldname} {$type}">
			<label class="col-sm-3 control-label no-padding-right {$fieldname} {$required} {$type}">{$label} :</label>
			<div class="col-sm-9 {$fieldname} {$type}">
				<div class="input-control text {$fieldname} {$type}">
			    	<div class="form-control {$fieldname} {$required} {$type}">{$default}</div>
				</div>

			</div>
		</div>
	</div>
	-->
{/if}