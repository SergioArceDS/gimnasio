<?php
include_once 'models/cliente.php';
    class clientesModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        public function calcularPaginas(){
            $query = $this->db->connect()->query("SELECT COUNT(*) AS total FROM clientes");
            $resultado = $query->fetch(PDO::FETCH_OBJ)->total;

            return $resultado;
        }

        public function insertarCliente($datos){
            $pdo = $this->db->connect();
            $query = $pdo->prepare('INSERT INTO clientes (nombre_cliente, apellidos, peso, altura, celular, edad) VALUES (:nombre_cliente, :apellidos, :peso, :altura, :celular, :edad)');
            $query->execute(['nombre_cliente' => $datos['nombre'], 'apellidos' => $datos['apellidos'], 'peso' => $datos['peso'], 'altura' => $datos['altura'], 'celular' => $datos['celular'], 'edad' => $datos['edad']]);
        
            $id = $pdo->lastInsertId();
            $query2 = $pdo->prepare('INSERT INTO cliente_membresia (id_cliente, id_membresia, fecha_inscripcion, fecha_vencimiento) VALUES (:id_cliente, :id_membresia, :fecha_inscripcion, :fecha_vencimiento)');
            $query2->execute(['id_cliente' => $id, 'id_membresia' =>$datos['idMembresia'], 'fecha_inscripcion' => $datos['fechaInscripcion'], 'fecha_vencimiento' => $datos['fechaVencimiento']]);
        
        }

        public function getClientes($pos, $n){

            $clientes = [];
            try{
                $query = $this->db->connect()->prepare("CALL gimnasio.LISTAR_CLIENTES(:pos, :n)");
                $query->execute(['pos' => $pos, 'n' => $n]);
                while($row = $query->fetch()){
                    $cliente = new Cliente();
                    $cliente->id_cliente = $row['id_cliente'];
                    $cliente->nombre_cliente = $row['nombre_cliente'];
                    $cliente->apellidos = $row['apellidos'];
                    $cliente->peso = $row['peso'];
                    $cliente->altura = $row['altura'];
                    $cliente->celular = $row['celular'];
                    $cliente->edad = $row['edad'];
                    $cliente->id_membresia = $row['id_membresia'];
                    $cliente->nombre_membresia = $row['nombre'];
                    $cliente->fecha_inscripcion = $row['fecha_inscripcion'];
                    $cliente->fecha_vencimiento = $row['fecha_vencimiento'];

                    array_push($clientes, $cliente);
                }

                    return $clientes;
            }catch(PDOStatement $e){
                return [];
            }
        }

        function buscarPorNombre($nombre){
            $clientes = [];
            $query = $this->db->connect()->prepare("CALL BUSCAR_CLIENTE_NOMBRE(:nombre)");
            try{
                $query->execute(['nombre' => $nombre]);
                while($row = $query->fetch()){
                    $cliente = new Cliente();
                    $cliente->id_cliente = $row['id_cliente'];
                    $cliente->nombre_cliente = $row['nombre_cliente'];
                    $cliente->apellidos = $row['apellidos'];
                    $cliente->peso = $row['peso'];
                    $cliente->altura = $row['altura'];
                    $cliente->celular = $row['celular'];
                    $cliente->edad = $row['edad'];
                    $cliente->id_membresia = $row['id_membresia'];
                    $cliente->nombre_membresia = $row['nombre'];
                    $cliente->fecha_inscripcion = $row['fecha_inscripcion'];
                    $cliente->fecha_vencimiento = $row['fecha_vencimiento'];

                    array_push($clientes, $cliente);
                }

                return $clientes;

            }catch(PDOStatement $e){
                return [];
            }
        }

        function getDatosCliente($id){
            $query = $this->db->connect()->prepare('SELECT * FROM clientes WHERE id_cliente = :id_cliente');
            try{
                $query->execute([
                    'id_cliente' => $id
                ]);
                $registro = $query->fetch(PDO::FETCH_ASSOC);
                if($registro != null){
                    return $registro;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return false;
            }
        }

        function actualizarInfoCliente($idCliente, $nombre, $apellidos, $peso, $altura, $celular, $edad){
            $query = $this->db->connect()->prepare("UPDATE `gimnasio`.`clientes` SET `nombre_cliente` = :nombre, `apellidos` = :apellidos, `peso` = :peso, `altura` = :altura, `celular` = :celular, `edad` = :edad WHERE (`id_cliente` = :id_cliente);");
            try{
                $query->execute([
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'peso' => $peso,
                    'altura' => $altura,
                    'celular' => $celular,
                    'edad' => $edad,
                    'id_cliente' => $idCliente
                ]);
            }catch(PDOStatement $e){
                return false;
            }
        }

        public function delete($id_cliente){
            $query = $this->db->connect()->prepare('DELETE FROM clientes WHERE id_cliente = :id_cliente');
            try{
                $query->execute([
                    'id_cliente' => $id_cliente
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }

?>