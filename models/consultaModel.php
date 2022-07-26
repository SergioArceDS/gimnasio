<?php
include_once 'models/membresia.php';
    class clientesModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        public function getMembresias(){
            $membresias = [];

            try{
                $query = $this->db->connect()->query('SELECT * FROM membresias');

                while($row = $query->fetch()){
                    $membresia = new Membresia();
                    $membresia->nombre = $row['nombre'];
                    $membresia->duracion = $row['meses_duracion'];
                    $membresia->precio = $row['precio'];
                    $membresia->fecha_creacion = $row['fecha_creacion'];

                    array_push($membresias, $membresia);

                    return $membresias;
                }
            }catch(PDOStatement $e){
                return [];
            }
        }
    }

?>