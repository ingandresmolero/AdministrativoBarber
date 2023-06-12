<?php include("../../php/functions/validar.php");
include("../../php/dbconn.php");
$id = $_GET['userid'];
$sql = "SELECT * FROM usuarios where id_usuario='$id' ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();



?>
<?php
include("actualizarUser.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../../img/favicon.png">
    <link rel="stylesheet" href="../../css/styles.min.css">
    <title>Editar Usuario</title>
</head>

<body>
    <?php include("../assets/headersintasa.php"); ?>

    <main>
        <div class="container">
            <h1 class="page-heading">Editar Usuario</h1>
            <?php foreach ($resultado as $user) : ?> 
                <div class="box-bg mb-4">
                    <form action="" method="post">
                        <div class="input-item">
                            <label for="" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" name="user" id="" placeholder="<?php echo $user['user']?>" disabled>
                        </div>

                        <div class="input-item">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="input-item">
                            <label for="" class="form-label">Contrasena Nueva:</label>
                            <input type="text" class="form-control" name="passw" id="passw">
                        </div>
                        <div class="input-item">
                            <label for="" class="form-label">Rol</label>
                            <select class="form-select" name="rol" id="rol">
                                <option value="usuario">Usuario</option>
                                <option value="master">Master</option>
                            </select>
                        </div>
                        <input type="submit" class="btn-style-1 mb-3" value="actualizar" name="actualizar">
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>