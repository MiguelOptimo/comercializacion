<?php
/**
 * InvController
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

require_once("models/InvModel.php");
class InvController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Inventarios');
        $this->primarytable = 'Inv';

        $appbar = array(
            "buttons"=>array(
                     'btn_prd' => array(
                        'label'=>'Productos'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/box-filled.png'
                        , 'image_hover'=> SITE_URL.'/layout/assets/icons/normal/box-filled-hover.png'
                        , 'url'=> SITE_URL."/Prd"
                        , 'target' => '_blank'
                    )
                    ,'btn_uni' => array(
                        'label'=>'Unidades'
                        , 'icon'=> 'fa-cog'
                        , 'url'=> SITE_URL."/Uni"
                        , 'target' => '_blank'
                    )
                    ,'btn_ped' => array(
                        'label'=>'Pedidos'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/order.png'
                        , 'url'=> SITE_URL."/Ped"
                        , 'target' => '_blank'
                    )
/*
                    ,'btn_ent' => array(
                        'label'=>'Entradas<br>de almac&eacute;n'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/move-stock.png'
                        , 'url'=> SITE_URL."/Ped"
                        , 'target' => '_blank'
                    )
                    ,'btn_sal' => array(
                        'label'=>'Salidas<br>de almac&eacute;n'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/sell.png'
                        , 'url'=> SITE_URL."/Rcd"
                        , 'target' => '_blank'
                    )
*/
                    ,'btn_alm' => array(
                        'label'=>'Almacenes'
                        , 'image'=> SITE_URL.'/layout/assets/icons/normal/layers.png'
                        , 'url'=> SITE_URL."/Alm"
                        , 'target' => '_blank'
                    )
                )
            );

        $this->view->assign('appbar', $appbar );

    }
    public function trigger_upd_before(){
        $this->view->assign('page_header', 'Editar Inventario');
    }
    public function trigger_sel_before(){
        $this->view->assign('page_header', 'Listado de Inventario');
    }

    public function trigger_source_before(){
        $this->QuerySQL = '
SELECT 
                 0 as invinv -- as "Clave del sistema"
                ,1 as "inv.invalm"     -- ID de Almac&eacute;n
                                            -- "fk_tbl"=>"alm"
                                            -- "fk_ide"=>"almalm"
                                            -- "fk_des"=>"almnom"
                ,"Todos" as "almnom"
                                            -- "fk_label"=>"Almac&eacute;n"
                ,pddprd as "inv.invprd"     -- ID de Producto
                ,prdnom as "prdnom"
                                            -- "fk_tbl"=>"prd"
                                            -- "fk_ide"=>"prdprd"
                                            -- "fk_des"=>"prdnom"
                                            -- "fk_label"=>"Producto"
                ,pedprv as "inv.invprv"     -- ID de proveedor
                                            -- "fk_tbl"=>"prv"
                                            -- "fk_ide"=>"prvprv"
                                            -- "fk_des"=>"prvnom"
                                            -- "fk_label"=>"Proveedor"
                ,pdduni as "inv.invuni" -- ID de Unidad
                ,uninom as "uninom" -- ID de Unidad
                                            -- "fk_tbl"=>"uni"
                                            -- "fk_ide"=>"uniuni"
                                            -- "fk_des"=>"uninom"
                                            -- "fk_label"=>"Unidad"
                ,pddcan as "inv.invcan"     -- Existencia
                ,prdinm as "inv.invmin"     -- Inv. Minimo
                ,pddpdc as "inv.invpr1"     -- Precio de compra
                ,pddpdv as "inv.invpr2"     -- Precio Venta
                ,"MXN" as "inv.invmon"     -- ID de Divisa
                ,"No" as "inv.invven"     -- Vendido
                ,pddlot as "inv.invlot"     -- Lote
                ,pddcad as "inv.invcad"     -- Caducidad
                ,pddpdd as "inv.invped"     -- ID de Pedido

FROM ped,pdd 
LEFT JOIN prd ON pddprd=prdprd
LEFT JOIN uni ON pdduni=uniuni

WHERE pedped=pddped AND pddsur="S"

        ';
    }

}
?>
