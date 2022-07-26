<?php
require_once 'config/config.php';

    class IniciadorController{
        
        function __construct()
        {
            session_start();
        }

        public function redireccionar(){ //Redirecciona al login si el usuario no se ha logeado
            header('location:'. constant('URL') . 'login');
        }

    }

    
?>