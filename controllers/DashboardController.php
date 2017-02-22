<?php
/**
 * DashboardController
 * 
 * Controlador Genérico
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 * @version 2016.05.14
 * @package controllers
 * @author Ing. Jorge Aníbal Padilla Hernández
 */

//require 'models/DashboardModel.php';
class DashboardController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Dashboard');
        //$this->primarytable = 'Dashboard';
        $appbar = array(
             "visible_tabs" => false
            //,"visible"=> true
            ,"buttons"=>array(
                     "create" => true
                    ,"delete" => true
                    ,"update" => true
                    ,"select" => true
                    ,'btn_mensajes' => array('label'=>'Mensajes', 'icon'=>'fa-comments-o')
                    ,'btn_sms'      => array('label'=>'SMS', 'icon'=>'fa-comments', 'url'=>"http://www.calixtaondemand.com/front2014/secc-login.php")
                )
            );

        $this->view->assign('appbar', $appbar );

    }

    public function index(){
        $this->view->assign('page_header', 'Inicio');
        $this->view->assign('page_description', '');

        $this->view->scripts = array(
            /*
            "layout/plugins/Chart.js/dist/Chart.bundle.min.js",
            VIEW_PATH.'Dashboard/index.js.tpl',
            */
        );
        $this->view->styles = array(
        );

        $this->data = array(
                 'ordenes'   => $this->getPrimaryTable()->execute( "SELECT count(*) FROM rcp" , true )
                ,'reorden'   => $this->getPrimaryTable()->execute( "SELECT count(*) FROM inv WHERE invcan <= invmin AND invmin!=0" , true )
                ,'topventas' => $this->getPrimaryTable()->execute( "SELECT rcdprd,prdnom,SUM(rcdcan) prdcan , prdimg FROM rcd,prd WHERE prdprd=rcdprd GROUP BY rcdcan ORDER BY SUM(rcdcan) DESC limit 10" , true )
            );
        $this->view->assign('data', $this->data);
        $this->view->display('Dashboard/index.tpl');
    }

}
?>
