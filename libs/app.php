<?php
require_once 'controllers/errores.php';

    class App{

        function __construct()
        {

            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            
            //Si se ingresa sin definir el controlador 
            if(empty($url[0])){
                $archivoControlador = 'controllers/main.php';
                require_once $archivoControlador;
                $controlador = new Main;
                $controlador->cargarModelo('main');
                $controlador->render();
                return false;
            }

            $archivoControlador = 'controllers/' . $url[0] . '.php';
            
            if(file_exists($archivoControlador)){
                require_once $archivoControlador;

                //Se inicializa el controlador
                $controlador = new $url[0];
                $controlador->cargarModelo($url[0]);

                 // Elementos del arreglo
                $nparam = sizeof($url);

                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controlador->{$url[1]}($param);
                    }else{
                        $controlador->{$url[1]}();
                    }
                }else{
                    $controlador->render();
                }
            }else{
                $controlador = new Errores();
            }
        }
    }

?>