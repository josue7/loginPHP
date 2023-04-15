<html>
    <head>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
        <title>Inicio de sesion</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    
    <body>
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
                            <div class="fade my-2 alert alert-danger show" role="alert">
                                <strong>Oh no!</strong> Usuario o contraseña incorrectos.
                            </div>
                            <form novalidate="">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Usuario</label>
                                    <input class="form-control" type="text" id="username" required="" placeholder="Ingrese su usuario">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <div class="mb-0 input-group">
                                        <input class="form-control" type="password" required="" id="password" placeholder="Ingrese su contraseña">
                                        
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