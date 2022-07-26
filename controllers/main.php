<?php
require_once 'controllers/iniciadorController.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Main extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "";
            $this->view->usuarios = [];
            $this->view->configuracion = [];
        }

        function render(){
            $usuarios = $this->modelo->getDatosInicio();
            $this->view->usuarios = $usuarios;
            $configuracion = $this->modelo->getDatosGimnasio();
            $this->view->configuracion = $configuracion;
            $this->view->render('main/index');
        }

        function actualizarInformacion(){
            $nombre = $_POST['nombre_gimnasio'];
            $direccion = $_POST['direccion_gimnasio'];
            $telefono = $_POST['telefono_gimnasio'];
            $correo = $_POST['correo_gimnasio'];

            $this->modelo->actualizarInformacion($nombre, $direccion, $telefono, $correo);
            header('location: ' . constant('URL') . 'main');
        }

        function actualizarImagen(){
            $directorio = "img/";

            $archivo = $directorio . basename($_FILES['logo_gimnasio']['name']);
            
            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            $size = getimagesize($_FILES['logo_gimnasio']['tmp_name']);
            //Comprobar si el archivo es una imagen
            if($size != false){
                 if($size[0] > 800 || $size[1] > 900){
                    $this->view->mensaje = "La imagen es muy grande, intenta con una de menores dimensiones.";
                    $this->render();
                 }else{
                    //Se valida el tipo de imagen
                    if($tipoArchivo == 'jpg' || $tipoArchivo == 'jpeg' || $tipoArchivo == 'png'){
                        
                        if(move_uploaded_file($_FILES['logo_gimnasio']['tmp_name'], $archivo)){
                            $this->modelo->actualizarImagen($_FILES['logo_gimnasio']['name']);
                            header('location: ' . constant('URL') . 'main');
                        }else{
                            $this->view->mensaje = "Hubo un error al subir el archivo.";
                            $this->render();
                        }
                    }else{
                        $this->view->mensaje = "Solo se admiten archivos jpg/jpeg o png.";
                        $this->render();
                    }
                 }
                 
            }else{
                $this->view->mensaje = "El archivo no es una imagen.";
                $this->render();
            }
        }
    }

?>