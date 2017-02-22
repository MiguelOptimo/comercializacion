<?php
/**
 * CliController
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

require 'models/CliModel.php';
class CliController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Clientes');
        $this->primarytable = 'Cli';
        $appbar = array(
            "buttons"=>array(
                     'btn_prd' => array(
                        'label'=>'Categor&iacute;as<br>de clientes'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/info.png'
                        , 'url'=> SITE_URL."/Clc"
                        , 'target' => '_blank'
                    )
                )
            );

        $this->view->assign('appbar', $appbar );
    }
    public function trigger_upd_before(){
        $this->view->assign('page_header', 'Editar Cliente');
    }
    public function trigger_sel_before(){
        $this->view->assign('page_header', 'Listado de Clientes');
    }

}
?>
