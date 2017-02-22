<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);	//	Use PHP's directory separator for windows/unix compatibility
date_default_timezone_set('america/mexico_city');
setlocale(LC_MONETARY, 'es_MX');
setlocale(LC_TIME,"es_MX");

// Define absolute path to server root
defined('UL_CLASS')         ? null : define('UL_CLASS', 'nav side-menu');
defined('SITE_ROOT')        ? null : define('SITE_ROOT', dirname(__FILE__).DS);
defined('INCLUDE_PATH')     ? null : define('INCLUDE_PATH', SITE_ROOT.'libs'.DS);
defined('STORAGE_PATH')     ? null : define('STORAGE_PATH', SITE_ROOT.'data'.DS);
defined('CONTROLLERS_PATH') ? null : define('CONTROLLERS_PATH', SITE_ROOT.'controllers'.DS);
defined('MODEL_PATH')       ? null : define('MODEL_PATH', SITE_ROOT.'models'.DS);
defined('VIEW_PATH')        ? null : define('VIEW_PATH', SITE_ROOT.'views'.DS);
defined('LOGIN_CONTROLLER') ? null : define('LOGIN_CONTROLLER', 'IndexController');
defined('DEBUG_MODE')       ? null : define('DEBUG_MODE', true );
define('LOGIN_CONTROLER'  , 'IndexController');
define('HOME_CONTROLER'   , 'Dashboard');
define('SITE_URL', 'http://entornoweb.mx/demos/app.comercializacion');
define('SVR_TOKEN','H819al30#');

$config = Config::singleton();

$config->set('driver'  , 'mysql');
//$config->set('driver' , 'sqlsrv');

if(DEBUG_MODE == true ){
    ini_set('log_errors', 1);
    ini_set('error_log', STORAGE_PATH.'php-error.log');
	ini_set("display_errors",1);
}
else{
	ini_set("display_errors",0);
}

/**
 *   Conexion a la base de datos
 *   @version    1.0
 */

$config->set('dbhost', 'lmgmedica.db.10158276.hostedresource.com');

$config->set('dbname', 'lmgmedica');
$config->set('dbuser', 'lmgmedica');
$config->set('dbpass', 'H819al30#');

/**
 *   Estilos y scripts predeterminados para las vistas INDEX
 *   @version    1.0
 */
$view_scripts = array();
$view_scripts = array(
    'layout/assets/js/bootstrap3-dialog/js/bootstrap-dialog.min.js',
    /*
    //'layout/assets/js/webix/codebase/webix.js',
    //'layout/assets/js/webix/common/testdata.js',
    // tinymce-wysiwyg
    "layout/assets/js/tinymce/tinymce.min.js",
    //  jqx-all
    'layout/assets/js/jqwidgets/jqx-all.js',
    'layout/assets/js/jqwidgets/globalization/localization.js',
    'layout/edit.form.data-table.js',
    // Index scripts
    //'view-inline-edit.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.min.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/wysihtml5.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js',
    'layout/assets/js/bootstrap3-editable/bootstrap3-editable/js/bootstrap-editable.js',
    'toolbar-ribbon.js',
    'index.js'
    */
);

$view_styles = array();
$view_styles = array(
    'layout/assets/js/bootstrap3-dialog/css/bootstrap-dialog.min.css',
    /*
    'layout/assets/js/office-ribbon-2010/ribbon/ribbon.css',
    'layout/assets/js/webix/codebase/webix.css',
    'layout/assets/js/jqwidgets/styles/jqx.base.css',
    'layout/assets/js/bootstrap3-editable/bootstrap3-editable/css/bootstrap-editable.css',
    'layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.css',
    'layout/assets/js/jqwidgets/styles/jqx.hiexpress.css',
    */
);

$config->set('view_scripts_index', $view_scripts);
$config->set('view_styles_index', $view_styles);

/**
 *   Estilos y scripts predeterminados para las vistas UPDATE
 *   @version    1.0
 */
$view_scripts = array();
$view_scripts = array(
    'layout/assets/js/bootstrap3-dialog/js/bootstrap-dialog.min.js',
    /*
    "layout/assets/js/bootstrap/dist/js/bootstrap.min.js",
    "layout/assets/js/fastclick/lib/fastclick.js",
    "layout/assets/js/nprogress/nprogress.js",
    "layout/assets/js/bootstrap-progressbar/bootstrap-progressbar.min.js",
    "layout/assets/js/iCheck/icheck.min.js",
    "layout/assets/js/moment/min/moment.min.js",
    "layout/assets/js/colorpicker/bootstrap-colorpicker.min.js",
    "layout/assets/js/bootstrap-daterangepicker/daterangepicker.js",
    "layout/assets/js/tinymce/tinymce.min.js",
    "layout/assets/js/tinymce/jquery.tinymce.min.js",
    "layout/assets/js/switchery/dist/switchery.min.js",
    "layout/assets/js/select2/dist/js/select2.full.min.js",
    "layout/assets/js/parsleyjs/dist/parsley.min.js",
    "layout/assets/js/autosize/dist/autosize.min.js",
    "layout/assets/js/devbridge-autocomplete/dist/jquery.autocomplete.min.js",
    "layout/assets/js/starrr/dist/starrr.js",
    'layout/assets/js/jQuery-Validation-Engine/js/languages/jquery.validationEngine-es.js',
    'layout/assets/js/jQuery-Validation-Engine/js/jquery.validationEngine.js',
    'layout/assets/js/jqwidgets/jqx-all.js',
    'layout/assets/js/jqwidgets/globalization/localization.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/wysihtml5/wysihtml5.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
    'layout/assets/js/bootstrap3-editable/inputs-ext/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js',
    'layout/assets/js/bootstrap3-editable/bootstrap3-editable/js/bootstrap-editable.js',
    //'view-inline-edit.js',
    'toolbar-ribbon.js',
    "layout/edit.js",
    */
);


$view_styles = array();
$view_styles = array(
    'layout/assets/js/bootstrap3-dialog/css/bootstrap-dialog.min.css',
    /*
    "layout/assets/js/nprogress/nprogress.css",
    "layout/assets/js/iCheck/skins/flat/green.css",
    "layout/assets/js/select2/dist/css/select2.min.css",
    "layout/assets/js/switchery/dist/switchery.min.css",
    "layout/assets/js/starrr/dist/starrr.css",
    "layout/assets/js/bootstrap-daterangepicker/daterangepicker.css",
    'layout/assets/js/jQuery-Validation-Engine/css/validationEngine.jquery.css',
    'layout/assets/js/jqwidgets/styles/jqx.base.css',
    'layout/assets/js/jqwidgets/styles/jqx.hiexpress.css',
    'layout/assets/js/bootstrap3-editable/bootstrap3-editable/css/bootstrap-editable.css',
    */
);
$config->set('view_scripts_upd', $view_scripts);
$config->set('view_styles_upd', $view_styles);

?>
