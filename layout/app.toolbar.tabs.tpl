			{include file="app.toolbar.menu.tpl"}

			{if $appbar.visible_tabs eq true}
				
			<div class="ribbon-tab" id="format-tab">
				<span class="ribbon-title">Opciones</span>
				<div class="ribbon-section">
					{if $appbar.button_create eq true}
					<div class="ribbon-button ribbon-button-large" 
						data-controller="{ucfirst(strtolower($view_tbl))}" 
						data-table="{$view_tbl}" 
						data-id="{$primaryKey}" 
						data-action="btn-add"
						id="btn-add">
						<span class="button-title">Nuevo</span>
						<span class="button-help">Crea un nuevo item en la base de datos.</span>
						<img class="ribbon-icon ribbon-normal"   src="{SITE_URL}/layout/assets/icons/normal/new-page.png" />
						<img class="ribbon-icon ribbon-hot"      src="{SITE_URL}/layout/assets/icons/hot/new-page.png" />
						<img class="ribbon-icon ribbon-disabled" src="{SITE_URL}/layout/assets/icons/disabled/new-page.png" />
					</div>
					{/if}
					{if $appbar.button_select eq true}
					<div class="ribbon-button ribbon-button-large ocultar" 
						data-controller="{ucfirst(strtolower($view_tbl))}" 
						data-table="{$view_tbl}" 
						data-id="{$primaryKey}" 
						data-action="btn-sel"
						id="btn-sel">
						<span class="button-title">Abrir<br/>selecci&oacute;n</span>
						<span class="button-help">Mostrar la informac&oacute;n capturada.</span>
						<img class="ribbon-icon ribbon-normal"   src="{SITE_URL}/layout/assets/icons/normal/open-page.png" />
						<img class="ribbon-icon ribbon-hot"      src="{SITE_URL}/layout/assets/icons/hot/open-page.png" />
						<img class="ribbon-icon ribbon-disabled" src="{SITE_URL}/layout/assets/icons/disabled/open-page.png" />
					</div>
					{/if}
					{if $appbar.button_update eq true}
					<div class="ribbon-button ribbon-button-large" 
						data-controller="{ucfirst(strtolower($view_tbl))}" 
						data-table="{$view_tbl}" 
						data-id="{$primaryKey}" 
						data-action="btn-upd"
						id="btn-upd">
						<span class="button-title">Editar<br/>seleccionado</span>
						<span class="button-help">Edita la informaci&oacute;n de la fila seleccionada.</span>
						<img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/edit-page.png" />
					</div>
					{/if}
					<!--
					<div class="ribbon-button ribbon-button-wide" id="del-page-btn">
						<span class="button-title">Guardar<br/>modificaci&oacute;n</span>
						<span class="button-help">Guarda los cambios realizados.</span>
						<img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/save-page.png" />
					</div>

				    <div class="ribbon-section-sep" unselectable="on"></div>
					-->
				</div>
				{if $appbar.button_delete eq true}
				<div class="ribbon-section">
					<div class="ribbon-button ribbon-button-large disabled" 
						data-controller="{ucfirst(strtolower($view_tbl))}" 
						data-table="{$view_tbl}" 
						data-id="{$primaryKey}" 
						data-action="btn-del"
						id="btn-del">
						<span class="button-title">Eliminar<br/>selecci&oacute;n</span>
						<span class="button-help">Eliminar <br/>item seleccionado</span>
						<img class="ribbon-icon ribbon-normal"   src="{SITE_URL}/layout/assets/icons/normal/delete-page.png" />
						<img class="ribbon-icon ribbon-hot"      src="{SITE_URL}/layout/assets/icons/hot/delete-page.png" />
						<img class="ribbon-icon ribbon-disabled" src="{SITE_URL}/layout/assets/icons/disabled/delete-page.png" />
					</div>
				</div>
				{/if}


				    {if count($appbar.buttons) neq 0}
				    	<div class="ribbon-section">
					    {foreach key=btnName item=btnItem  from=$appbar.buttons }
							{if $btnName neq "create" && $btnName neq "update" && $btnName neq "delete" && $btnName neq "select"}

						      {assign var="label"  value=''}
						      {assign var="icon"   value=''}
						      {assign var="image"  value=''}
						      {assign var="target"  value=''}
						      {assign var="image_hover"  value=''}
						      {assign var="url"    value=''}
						      {if isset($btnItem.url)}
						        {assign var="url"   value=$btnItem.url}
						      {/if}
						      {if isset($btnItem.label)}
						        {assign var="label"   value=$btnItem.label}
						      {/if}
						      {if isset($btnItem.icon)}
						        {assign var="icon"   value=$btnItem.icon}
						      {/if}
						      {if isset($btnItem.image)}
						        {assign var="image"   value=$btnItem.image}
						      {/if}
						      {if isset($btnItem.target)}
						        {assign var="target"   value="target=$btnItem.target"}
						      {/if}
						      {if isset($btnItem.image_hover)}
						        {assign var="image_hover"   value=$btnItem.image_hover}
						      {/if}

						      <{if $url eq ""}div {else}a href={$url} {$target} {/if}
						        class="ribbon-button ribbon-button-large btn-{$btnName}" 
						        id="{$btnName}" 
						        data-controller="{ucfirst(strtolower($view_tbl))}" 
						        data-table="{$view_tbl}" 
						        data-id="{$primaryKey}" 
						        data-action="{$btnName}" 
						        unselectable="on">
						        {if $image eq ''}
						          <div class="ribbon-icon ribbon-normal ">
						            <i class="fa {$icon} fa-3"></i>
						          </div>
						        {else}
									<img class="ribbon-icon ribbon-normal"   src="{$image}" />
						        	{if $image_hover neq ''}
									<img class="ribbon-icon ribbon-hot"      src="{$image_hover}" />
									{/if}
						        {/if}
						      <span class="button-title" unselectable="on">{$label}</span>
						      </{if $url eq ""}div {else}a {/if}>

					        {/if}
					    {/foreach}
					    </div>
				    {/if}
			</div>

			<div class="ribbon-tab" id="next-tab">
				<span class="ribbon-title">Herramientas</span>
				<div class="ribbon-section">
					<div class="ribbon-button ribbon-button-large" 
						target="_blank" 
						data-controller="{ucfirst(strtolower($view_tbl))}" 
						data-table="{$view_tbl}" 
						data-id="{$primaryKey}" 
						data-action="btn-pdf"
						id="btn-pdf">
						<span class="button-title">Imprimir<br/>PDF</span>
						<span class="button-help">Genera una versi&oacute;n en PDF del la informaci&oacute;n mostrada.</span>
						<img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/print.png" />
					</div>
					<div class="ribbon-button ribbon-button-large" 
						data-controller="{ucfirst(strtolower($view_tbl))}" 
						data-table="{$view_tbl}" 
						data-id="{$primaryKey}" 
						data-action="btn-export"
						id="btn-export">
						<span class="button-title">Exportar<br/>a Excel</span>
						<span class="button-help">Exporta la tabla a un archivo para abrir en Excel.</span>
						<img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/export_excel.png" />
					</div>
					<!--
					href="{SITE_URL}/data/example.pdf"
					<div class="ribbon-button ribbon-button-large" id="other-btn-2">
						<span class="button-title">Buscar<br/>en todo</span>
						<span class="button-help">Busca una palabra en toda la iformaci&oacute;n de la base de datos.</span>
						<img class="ribbon-icon ribbon-normal" src="{SITE_URL}/layout/assets/icons/normal/page-search.png" />
					</div>
					-->
				</div>
			</div>

			{/if}
