<?php

    class mainModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        function getDatosInicio(){
            
            $queryUsuarios = $this->db->connect()->query("SELECT COUNT(*) as total_usuarios FROM usuarios");
            $usuarios = $queryUsuarios->fetch(PDO::FETCH_ASSOC);

            $queryVentasMembresias = $this->db->connect()->query("SELECT SUM(membresias.precio) as total FROM membresias, cliente_membresia WHERE membresias.id_membresia = cliente_membresia.id_membresia AND month(cliente_membresia.fecha_inscripcion) = month(now());");
            $ventasMembresias = $queryVentasMembresias->fetch(PDO::FETCH_ASSOC);

            $queryVentasProductos = $this->db->connect()->query("SELECT SUM((productos.costo * venta_producto.cantidad)) as total FROM venta_producto, productos WHERE venta_producto.id_producto = productos.id_producto AND month(venta_producto.fecha_venta) = month(now());");
            $ventasProductos = $queryVentasProductos->fetch(PDO::FETCH_ASSOC);

            $queryClientes = $this->db->connect()->query("SELECT COUNT(*) as total_clientes FROM clientes");
            $clientes = $queryClientes->fetch(PDO::FETCH_ASSOC);

            $queryProductos = $this->db->connect()->query("SELECT COUNT(*) as total_productos FROM productos");
            $productos = $queryProductos->fetch(PDO::FETCH_ASSOC);
            
            return [
                'total_usuarios' => $usuarios['total_usuarios'], 
                'total_ganancias_mes' => $ventasMembresias['total'] + $ventasProductos['total'],  
                'total_clientes' => $clientes['total_clientes'],
                'total_productos' => $productos['total_productos'] 
            ];
        }

        function getDatosGimnasio(){
            $query = $this->db->connect()->query("SELECT * FROM configuracion");
            $configuracion = $query->fetch(PDO::FETCH_ASSOC);

            return $configuracion;
        }

        function actualizarInformacion($nombre, $direccion, $telefono, $correo){
            $query = $this->db->connect()->prepare("UPDATE `gimnasio`.`configuracion` SET `nombre_gimnasio` = :nombre, `direccion` = :direccion, `telefono` = :telefono, `correo` = :correo WHERE (`id_configuracion` = 1);");
            try{
                $query->execute(['nombre' => $nombre, 'direccion' => $direccion, 'telefono' => $telefono, 'correo' => $correo]);
            }catch(PDOStatement $e){
                return false;
            }
        }

        function actualizarImagen($nombre_imagen){
            $query = $this->db->connect()->prepare("UPDATE `gimnasio`.`configuracion` SET `imagen` = :nombre_imagen WHERE (`id_configuracion` = '1');");
            try{
                $query->execute(['nombre_imagen' => $nombre_imagen]);
            }catch(PDOStatement $e){
                return false;
            }
        }
    }

?>