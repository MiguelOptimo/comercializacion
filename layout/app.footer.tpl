
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/ripples.min.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/material.min.js"></script>
	<!-- jqwidgets -->
	<link rel="stylesheet"        href="{SITE_URL}/layout/assets/js/jqwidgets/styles/jqx.base.css" type="text/css" />
	<link rel="stylesheet"        href="{SITE_URL}/layout/assets/js/jqwidgets/styles/jqx.arctic.css" type="text/css" />
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxbuttons.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxscrollbar.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxlistbox.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxdropdownlist.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxmenu.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.sort.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.filter.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.pager.js"</script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxpanel.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.columnsresize.js"</script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxcalendar.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxgrid.grouping.js"</script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxdatetimeinput.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/jqxcheckbox.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jqwidgets/globalization/localization.js"></script>

	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jquery.layout/jquery-ui-latest.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/jquery.layout/jquery.layout.js"></script>

    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/xml/utf8_encode.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/strings/md5.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/strings/strpos.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/strings/get_html_translation_table.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/strings/html_entity_decode.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/var/isset.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/math/round.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/phpjs/url/urlencode.js"></script>

    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.min.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/wysihtml5.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js"></script>
    <script type="text/javascript" src="{SITE_URL}/layout/assets/js/bootstrap3-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>


	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/app.js"></script>
	<script type="text/javascript" src="{SITE_URL}/layout/assets/js/app.common.js"></script>
	
	<script type="text/javascript">
		var applayout;
		jQuery(document).ready(function($) {
			/**
			 *	Aplicar estilos MATERIAL-UI
			 * */
			$.material.init();
			/**
			 *	Aplicar layout si el contenedor existe
			 * */
			if( $('.ui-layout-center').length ){
				console.log("$('body').layout();");
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

				// create page layout
				applayout = $('body').layout({
					scrollToBookmarkOnLoad:		false // handled by custom code so can 'unhide' section first
				,	defaults: {
					}
				,	north: {
						size:					"auto"
					,	spacing_open:			0
					,	closable:				false
					,	resizable:				false
					}
				,	east: {
						size:					Math.floor(screen.availWidth * .35)
					,	spacing_closed:			22
					,	togglerLength_closed:	180
					,	togglerAlign_closed:	"top"
					,	togglerContent_closed:	"<br>C<br>o<br>n<br>t<br>e<br>n<br>i<br>d<br>o"
					,	togglerTip_closed:		"Click para mostrar el contendio"
					,	sliderTip:				"Slide Abrir contenido"
					//,	slideTrigger_open:		"mouseover"
					,   initClosed:             true
					}
				});

			}


			/**
			 *	Aplicar RibbonBar si existe
			 * */
			if( $('#ribbon').length ){
				$('#ribbon').ribbon();
				$('#btn-sel').disable();
				$('#btn-upd').disable();
				$('#btn-del').disable();
			}
			/**
			 *	Aplicar EditinPlace si existe
			 * */		
			if( $(".editable").length ){
				applyEditable();
			}

		});
	</script>

	<script language="JavaScript"> 
		var _site_url    = '{SITE_URL}';
		var _site_url_   = '{SITE_URL}';
		var _svr_token_  = '{$_svr_token_}';
		var _controller  = '{$_controller_}';
		var _controller_ = '{$_controller_}';
		var _action      = '{$_action_}';
		var _action_     = '{$_action_}';
		var _primaryKey_ = '{$_primaryKey_}';
		var _userid_     = '{$_sesion_->get("usuusu")}';
		var _params      = '{$_params_}';
	</script>

	<!--
	   -
	   - Footer Styles
	   -
		{print_r($_styles_)}
	   -->
    {foreach item="style_name" from=$_styles_}
	    <script language="JavaScript"> 
			console.log('footer: load styles {SITE_URL}/{$style_name}');
	    </script>
    	<link rel="stylesheet" href="{SITE_URL}/{$style_name}">
    {/foreach}

	<!--
	   -
	   - Footer Scripts
	   -
		{print_r($_scripts_)}
	   -->
    {foreach item="filename" from=$_scripts_}
		{assign var="file_ext" value=$filename|pathinfo:$smarty.const.PATHINFO_EXTENSION}
		{assign var="file_dir" value=""}

		{if file_exists($filename) eq false }
			{assign var="file_dir" value="layout/"}
		{/if}

		{if $file_ext eq "tpl"}
			<script language="JavaScript"> 
				console.log('footer: load script TPL "{$file_dir}{$filename}"');
				{include file="$file_dir$filename"}
			</script>
		{else}
			{if $filename|strpos:'http'===0}
				<script language="JavaScript"> 
					console.log('footer: load script EXTERNAL "{$filename}"');
				</script>
				<script src="{$filename}"></script>
			{else}
				<script language="JavaScript"> 
					console.log('footer: load script LOCAL "{$file_dir}{$filename}"');
				</script>
				<script src="{SITE_URL}/{$file_dir}{$filename}"></script>
			{/if}
		{/if}
    {/foreach}

	{assign var="filename" value=$_action_|lower}
	{assign var="filename" value="views/$_controller_/$filename.js"}
	{if file_exists($filename) eq true }
	    <script language="JavaScript"> 
			console.log('footer: AUTOLOAD load scripts: "{SITE_URL}/{$filename}"');
	    </script>
	    <script src="{SITE_URL}/{$filename}"></script>
	{/if}

	{assign var="filename" value=$_action_|lower}
	{assign var="filename" value="libs/views/$_controller_/$filename.js"}

	{if file_exists($filename) eq true }
	    <script language="JavaScript"> 
			console.log('footer: AUTOLOAD load scripts: "{SITE_URL}/{$filename}"');
	    </script>
	    <script src="{SITE_URL}/{$filename}"></script>
	{/if}



	{block name=footer_content}{/block}

</body>
</html>
