<?php
require_once 'controllers/iniciadorController.php';

$ic = new IniciadorController();

    class Login extends Controller{

        function __construct()
        {
            
            parent::__construct();
            $this->view->mensaje = " ";
            
        }

        function render(){
            $this->view->render('login/index');
        }

        function verificarCredenciales(){
            
            $username = $_POST['username'];
            $password = $_POST['password']; //admin12345 contraseña por defecto
            
            $respuesta = $this->modelo->verificarLogin($_POST['username'], $_POST['password']);
            if($respuesta == true){
                header('location: '. constant('URL'));
            }else{
                $this->view->mensaje = "Nombre de usuario o contraseña incorrectos.";
                $this->render();
            }

            
        }

        function logout(){
            session_destroy();
            header('location:'. constant('URL') . 'login');
        }

    }

?>