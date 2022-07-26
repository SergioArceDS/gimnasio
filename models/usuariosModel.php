<?php
include_once 'models/usuario.php';
    class usuariosModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        function verificarUsuario($usuario){
            $query = $this->db->connect()->prepare("SELECT COUNT(*) AS total FROM usuarios WHERE username = :usuario");
            try{
                $query->execute(['usuario' => $usuario]);
                $registro = $query->fetch();
                return $registro;
            }catch(PDOStatement $e){
                return false;
            }
        }

        function crearUsuario($nombre, $usuario, $contrasenia){
            $query = $this->db->connect()->prepare("INSERT INTO `gimnasio`.`usuarios` (`nombre`, `username`, `password`) VALUES (:nombre, :usuario, :contrasenia);");
            try{
                $query->execute(['nombre' => $nombre, 'usuario' => $usuario, 'contrasenia' => $contrasenia]);
            }catch(PDOStatement $e){
                return false;
            }
        }

        function getUsuarios(){
            $usuarios = [];
            try{

                $query = $this->db->connect()->query("SELECT * FROM usuarios");
                while($row = $query->fetch()){
                    $usuario = new Usuario();
                    $usuario->id_usuario = $row['id_usuario'];
                    $usuario->nombre = $row['nombre'];
                    $usuario->username = $row['username'];

                    array_push($usuarios, $usuario);
                }

                return $usuarios;
            }catch(PDOStatement $e){
                return [];
            }
            
        }

        function getDatosUsuario($id){
            $query = $this->db->connect()->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
            try{
                $query->execute(['id' => $id]);
                $registro = $query->fetch();
                return $registro;
            }catch(PDOStatement $e){
                return false;
            }
        }

        function actualizarUsuario($nombre, $username, $contrasenia, $id_usuario){
            $query = $this->db->connect()->prepare("UPDATE `gimnasio`.`usuarios` SET `nombre` = :nombre, `username` = :username, `password` = :password WHERE (`id_usuario` = :id_usuario);");
            try{
                $query->execute(['nombre' => $nombre, 'username' => $username, 'password' => $contrasenia, 'id_usuario' => $id_usuario]);
            }catch(PDOStatement $e){
                return false;
            }
        }

        function eliminarUsuario($id){
            $query = $this->db->connect()->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
            try{
                $query->execute(['id' => $id]);
            }catch(PDOStatement $e){
                return false;
            }
        }
    }

?>