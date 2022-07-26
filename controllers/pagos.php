<?php
require_once 'controllers/iniciadorController.php';
include_once 'models/membresiasModel.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Pagos extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->view->mensaje = "";
            
        }

        function render(){
            $modeloMembresias = new membresiasModel();
            $membresias = $modeloMembresias->getMembresias();
            $this->view->membresias = $membresias;
            
            $pagos = $this->modelo->getPagos();
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

                $pagos = $this->modelo->getPagos();
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