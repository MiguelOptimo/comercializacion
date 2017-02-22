<?php
/**
 * PrdController
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

require 'models/PrdModel.php';
class PrdController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Productos');
        $this->primarytable = 'Prd';
        $appbar = array(
            "buttons"=>array(
                     'btn_prv' => array(
                        'label'=>'Proveedores'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/user.png'
                        , 'url'=> SITE_URL."/Prv"
                        , 'target' => '_blank'
                    )
                    /*
                    ,'btn_alm' => array(
                        'label'=>'Almacenes'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/layers.png'
                        , 'url'=> SITE_URL."/Alm"
                    )
                    */
                )
            );

        $this->view->assign('appbar', $appbar );
    }
    public function trigger_upd_before(){
        $this->view->assign('page_header', 'Editar Producto');
        $this->data = array(
            "uni" => $this->getPrimaryTable()->execute( "SELECT * FROM uni LEFT JOIN pdv ON pdvuni=uniuni AND md5(pdvprd)='".$this->getPrimaryKey()."'" , true )
        );
    }
    public function trigger_sel_before(){
        $this->view->assign('page_header', 'Listado de Productos');
    }

}
?>
