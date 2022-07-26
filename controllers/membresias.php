<?php
require_once 'controllers/iniciadorController.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Membresias extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->view->membresias = [];
        }

        function render(){
            $membresias = $this->modelo->getMembresias();
            $this->view->membresias = $membresias;
            $this->view->render('membresias/index');
        }

        public function nuevaMembresia(){
            
            $nombre = $_POST['nombreMembresia'];
            $precio = $_POST['precioMembresia'];
            $duracion = $_POST['duracionMembresia'];

            $this->modelo->insertarMembresia(['nombreMembresia' => $nombre, 'precioMembresia' => $precio, 'duracionMembresia' =>$duracion]);
            header('location:'. constant('URL') . 'membresias');
        }

        function verMembresia($param = null){
            $membresias = $this->modelo->getMembresias();
            $this->view->membresias = $membresias;
            $idMembresia = $param[0];
            $membresia = $this->modelo->getById($idMembresia);
            
            $this->view->membresia = $membresia;
            $this->view->mensaje = "";
            $this->view->render('membresias/detalle');
        }

        function actualizarMembresia(){
            $id_membresia = $_POST['idMembresia'];
            $nombre = $_POST['nombreMembresia'];
            $precio = $_POST['precioMembresia'];
            $duracion = $_POST['duracionMembresia'];

            if($this->modelo->update(['id_membresia' => $id_membresia, 'nombre' => $nombre, 'precio' => $precio, 'duracion' => $duracion])){
                
                header('location: ' . constant('URL') . 'membresias');

            }else{
                $this->view->mensaje = "No se pudo actualizar la membresia";
                $this->view->render('membresias/detalle');
            }
            
        }

        function eliminarMembresia(){
           $id_membresia = $_POST['idEliminar'];
            $this->modelo->delete($id_membresia);
            header('location: ' . constant('URL') . 'membresias');
        }

    }

?>