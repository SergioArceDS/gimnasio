<?php

    class loginModel extends Model{

        function __construct()
        {
            parent::__construct();
        }

        public function verificarLogin($user, $pass){
            $query = $this->db->connect()->prepare('SELECT * FROM usuarios WHERE username = :username');
            $query->execute(['username' => $user]);
            $datosUsuario = $query->fetchAll(PDO::FETCH_OBJ);

            if($datosUsuario != false){
                foreach($datosUsuario as $usuario){}
                
                if(password_verify($pass, $usuario->password)){
                    $_SESSION['nombre'] = $usuario->nombre; 
                    $_SESSION['username'] = $usuario->username;
                    $_SESSION['password'] = $usuario->password;
                    
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return false;
            }
            
        }
    }

?>