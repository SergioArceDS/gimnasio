<?php 

    class pagosModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        function calcularPaginas(){
            $query = $this->db->connect()->query("SELECT COUNT(*) AS total FROM cliente_membresia");
            $resultado = $query->fetch(PDO::FETCH_OBJ)->total;

            return $resultado;
        }

        function getPagos($pos, $n){

            $pagos = [];

            try{
                $query = $this->db->connect()->prepare("SELECT cliente_membresia.*, membresias.precio FROM gimnasio.cliente_membresia, membresias WHERE cliente_membresia.id_membresia = membresias.id_membresia LIMIT :pos, :n");
                $query->execute(['pos' => $pos, 'n' => $n]);
                while($row = $query->fetch()){
                    $pago = new Pagos();
                    $pago->id_pago = $row['idcliente_membresia'];
                    $pago->id_cliente = $row['id_cliente'];
                    $pago->id_membresia = $row['id_membresia'];
                    $pago->fecha_inscripcion = $row['fecha_inscripcion'];
                    $pago->fecha_vencimiento = $row['fecha_vencimiento'];
                    $pago->monto = $row['precio'];

                    array_push($pagos, $pago);
                }

                return $pagos;
            }catch(PDOStatement $e){
                return [];
            }
        }

        function getDatosCliente($id){
            $query = $this->db->connect()->prepare("SELECT clientes.*, cliente_membresia.fecha_vencimiento FROM clientes, cliente_membresia WHERE clientes.id_cliente = cliente_membresia.id_cliente AND clientes.id_cliente = :id_cliente");
            try{
                $query->execute(['id_cliente' => $id]);
                $registro = $query->fetch(PDO::FETCH_ASSOC);
                if($registro != null){
                    return $registro;
                }else{
                    return false;
                }
                
            }catch(PDOStatement $e){
                
            } 
        }

        function efectuarPago($infoPago){
            $query = $this->db->connect()->prepare("UPDATE `gimnasio`.`cliente_membresia` SET `id_membresia` = :id_membresia, `fecha_inscripcion` = :fecha_pago, `fecha_vencimiento` = :nuevaFechaVencimiento WHERE (`idcliente_membresia` = :id_cliente);");
            try{
                $query->execute(['id_membresia' =>$infoPago['id_membresia'], 'fecha_pago' => $infoPago['fecha_pago'], 'nuevaFechaVencimiento' => $infoPago['nueva_fecha_vencimiento'], 'id_cliente' => $infoPago['id_cliente']]);
                return true;
            }catch(PDOStatement $e){
                return false;
            }
        }
    }

?>