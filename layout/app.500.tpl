{extends file='layout/blank.tpl'}

{block name=header_content}
	<style>
		body{
			padding-top: 46px;
			background: rgb(52, 73, 94);
		}
	</style>
{/block}

{block name=content}

	<div class="ui-layout-center">
		<div class="page-error page">
	        <h2 class="headline text-red">500</h2>

	    	{if $err_type eq "err_controller"}
				<h3><i class="fa fa-warning text-red"></i> Error en la clase.</h3>

				<p>
				El controlador <b class="text-red">`{$_controller_}`</b> no existe. Verifique la ubicaci&oacute;n y nombre del archivo (CamelCase): <b>{$_controller_}Controller</b>.
				O bi&eacute;n, <a href="{SITE_URL}">regresar a el Dashboard</a> de la aplicaci&oacute;n.
				</p>
			{/if}
	    	{if $err_type eq "err_action"}
				<h3><i class="fa fa-warning text-red"></i> Error en la acci&oacute;n.</h3>

				<p>
				La acci&oacute;n <b class="text-red">`{$_action_}`</b> no existe. Verifique la existencia de la funci&oacute;n dentro del controlador <b>{$_controller_}Controller</b>.
				O bi&eacute;n, <a href="{SITE_URL}">regrese a el Dashboard</a> de la aplicaci&oacute;n.
				</p>
			{/if}
	    	{if $err_type eq "err_sql_conn"}
				<h3><i class="fa fa-warning text-red"></i> Error en la conexi&oacute;n.</h3>

				<p>
				No se puede establecer conexi&oacute;n al servidor de base de datos <b class="text-red">`{$db_host}`</b>.
				Verifique los siguientes datos:
					<ul>
						<li>Verifique su enlace a internet.</li>
						<li>El nombre de la base de datos <b class="text-black">`{$db_base}`</b>.</li>
						<li>El nombre del usuario <b class="text-black">`{$db_user}`</b>.</li>
						<li>La contraseña <b class="text-black">`{$db_pass}`</b>.</li>
					</ul>
				<!-- {$exception_e} -->
				</p>
			{/if}

      	</div><!-- /.page -->
	</div><!-- /.error-page -->

{/block}