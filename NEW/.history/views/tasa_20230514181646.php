<?php include("../php/functions/validar.php");

include("../php/functions/tasa.php");?>
<?php 
if (isset($_POST['guardar'])) {

include("../php/dbconn.php");
$fecha = date("d.m.y");
$tasa=$_POST['tasa'];
$tasa2=$_POST['tasa2'];
$sql = "UPDATE tasabs SET fecha_creacion='$fecha',monto_bcv='$tasa',monto_paral='$tasa2'";
$stmt = $conn->prepare($sql);
$stmt->execute();



$add = $stmt->fetchAll();

    if($add > 0){
        echo '<script>alert("Se agrego tasa '.$tasa.'Bs.S y '.$tasa2.'Bs.S")</script>';
        header("Location: dashboard.php");
    }else{
        echo 'Hubo un error!';
    }


}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Tasa</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/styles.min.css">

</head>

<body id="tasa">
    <?php include("assets/header.php"); ?>

    <main>

        <div class="container">
            <form action="" method="post">
                <div class="flex-container">
                    <div class="flex-item">
                        <label class="form-label" for="">Tasa 1 del Dia</label>
                        <input class="form-control col-sm-3" type="text" name="tasa" id="tasa" placeholder="Tasa BS del dia...">
                    </div>

                    <div class="flex-container">
                        <label class="form-label" for="">Tasa 2 del Dia</label>
                        <input class="form-control col-sm-3 mb-3" type="text" name="tasa2" id="tasa2" placeholder="Tasa paralela del dia...">
                    </div>

                </div>
                
                <input type="submit" class="btn btn-primary mb-3" value="Guardar" name="guardar">
            </form>
        </div>


        <!-- <div class="registro-tasa">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Historico Tasa
            </button>
        </div> -->
    </main>


    <!-- Modal
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>