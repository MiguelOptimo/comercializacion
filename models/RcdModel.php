<?php
/**
 * RcdModel
 * 
 * Modelo de Tabla Rcd
 * 
 * ESTE CÓDIGO E INFORMACIÓN SE PROPORCIONAN "TAL CUAL" SIN GARANTÍA DE NINGÚN
 * CLASE, BIEN EXPRESA O IMPLÍCITA, INCLUYENDO PERO NO LIMITADO A LA GARANTÍAS
 * DE COMERCIALIZACIÓN Y / O ADECUACIÓN A UN PROPÓSITO PARTICULAR.
 * 
 * Campos disponibles:
 *  text
 *  select
 *  textarea
 *  radio
 *  counter
 *  checkbox
 *  segmented
 *  tabbar
 *  combo
 *  button
 *  button
 *  richselect
 *  richselect
 *  colorpicker
 *  datepicker
 *  toggle
 *  toggle
 *  search
 * 
 * @version 2017.01.10
 * @package models
 * @author Ing. Jorge Aníbal Padilla Hernández
 * 
 */

if (!class_exists( basename(__FILE__,".php") ) ){

    class RcdModel extends Model{

        protected $fields = array(
             "rcdrcd" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"rcdrcp" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Venta",
                                    "references"=>array(
                                         "fk_tbl"=>"rcp"
                                        ,"fk_ide"=>"rcprcp"
                                        ,"fk_des"=>"rcpnom"
                                        ,"fk_label"=>"Venta"
                            ))
            ,"rcdprd" => array("type"=>"linked"  , "isnull"=>true  ,"value"=>"", "label"=>"Clave de Producto",
                                    "references"=>array(
                                         "fk_tbl"=>"prd"
                                        ,"fk_ide"=>"prdprd"
                                        ,"fk_des"=>"prdnom"
                                        ,"fk_label"=>"Producto"
                            ))
            ,"rcdcan" => array("label" => "Cantidad")
            ,"rcdpre" => array("label" => "Precio")
            ,"rcdtot" => array("label" => "Total")

        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "rcd";
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

    function getRcdTable(){
        return ( RcdModel::myself() );
    }

}
?>