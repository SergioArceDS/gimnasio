<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>css/login.css">

    <title>GYM</title>


    <link href="<?php echo constant('URL'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link href="<?php echo constant('URL'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

     
        <div class="row justify-content-center">

                <div class="card  border-0 shadow-lg my-5" style="width: 600px;">
                    <div class="card-body p-0"> 
                            <div class="login-contenedor">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <div class="mt-3 mb-3 text-center" style="color: #c00; font-weight: 600;"><?php echo $this->mensaje; ?></div>
                                    
                                    <form class="user" action="<?php echo constant('URL') ?>login/verificarCredenciales" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username"
                                                id="inputUsuario" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu nombre de usuario..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="inputContraseña" placeholder="Contraseña" required>
                                        </div>
                                        
                                        <button  class="btn btn-primary btn-user btn-block">
                                            Entrar
                                        </button>
                                        
                                        
                                    </form>
                                    <hr>
                                    
                                </div>
                            </div>
                        
                    </div>
                </div>

            

        </div>

    </div>

    
    <script src="<?php echo constant('URL'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>