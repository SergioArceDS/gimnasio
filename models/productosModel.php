<?php
include_once 'models/producto.php';
    class productosModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        function getProductos(){
            $productos = [];
            try{
                $query = $this->db->connect()->query("SELECT * FROM productos");
                while($row = $query->fetch()){
                    $producto = new Producto();
                    $producto->id_producto = $row['id_producto'];
                    $producto->nombre_producto = $row['nombre'];
                    $producto->cantidad_disponible = $row['cantidad_disponible'];
                    $producto->costo = $row['costo'];
                    $producto->descripcion = $row['descripcion'];
                    $producto->fecha_agregacion = $row['fecha_agregacion'];

                    array_push($productos, $producto);
                }

                return $productos;
            }catch(PDOStatement $e){
                return [];
            }
            
        }

        function agregarProducto($nombreProducto, $cantidad, $costo, $descripcion){
            $query = $this->db->connect()->prepare("INSERT INTO `gimnasio`.`productos` (`nombre`, `cantidad_disponible`, `costo`, `descripcion`) VALUES (:nombre, :cantidad_disponible, :costo, :descripcion);");
            try{
                $query->execute(['nombre' => $nombreProducto, 'cantidad_disponible' => $cantidad, 'costo' => $costo, 'descripcion' => $descripcion]);
            }catch(PDOStatement $e){
                return false;
            }
        }

        function eliminarProducto($id){
            $query = $this->db->connect()->prepare("DELETE FROM productos WHERE id_producto = :id_producto");
            try{
                $query->execute(['id_producto' => $id]);
            }catch(PDOStatement $e){
                return false;
            }
        }

        function getProducto($id){
            $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE id_producto = :id_producto");
            try{
                $query->execute(['id_producto' => $id]);
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

        function editarProducto($id, $nombre, $cantidad, $costo, $descripcion){
            $query = $this->db->connect()->prepare("UPDATE `gimnasio`.`productos` SET `nombre` = :nombre, `cantidad_disponible` = :cantidad_disponible, `costo` = :costo, `descripcion` = :descripcion WHERE (`id_producto` = :id_producto);");
            try{
                $query->execute(['nombre' => $nombre, 'cantidad_disponible' => $cantidad, 'costo' => $costo, 'descripcion' => $descripcion, 'id_producto' => $id]);
            }catch(PDOStatement $e){
                return false;
            }
        }
    }

?>