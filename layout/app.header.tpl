<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Aplicaci&oacute;n Web {if isset($title)} :: {$title|default:""}{/if}</title>
	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" href="{SITE_URL}/favicon.ico" />

	<!-- Hojas de estilo de plugins -->
	<link href="{SITE_URL}/layout/assets/js/jqwidgets/styles/jqx.base.css" rel="stylesheet" type="text/css" />
	<link href="{SITE_URL}/layout/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{SITE_URL}/layout/assets/js/bootstrap3-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="{SITE_URL}/layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet" type="text/css" />

	<link href="{SITE_URL}/layout/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="{SITE_URL}/layout/assets/css/bootstrap-material-design.min.css" rel="stylesheet" type="text/css" />
	<link href="{SITE_URL}/layout/assets/css/ripples.min.css" rel="stylesheet" type="text/css" />
	<link href="{SITE_URL}/layout/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="{SITE_URL}/layout/assets/js/jquery.layout/layout-default.css" rel="stylesheet" type="text/css" />

	<!-- Hojas de estilo de la app -->
	<link href="{SITE_URL}/layout/assets/js/ribbon/icons.css" rel="stylesheet" type="text/css" />
	<link href="{SITE_URL}/layout/assets/fonts/opensans_regular/stylesheet.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="{SITE_URL}/layout/assets/css/app.css" rel="stylesheet" type="text/css" />
	
	<!-- Variables globales -->
    <script language="JavaScript">
		var _datatable_row_id_ = 0;
		var dataTables = [];  //  Utilizado en "edit.form.data-table.tpl" y "edit.form.data-table.js"
		var dataTables = new Array();  //  Utilizado en "edit.form.data-table.tpl" y "edit.form.data-table.js"
		var dataTables = {  };  //  Utilizado en "edit.form.data-table.tpl" y "edit.form.data-table.js"
    </script>


	<style>
		/*
		 *  Bloque generado desde "layout\app.header.tpl"
		 * */
		{$appbar_single = false}
		{if isset($appbar) eq true}
			{if isset($appbar.visible) eq true}
				{if $appbar.visible eq false}
					{$appbar_single = true}
					body{
						padding-top: 46px;
					}
					.ribbon-profile, .menu-mobile{
						display: none !important;
					}
				{/if}
			{/if}
			{if isset($appbar.visible_tabs) eq true}
				{if $appbar.visible_tabs eq false}
					{$appbar_single = true}
					body{
						padding-top: 52px;
					}
				{/if}
			{/if}
		{/if}
	</style>
	{block name=header_content}{/block}

</head>
<body>

	{if isset($data.TableName) eq true}
		{assign var="view_tbl"     value=$data.TableName}
	{else}
		{assign var="view_tbl"     value=""}
	{/if}
	
	{assign var="view_ide"     value=""}
	{assign var="view_order"   value=""}
	{assign var="primaryKey"   value=_primaryKey_}
  
	{block name=apptoolbar}
		{include file="app.toolbar.tpl"}
	{/block}