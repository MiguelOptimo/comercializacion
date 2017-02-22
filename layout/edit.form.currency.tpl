					<div class="ui form form-group {$fieldname} {$type}">
						<div class="inline field col-lg-12 {$fieldname} {$type}">
							<label class="col-sm-3 control-label no-padding-right {$fieldname} {$required} {$type}">{$label} :</label>
							<div class="col-sm-9 {$fieldname} {$type}">
				                <div class="input-group currency {$fieldname} {$type}">
				                  <div class="input-group-addon">
				                    <i class="fa fa-dollar"></i>
				                  </div>
				                  <input 
				                  	type="text" 
				                  	class="form-control pull-right numeric_mask numeric_currency {$fieldname} {$required} {$type}" 
				                  	data-inputmask="'alias': 'currency'" 
				                  	data-inputmask-prefix=""
							    	name="{$fieldname}" 
				                  	id="{$fieldname}"
							    	value="{$default}" 
							    	placeholder='{$alttext|default:"0.00"}'
							    	{if $editable eq false } readonly {/if}
				                  	/>
				                </div>
				                <!-- /.input group -->

							</div>
						</div>
					</div>