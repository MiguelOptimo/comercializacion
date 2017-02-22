<?php
/**
 * CxcController
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

require 'models/CxcModel.php';
class CxcController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Cuentas por cobrar');
        $this->primarytable = 'Cxc';
    }
    public function trigger_upd_before(){
        $this->view->assign('page_header', 'Editar Cuenta por cobrar');
    }
    public function trigger_sel_before(){
        $this->view->assign('page_header', 'Listado de Cuenta por cobrar');
    }

}
?>
