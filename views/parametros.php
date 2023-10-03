<?php include("../php/functions/validar.php");

include("../php/functions/tasa.php"); ?>
<?php
include("../php/dbconn.php");
include("../views/operacion/addparametros.php");

?>
<?php
include("../php/dbconn.php");
$sql = 'SELECT * FROM tblconfig where id_empresa="1"';
$stmt = $conn->prepare($sql);
$stmt->execute();
$config = $stmt->fetch();

$nombre = $config["nombre_empresa"] ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Parametros</title>
</head>

<body>
    <?php include("./assets/headersintasa.php"); ?>

    <main>
        <section>
            <div class="container-sm text-light">
                <h2>Datos Empresa</h2>
                <hr>
              

                <form action="" method="post">
                    <label for="" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo $nombre; ?>" name="nombre"  id="">
                    <label for="" class="form-label">Razon Social:</label>
                    <input type="text" class="form-control" value="<?php echo $config['razon_social'] ?>" name="rif" id="">
                    <label for="" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" value="<?php echo $config['direccion'] ?>" name="direccion" id="">
                    <label for="" class="form-label">Telefono:</label>
                    <input type="text" class="form-control" value="<?php echo $config['telefono'] ?>" name="telefono" id="">
                    <label for="" class="form-label">No Control:</label>
                    <input type="text" class="form-control" value="<?php echo $config['NControl'] ?>" name="n_control" id="">

                    <input type="submit" class="btn btn-primary mb-3" value="Guardar" name="guardar">
                </form>

            </div>
        </section>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>