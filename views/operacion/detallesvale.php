<?php 
// include("../../php/functions/validar.php");
include("../../php/dbconn.php");
$id = $_GET['userid'];
$sql = "SELECT vales.monto,tblbarber.nombre as barbero, metodos_pago.nombre as metodos_pago,vales.detalle ,metodos_pago.unidad, vales.fecha FROM vales INNER JOIN tblbarber ON vales.idbarber = tblbarber.idbarber INNER JOIN metodos_pago ON vales.metodo_pago = metodos_pago.idmetodo where idvale='$id' ";
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
    <title>Detalles vale</title>
</head>

<body>
    <?php include("../assets/headersintasa.php"); ?>

    <main>



        <section>
            <div class="container-sm">
            <?php foreach ($resultado as $user) : ?> 
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-3  ">
                            <label for="" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" name="user" id="" placeholder="<?php echo $user['barbero']?>" disabled>

                        </div>

                       
                        <div class="col-lg-3">
                            <label for="" class="form-label">metodos:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user['metodos_pago'] ?>" id="nombre" disabled>
                        </div>

                        <div class="col-lg-3">
                            <label for="" class="form-label">Unidad:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user['unidad'] ?>" id="nombre" disabled>
                        </div>
                        
                        <div class="col-lg-3">
                            <label for="" class="form-label">fecha:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user['fecha'] ?>" id="nombre" disabled>
                        </div>



                       



                    </div>
<div class="row">
<div class="col-lg-6">
                            <label for="" class="form-label">Detalles:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user['detalle'] ?>" id="nombre" disabled>
                        </div>
</div>

<div class="row">
<div class="col-lg-6">
                            <label for="" class="form-label">Estatus:</label>
                            <select name="estatus" id="">
                                <option value="Pagado">Pagado</option>
                                <option value="SinEfecto">Sin Efecto</option>
                            </select>
                        </div>
</div>
                 

                    <input type="submit" class="btn btn-success mb-3" value="actualizar" name="actualizar">
                </form>
<?php endforeach ?>
            </div>
        </section>



    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>