<?php
/**
 * RcpController
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

require 'models/RcpModel.php';
class RcpController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Ventas');
        $this->primarytable = 'Rcp';

        $appbar = array(
            "buttons"=>array(
                     'btn_prd' => array(
                        'label'=>'Productos'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/box-filled.png'
                        , 'image_hover'=> SITE_URL.'/layout/assets/icons/normal/box-filled-hover.png'
                        , 'url'=> SITE_URL."/Prd"
                        , 'target' => '_blank'
                    )
                    ,'btn_pag' => array(
                        'label'=>'Formas de pago'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/money-refund.png'
                        , 'url'=> SITE_URL."/Fdp"
                        , 'target' => '_blank'
                    )
                    ,'btn_fac' => array(
                        'label'=>'Facturar'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/ticket.png'
                    )

                )
            );

        $this->view->assign('appbar', $appbar );
    }

}
?>
