<?php
require_once 'controllers/iniciadorController.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Ventas extends Controller{

        private $paginaActual;
        private $totalPaginas;
        private $nResultados;
        private $resultadosPorPagina; 
        private $indice;

        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "";
            $this->view->totalPaginas = 0;
            $this->view->actual = 0;
            $this->resultadosPorPagina = 10;
            $this->indice = 0;
            $this->paginaActual = 1;
            
        }

        function calcularPaginas(){
            $this->nResultados = $this->modelo->calcularPaginas();
            $this->totalPaginas = round($this->nResultados / $this->resultadosPorPagina, PHP_ROUND_HALF_UP);
            if(isset($_GET['pagina'])){
                $this->paginaActual = $_GET['pagina'];
                $this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);
                  
            }
        }

        function render(){
            $this->calcularPaginas();
            $ventas = $this->modelo->getVentas($this->indice, $this->resultadosPorPagina);
            $this->view->ventas = $ventas;
            $this->view->totalPaginas = $this->totalPaginas;
            $this->view->actual = $this->paginaActual;
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