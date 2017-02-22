<?php
/**
 * VenController
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

require 'models/VenModel.php';
class VenController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Vendedores');
        $this->primarytable = 'Ven';

        $appbar = array(
            "buttons"=>array(
                     'btn_cxv' => array(
                        'label'=>'Clientes por vendedor'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/users.png'
                        //, 'url'=> SITE_URL."/Cxv"
                        //, 'target' => '_blank'
                    )

                )
            );

        $this->view->assign('appbar', $appbar );
    }


}
?>
