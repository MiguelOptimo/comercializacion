<?php
/**
 * PrvModel
 * 
 * Modelo de Tabla Prv
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

    class PrvModel extends Model{

        protected $fields = array(
             "prvprv" => array("type"=>"key" , "isnull"=>false ,"value"=>"","label"=>"Clave")
            ,"prvnom" => array("type"=>"text"    , "isnull"=>true  ,"value"=>"","label"=>"Nombre")
        );

        public function __construct(){
            parent::__construct();
            $this->tableName = "prv";
            $this->tableDescription = "Proveedores";
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

    function getPrvTable(){
        return ( PrvModel::myself() );
    }

}
?>