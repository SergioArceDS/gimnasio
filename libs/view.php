<?php 

    class View{

        function __construct()
        {
            
        }

        function render($nombreVista){
            require_once 'views/' . $nombreVista . '.php';
        }
    }

?>