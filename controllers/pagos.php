<?php
require_once 'controllers/iniciadorController.php';
include_once 'models/membresiasModel.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Pagos extends Controller{

        private $paginaActual;
        private $totalPaginas;
        private $nResultados;
        private $resultadosPorPagina; 
        private $indice;

        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "";
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
            $modeloMembresias = new membresiasModel();
            $membresias = $modeloMembresias->getMembresias();
            $this->view->membresias = $membresias;
            $this->calcularPaginas();
            
            $this->view->totalPaginas = $this->totalPaginas;
            $this->view->actual = $this->paginaActual;
            $pagos = $this->modelo->getPagos($this->indice, $this->resultadosPorPagina);
            $this->view->pagos = $pagos;
            $this->view->render('pagos/index');
            
        }

        function datosCliente(){
            
            $idCliente = $_POST['btn-buscar'];
            if($this->modelo->getDatosCliente($idCliente) == false){
                $this->view->mensaje = "No existe el cliente.";
                $this->render();
            }else{
                $modeloMembresias = new membresiasModel();
                $membresias = $modeloMembresias->getMembresias();
                $this->view->membresias = $membresias;
                $this->calcularPaginas();
            
                $this->view->totalPaginas = $this->totalPaginas;
                $this->view->actual = $this->paginaActual;

                $pagos = $this->modelo->getPagos($this->indice, $this->resultadosPorPagina);
                $this->view->pagos = $pagos;

                $datosCliente = $this->modelo->getDatosCliente($idCliente);
                $this->view->datosCliente = $datosCliente;
                $this->view->render('pagos/registrarPago');
            }   
        }

        function registrarPago($param = null){
            $idCliente = $param[0];
            $fechaDePago = $_POST['pago_fecha-pago'];
            $nuevaFechaVencimiento = $_POST['pago_fecha-vencimiento'];
            $membresia = $_POST['membresias'];

            if($this->modelo->efectuarPago([
                'id_cliente' => $idCliente,
                'fecha_pago' => $fechaDePago,
                'nueva_fecha_vencimiento' => $nuevaFechaVencimiento,
                'id_membresia' => $membresia
            ])){
                header('location: ' . constant('URL') . 'pagos');
            }

        }

    }

?>