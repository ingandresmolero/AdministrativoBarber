<?php 
// include("../../php/functions/validar.php");
include("../../php/dbconn.php");
$id = $_GET['ID'];
$sql = "SELECT * FROM tblservices where ID='$id' ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();



?>
<?php
include("actualizarServicio.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.min.css">
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Editar Servicio</title>
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
                            <label for="" class="form-label">Servicio:</label>
                            <input type="text" class="form-control" name="nombre" id="" placeholder="<?php echo $user['ServiceName']?>" >

                        </div>

                        <div class="col-lg-3">
                            <label for="" class="form-label">Costo:</label>
                            <input type="text" class="form-control" name="costo" value="<?php echo $user['Cost'] ?>" id="nombre" >
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