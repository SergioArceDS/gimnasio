<?php
require_once 'controllers/iniciadorController.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Usuarios extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "";
        }

        function render(){
            $usuarios = $this->modelo->getUsuarios();
            $this->view->usuarios = $usuarios;
            $this->view->render('usuarios/index');
        }

        function crearUsuario(){
            $nombre = $_POST['nombreUsuario'];
            $usuario = $_POST['username'];
            $contrasenia = $_POST['password'];
            $confirmarContrasenia = $_POST['confirmPassword'];

            $registro = $this->modelo->verificarUsuario($usuario);
            if($registro['total'] == 0){
                if($contrasenia == $confirmarContrasenia){
                    $contraseniaEncriptada = password_hash($contrasenia, PASSWORD_DEFAULT, ['cost' => 10]);
                    $this->modelo->crearUsuario($nombre, $usuario, $contraseniaEncriptada);
                    header('location: ' . constant('URL') . 'usuarios');
                }else{
                    $this->view->mensaje = "Las contraseñas no coinciden.";
                    $this->render();
                }
            }else{
                $this->view->mensaje = "Ya existe un registro con el mismo nombre de usuario.";
                $this->render();
            }
        }

        function renderUsuarios($id_usuario){
            $registro = $this->modelo->getDatosUsuario($id_usuario);
            $this->view->usuario = $registro;
            $usuarios = $this->modelo->getUsuarios();
            $this->view->usuarios = $usuarios;
            $this->view->render('usuarios/editarUsuario');
        }

        function verUsuario($param = null){
            $id = $param[0];
            if($id == 1){

                $this->view->mensaje = "Este usuario no puede ser editado.";
                $this->render();
            }

            $registro = $this->modelo->getDatosUsuario($id);
            $this->view->usuario = $registro;
            $usuarios = $this->modelo->getUsuarios();
            $this->view->usuarios = $usuarios;
            $this->view->render('usuarios/editarUsuario');
        }

        function editarUsuario(){
            $id_usuario = $_POST['idUsuario'];
            $nombre = $_POST['nombreUsuario'];
            $username = $_POST['username'];
            $currentPassword = $_POST['currentPassword'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            $usuario = $this->modelo->getDatosUsuario($id_usuario);
            
            if(password_verify($currentPassword, $usuario['password'])){
                if($newPassword == $confirmPassword){
                    $contraseniaEncriptada = password_hash($newPassword, PASSWORD_DEFAULT, ['cost' => 10]); 
                    $this->modelo->actualizarUsuario($nombre, $username, $contraseniaEncriptada, $id_usuario);
                    header('location: ' . constant('URL') . 'usuarios');
                }else{
                    $this->view->mensaje = "Las contraseñas no coinciden.";
                    $this->renderUsuarios($id_usuario);
                }
            }else{
                $this->view->mensaje = "Contraseña actual incorrecta.";
                $this->renderUsuarios($id_usuario);
            }
        }

        function eliminarUsuario(){
            $id = $_POST['idEliminar'];
            if($id == 1){
                $this->view->mensaje = "Este usuario no puede ser eliminado.";
                $this->render();
            }else{
                $this->modelo->eliminarUsuario($id);
                header('location: ' . constant('URL') . 'usuarios');
            }
        }
    }

?>