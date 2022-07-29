<?php
include_once 'models/venta.php';
    class ventasModel extends Model{

        function __construct()
        {
            parent::__construct();
            
        }

        function calcularPaginas(){
            $query = $this->db->connect()->query("SELECT COUNT(*) AS total FROM venta_producto");
            $resultado = $query->fetch(PDO::FETCH_OBJ)->total;

            return $resultado;
        }

        function verificarProducto($id_producto){
            $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE id_producto = :id_producto");
            try{
                $query->execute(['id_producto' => $id_producto]);
                $registro = $query->fetch(PDO::FETCH_ASSOC);
                if($registro != null){
                    return $registro;
                }else{
                    return false;
                }
            }catch(PDOStatement $e){
                return false;
            }
        }

        function registrarVenta($nombreComprador, $cantidad, $fechaVenta, $idProducto){

            $query = $this->db->connect()->prepare("INSERT INTO `gimnasio`.`venta_producto` (`nombre_comprador`, `cantidad`, `fecha_venta`, `id_producto`) VALUES (:nombre_comprador, :cantidad, :fecha_venta, :id_producto);");
            try{
                $query->execute(['nombre_comprador' => $nombreComprador, 'cantidad' => $cantidad, 'fecha_venta' => $fechaVenta, 'id_producto' => $idProducto]);

            }catch(PDOStatement $e){
                return false;
            }
        }

        function getVentas($pos, $n){

            $ventas = [];
            try{

                $query = $this->db->connect()->prepare("SELECT venta_producto.*, productos.nombre, (productos.costo * venta_producto.cantidad) as total FROM venta_producto, productos WHERE venta_producto.id_producto = productos.id_producto LIMIT :pos, :n;");
                $query->execute(['pos' => $pos, 'n' => $n]);
                while($row = $query->fetch()){
                    $venta = new Venta();
                    $venta->id_venta = $row['idventa_producto'];
                    $venta->nombre_comprador = $row['nombre_comprador'];
                    $venta->cantidad = $row['cantidad'];
                    $venta->fecha_venta = $row['fecha_venta'];
                    $venta->id_producto = $row['id_producto'];
                    $venta->nombre_producto = $row['nombre'];
                    $venta->total = $row['total'];

                    array_push($ventas, $venta);
                }

                return $ventas;
            }catch(PDOStatement $e){
                return [];
            }
            
        }
    }

?>