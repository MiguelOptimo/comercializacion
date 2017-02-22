<?php
/**
 * PedController
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

require 'models/PedModel.php';
class PedController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Pedidos');
        $this->primarytable = 'Ped';


        $appbar = array(
            "buttons"=>array(
                     'btn_impr_oc' => array(
                        'label'=>'Orde de compra'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/print.png'
                    )

                )
            );

        $this->view->assign('appbar', $appbar );

    }

    public function Print_oc(){
        echo "ok";
    }

}
?>
