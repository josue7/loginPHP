<html>
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
        <title>Inicio de sesion</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

    <!-- agregar color de fondo -->
    <body style="background-color: #f5f5f5;">

        <?php
        //incluir el archivo de modelo de user
        require_once 'models/User.php';

        //Variable que indica si se debe mostrar el mensaje de error o no
        $respuesta = true;

        //verificar si se ha enviado parametros por POST
        if(isset($_POST['email']) && isset($_POST['password'])){
            $user = new User("", "", "", "", "", "");
            //crear un hash de la contraseña recibida por POST con el metodo password_hash de php y el algoritmo BCRYPT con un costo de 10 (opcional)
            //$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //Guardar en variables los valores recibidos por POST
            $email = $_POST['email'];
            $passwordForm = $_POST['password'];
            //asignar los valores a los atributos del objeto user
            $user->setEmail($email);
            $datosUser = $user->verifyByUser();
            //Verificar si el array de datos del user no esta vacio
            if(!empty($datosUser)){
                //Se agrega los datos del usuario al objeto user
                $user->setName($datosUser['name']);
                $user->setLast_name($datosUser['last_name']);
                $user->setEmail($datosUser['email']);
                $user->setPassword($datosUser['password']);
                $user->setId_position($datosUser['id_position']);

                //verificar si la contraseña recibida por POST es igual a la contraseña del user
                if(password_verify($passwordForm, $user->getPassword())){
                    $respuesta = true;
                    //Verificar si el user es administrador
                    if($user->getId_position() == 1){
                        //redireccionar al dashboard de administrador
                        //header("Location: dashboard.php");
                        echo "admin";
                    }else{
                        //redireccionar al dashboard de usuario
                        //header("Location: dashboard.php");
                        echo "user";
                    }
                }//fin del if de la verificacion de la contraseña
                else{
                    $respuesta = false;
                }
            }//fin del if de la verificacion del array de datos del user
            else{
                $respuesta = false;
            }
            //destruir el objeto user
            $user->close();
            unset($user);
        }//fin del if de la verificacion de los parametros recibidos por POST
        

        ?>
        
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="justify-content-center row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="pt-4 pb-4 text-center card-header" style="background-color: teal;">
                                <a href="/">
                                    <span>
                                        <img src="img/logo.png" alt="logo" width="200">
                                    </span>
                                </a>
                        </div>
                        <div class="p-4 card-body">
                            <div class="text-center w-7 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Iniciar sesion</h1>
                                <p class="text-muted mb-4">Ingrese su usuario y contraseña</p>
                            </div>
                            <?php
                            //verificar si el atributo name es vacio
                            if( $respuesta == false ){
                            ?>                          
                            <div class="fade my-2 alert alert-danger show" role="alert">
                                <strong>Oh no!</strong> Usuario o contraseña incorrectos.
                            </div>
                            <?php
                            } ?>
                            <form method="post">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" type="text" name="email" required="" placeholder="Ingrese su usuario" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <div class="mb-0 input-group">
                                        <input class="form-control" type="password" required="" name="password" placeholder="Ingrese su contraseña" required>
                                        
                                    </div>
                                </div>
                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" style="background-color: teal;" type="submit">Iniciar sesion</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>