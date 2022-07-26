<?php
require_once 'controllers/iniciadorController.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Ventas extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "";
            
        }

        function render(){
            $ventas = $this->modelo->getVentas();
            $this->view->ventas = $ventas;
            $this->view->render('ventas/index');
        }
        
        function registrarVenta(){

            $nombreComprador = $_POST['nombreComprador'];
            $cantidad = $_POST['cantidad'];
            $fecha_venta = $_POST['fechaVenta'];
            $id_producto = $_POST['idProducto'];

            $registro = $this->modelo->verificarProducto($id_producto);

            if($registro != false){
                if($registro['cantidad_disponible'] != 0){
                    if($cantidad > $registro['cantidad_disponible']){
                        $this->view->mensaje = "Stock insuficiente para la venta, pruebe con otra cantidad.";
                        $this->render();
                    }else{
                        $this->modelo->registrarVenta($nombreComprador, $cantidad, $fecha_venta, $id_producto);
                        header('location: ' . constant('URL') . 'ventas');
                    }
                }else{
                    $this->view->mensaje = "No hay stock.";
                    $this->render();
                }
            }else{
                
                $this->view->mensaje = "No existe el producto.";
                $this->render();
            }
            
        }
    }

?>