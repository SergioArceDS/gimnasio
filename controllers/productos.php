<?php
require_once 'controllers/iniciadorController.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Productos extends Controller{

        function __construct()
        {
            parent::__construct();
            
        }

        function render(){
            $productos = $this->modelo->getProductos();
            $this->view->productos = $productos;
            $this->view->render('productos/index');
        }

        function agregarProducto(){
            $nombreProducto = $_POST['nombreProducto'];
            $cantidad = $_POST['cantidad'];
            $costo = $_POST['costo'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->agregarProducto($nombreProducto, $cantidad, $costo, $descripcion);
            header('location: ' . constant('URL') . 'productos');
        }

        function eliminarProducto(){
            $id = $_POST['idEliminar'];

            $this->modelo->eliminarProducto($id);
            header('location: ' . constant('URL') . 'productos');
        }

        function getDatosProducto($param = null){
            $id = $param[0];
            if($this->modelo->getProducto($id) != false){
                $datosProducto = $this->modelo->getProducto($id);
                echo json_encode($datosProducto);
            }
        }

        function editarProducto(){
            $id = $_POST['idProducto'];
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $costo = $_POST['costo'];
            $descripcion = $_POST['descripcion'];

            $this->modelo->editarProducto($id, $nombre, $cantidad, $costo, $descripcion);
            header('location: ' . constant('URL') . 'productos');
        }

    }

?>