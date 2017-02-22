<?php
/**
 * InvModel
 * 
 * Modelo de Tabla Inv
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 * @version 2017.01.10
 * @package models
 * @author Ing. Jorge Aníbal Padilla Hernández
 * 
 */

if (!class_exists( basename(__FILE__,".php") ) ){

    class InvModel extends Model{

        protected $fields = array(
             "invinv" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave del sistema")

            //,"invcen" => array("label"=>"ID Sucursal")
            ,"invalm" => array("type"=>"linked", "label"=>"ID de Almac&eacute;n",
                                    "references"=>array(
                                         "fk_tbl"=>"alm"
                                        ,"fk_ide"=>"almalm"
                                        ,"fk_des"=>"almnom"
                                        ,"fk_label"=>"Almac&eacute;n"
                            ))

            ,"invprd" => array("type"=>"linked", "label"=>"ID de Producto",
                                    "references"=>array(
                                         "fk_tbl"=>"prd"
                                        ,"fk_ide"=>"prdprd"
                                        ,"fk_des"=>"prdnom"
                                        ,"fk_label"=>"Producto"
                            ))
            /*
            ,"invprv" => array("type"=>"linked", "label"=>"ID de proveedor",
                                    "references"=>array(
                                         "fk_tbl"=>"prv"
                                        ,"fk_ide"=>"prvprv"
                                        ,"fk_des"=>"prvnom"
                                        ,"fk_label"=>"Proveedor"
                            ))
            */
            ,"invuni" => array("type"=>"linked", "label"=>"ID de Unidad",
                                    "references"=>array(
                                         "fk_tbl"=>"uni"
                                        ,"fk_ide"=>"uniuni"
                                        ,"fk_des"=>"uninom"
                                        ,"fk_label"=>"Unidad"
                            ))
            ,"invcan" => array("label"=>"Existencias")
            ,"invmin" => array("label"=>"Inv. Minimo")
            ,"invpr1" => array("label"=>"Precio de compra")
            ,"invpr2" => array("label"=>"Precio Venta")
            //,"invpr3" => array("label"=>"Precio Mayoreo")
            ,"invmon" => array("label"=>"ID de Divisa")
            ,"invven" => array("label"=>"Vendido")
            ,"invlot" => array("label"=>"Lote")
            ,"invcad" => array("label"=>"Caducidad")
            //,"invped" => array("label"=>"ID del pedido")
            ,"invped" => array("type"=>"linked", "label"=>"ID de Pedido",
                                    "references"=>array(
                                         "fk_tbl"=>"ped"
                                        ,"fk_ide"=>"pedped"
                                        ,"fk_des"=>"peddes"
                                        ,"fk_label"=>"Pedido"
                            ))

            //,"invsur" => array("label"=>"Surtido")

        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "inv";
            $this->tableDescription = "";
        }

        private static $instance = null;
        public static function myself(){
            if( self::$instance == null )
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

    }

    function getInvTable(){
        return ( InvModel::myself() );
    }

}
?>