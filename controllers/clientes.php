<?php
require_once 'controllers/iniciadorController.php';
include_once 'models/membresiasModel.php';
$ic = new IniciadorController();
if(empty($_SESSION['nombre'])){
    
    $ic->redireccionar();
}

    class Clientes extends Controller{

        private $paginaActual;
        private $totalPaginas;
        private $nResultados;
        private $resultadosPorPagina; 
        private $indice;

        function __construct()
        {
            parent::__construct();
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
            
            $modeloMembresias = new membresiasModel();
            $membresias = $modeloMembresias->getMembresias();
            $this->view->membresias = $membresias;
            $this->calcularPaginas();
            $clientes = $this->modelo->getClientes($this->indice, $this->resultadosPorPagina);
            $this->view->clientes = $clientes;

            
            $this->view->totalPaginas = $this->totalPaginas;
            $this->view->actual = $this->paginaActual;
            $this->view->render('clientes/index');
        }

        

        function registrarCliente(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $celular = $_POST['celular'];
            $edad = $_POST['edad'];
            $idMembresia = $_POST['membresias'];
            $fechaInscripcion = $_POST['fechaInscripcion'];
            $fechaVencimiento = $_POST['fechaVencimiento'];

            $this->modelo->insertarCliente([
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'peso' => $peso,
                'altura' => $altura,
                'celular' => $celular,
                'edad' => $edad,
                'idMembresia' => $idMembresia,
                'fechaInscripcion' => $fechaInscripcion,
                'fechaVencimiento' => $fechaVencimiento
            ]);

            header('location:'. constant('URL') . 'clientes');
        }

        function getDatosCliente($param = null){
            $idCliente = $param[0];

            if($this->modelo->getDatosCliente($idCliente) != false){
                $datosCliente = $this->modelo->getDatosCliente($idCliente);
                echo json_encode($datosCliente);
            }
            
        }

        function editarCliente(){
            
            $idCliente = $_POST['idCliente'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $celular = $_POST['celular'];
            $edad = $_POST['edad'];

            $this->modelo->actualizarInfoCliente($idCliente, $nombre, $apellidos, $peso, $altura, $celular, $edad);
            header('location:'. constant('URL') . 'clientes');
            
        }

        function eliminarCliente(){
            $id = $_POST['idEliminar'];
            
            $this->modelo->delete($id);
            header('location:'. constant('URL') . 'clientes');
        }


    }

?>