<?php
/**
 * ExampleController
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

require 'models/ExampleModel.php';
class ExampleController extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->assign('title', 'Example');
        $this->primarytable = 'Example';
    }
    public function trigger_upd_before(){
        $this->view->assign('page_header', 'Editar Example');
    }
    public function trigger_sel_before(){
        $this->view->assign('page_header', 'Listado de Example');
    }

}
?>
