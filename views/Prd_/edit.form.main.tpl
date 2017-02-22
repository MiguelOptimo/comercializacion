<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">{$data.dataRow["prdnom"]}</h3>
    </div>
    <div class="panel-body">
    	<div class="row">
    		<!--
			<img src="{$data.dataRow["prdimg"]}" alt="{$data.dataRow["prdnom"]}" class="col-md-6 prdimg" />
			-->
			{forminput field="prdimg" label="Imagen del producto" value=$data.dataRow["prdimg"] type="image" class="col-md-4 prdimg" }
    		<div class="col-md-8">

				{inputeditable table="prd" primaryKey=$data.dataRow["prdprd"] field="prdcod" value=$data.dataRow["prdcod"] style="withLabel" dataDefinition=$data.fields["prdcod"] }
				<hr/>
				{inputeditable table="prd" primaryKey=$data.dataRow["prdprd"] field="prdnom" value=$data.dataRow style="withLabel" dataDefinition=$data.fields }
				<hr/>
				{inputeditable table="prd" primaryKey=$data.dataRow["prdprd"] field="prddes" value=$data.dataRow style="withLabel" dataDefinition=$data.fields }
				<hr/>
				{inputeditable table="prd" primaryKey=$data.dataRow["prdprd"] field="prdiva" value=$data.dataRow style="withLabel" dataDefinition=$data.fields }

    		</div>
    	</div>
    	<hr/>
    	<div class="row">
    		<h4>Presentaciones</h4>
    		<table class="table table-hover">
    			<thead>
    				<tr>
    					<th>Unidad</th>
    					<th>Precio de venta fijo</th>
    					<th>Precio de venta %</th>
    				</tr>
    			</thead>
    			<tbody>
	            {foreach key=_item_index_ item=_item_dataRow_  from=$data.uni }
	                {assign var="uniuni"     value=$_item_dataRow_.uniuni }
	                {assign var="uninom"     value=$_item_dataRow_.uninom }
	                {assign var="uniabr"     value=$_item_dataRow_.uniabr }
	                {assign var="pdvpre"     value=$_item_dataRow_.pdvpre }
	                {assign var="pdvmon"     value=$_item_dataRow_.pdvmon }
	                {if $pdvpre eq ""}
	                	{assign var="pdvpre" value="0.00"}
	                	{assign var="pdvmon" value="MXN"}
	                {/if}

	                {$defaultValues = ['pdvprd' =>$data.dataRow["prdprd"],'pdvuni' => $_item_dataRow_.uniuni ]}

	                <tr>
	                	<td>{$uninom}</td>
	                	<td>
	                	{inputeditable primaryKey=$_primaryKey field="pdvpre" table="pdv" label="Precio de venta" value=$pdvpre default=serialize($defaultValues) }

						{$data.dataTable_Cdm['cdmd00']}
						</span>
						{$pdvmon}
	                	</td>
	                	<td>0%</td>
	                </tr>
	            {/foreach}
    			</tbody>
    		</table>

    	</div>
    </div>
</div>