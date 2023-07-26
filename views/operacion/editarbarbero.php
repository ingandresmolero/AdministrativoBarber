<?php 
// include("../../php/functions/validar.php");
include("../../php/dbconn.php");
$id = $_GET['userid'];
$sql = "SELECT * FROM tblbarber where idbarber='$id' ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();



?>
<?php
include("actualizarBarber.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Editar User</title>
</head>

<body>
    <?php include("../assets/headersintasa.php"); ?>

    <main>



        <section>
            <div class="container-sm mt-3">
                <?php foreach ($resultado as $user) : ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-3  ">
                                <label for="" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" name="user" id="" placeholder="<?php echo $user['usuario'] ?>" >

                            </div>

                            <div class="col-lg-3">
                                <label for="" class="form-label">Codigo:</label>
                                <input type="text" class="form-control" name="Codigo" value="<?php echo $user['Codigo'] ?>" id="nombre" >
                            </div>
                            <div class="col-lg-3">
                                <label for="" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $user['nombre'] ?>" id="nombre" >
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Porcentaje:</label>
                                    <input type="text" class="form-control" name="porcentaje" value="<?php echo $user['porcentaje'] ?>" id="nombre" >
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Puesto:</label>
                                    <input type="text" class="form-control" name="puesto" value="<?php echo $user['Puesto'] ?>" id="nombre" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Telefono:</label>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $user['Telefono'] ?>" id="passw">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Contrasena Nueva:</label>
                                    <input type="text" class="form-control" name="passw" id="passw">
                                </div>
                            </div>
                           
                            <!-- <div class="col-sm-3  mb-3">
                                <label for="" class="form-label">Rol</label>
                                <select class="form-select" name="rol" id="rol">
                                    <option value="protocolo">Protocolo</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="admin">Admininistrador</option>
                                </select>
                            </div> -->



                        </div>


                        <input type="submit" class="btn btn-success mb-3 mt-3" value="actualizar" name="actualizar">
                    </form>
                <?php endforeach ?>
            </div>
        </section>



    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>