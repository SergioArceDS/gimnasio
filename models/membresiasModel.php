<?php
include_once 'models/membresia.php';
    class membresiasModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        public function insertarMembresia($datos){
            $query = $this->db->connect()->prepare('INSERT INTO membresias (nombre, meses_duracion, precio) VALUES (:nombreMembresia, :duracionMembresia, :precioMembresia)');
            $query->execute(['nombreMembresia' => $datos['nombreMembresia'], 'duracionMembresia' => $datos['duracionMembresia'], 'precioMembresia' => $datos['precioMembresia']]);
            
        }

        public function getMembresias(){
            $membresias = [];

            try{
                $query = $this->db->connect()->query("SELECT*FROM membresias");

                while($row = $query->fetch()){
                    $item = new Membresia();
                    $item->id_membresia = $row['id_membresia'];
                    $item->nombre = $row['nombre'];
                    $item->duracion    = $row['meses_duracion'];
                    $item->precio  = $row['precio'];
                    $item->fecha_creacion = $row['fecha_creacion'];

                    array_push($membresias, $item);
                }

                    return $membresias;

                }catch(PDOStatement $e){

                    return [];
                }
        }

        function getById($id){
            $membresia = new Membresia();

            $query = $this->db->connect()->prepare('SELECT * FROM membresias WHERE id_membresia = :id_membresia');
            try{
                
                $query->execute(['id_membresia' => $id]);
                while($row = $query->fetch()){
                    $membresia->id_membresia = $row['id_membresia'];
                    $membresia->nombre = $row['nombre'];
                    $membresia->duracion    = $row['meses_duracion'];
                    $membresia->precio  = $row['precio'];
                    $membresia->fecha_creacion = $row['fecha_creacion'];

                    return $membresia;
                }
            }catch(PDOException $e){
                return null;
            }
        }

        public function update($membresia){
            $query = $this->db->connect()->prepare('UPDATE membresias SET nombre = :nombre, meses_duracion = :meses_duracion, precio = :precio WHERE id_membresia = :id_membresia');
            try{
                $query->execute([
                    'nombre' => $membresia['nombre'],
                    'meses_duracion' => $membresia['duracion'],
                    'precio' => $membresia['precio'],
                    'id_membresia' => $membresia['id_membresia']
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }

        public function delete($id){
            $query = $this->db->connect()->prepare('DELETE FROM membresias WHERE id_membresia = :id_membresia');
            try{
                $query->execute([
                    'id_membresia' => $id
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }

?>