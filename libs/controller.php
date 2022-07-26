<?php 

    class Controller{

        function __construct()
        {
            $this->view = new View();
        }

        function cargarModelo($modelo){
            $url = 'models/' . $modelo . 'Model.php';

            if(file_exists($url)){
                require_once $url;

                $nombreModelo = $modelo.'Model'; 
                $this->modelo = new $nombreModelo();
            }
        }

    }

?>