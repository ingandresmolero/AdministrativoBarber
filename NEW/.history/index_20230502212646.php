<?php include('php/login.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.min.css">
    <title>Login</title>
</head>

<body class="login-page">

    <section class="container">
        <div class="box">
            <p>Iniciar Sesión</p>
            <form action="" method="post">
                
                    <div class="mb-3 user">
                        <!-- <label for="exampleInputEmail1" class="form-label">Usuario</label> -->
                        <input type="text" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="usuario">
                    
                    </div>
                    <div class="mb-3 password">
                        <!-- <label for="exampleInputPassword1" class="form-label">Contraseña</label> -->
                        <input type="password" class="form-control" name="passw" id="exampleInputPassword1" placeholder="contraseña">
                    </div>
                    
                    <p><input type="submit" name="login" value="Entrar"></p>  
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>