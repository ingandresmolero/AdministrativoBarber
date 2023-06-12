<?php include("../../php/functions/validar.php");
?>
<?php

include("../../php/dbconn.php");
$reporteid = $_GET['reporteid'];
$sql = "SELECT * FROM reportes where id_reporte='$reporteid' ";

$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();


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
    <title>Ver Reporte</title>
</head>

<body>
    <?php include("../../views/assets/headersintasa.php"); ?>

    <main>
        <div class="container">
            <h1 class="page-heading">Ver Reporte</h1>
            <div class="box-bg mb-4">
                <?php foreach ($resultado as $stock) : ?>
                    <form action="" method="post" >
                        <div class="row">
                            <div class="input-item">
                                <label for="" class="form-label">Codigo:</label>
                                <input type="tex" class="form-control" name="codigo" id="" disabled value="<?php echo $stock['codigo'] ?>" placeholder="<?php echo $stock['codigo'] ?>">
                            </div>

                            <div class="input-item">
                                <label for="" class="form-label">Egreso:</label>
                                <input type="tex" class="form-control" name="nombre" id="" disabled value="<?php echo $stock['egreso'] ?>" placeholder="<?php echo $stock['egreso'] ?>">
                            </div>

                            <div class="input-item">
                                <label for="" class="form-label">Ingreso:</label>
                                <input type="tex" class="form-control" name="descripcion" id="" disabled value="<?php echo $stock['ingreso'] ?>" placeholder="<?php echo $stock['ingreso'] ?>...">
                            </div>
                        
                            <div class="input-item">
                                <label for="" class="form-label">Usuario:</label>
                                <input type="number" class="form-control" name="existencia" id="" disabled value="<?php echo $stock['usuario'] ?>" placeholder="<?php echo $stock['usuario'] ?>...">
                            </div>   
                            <div class="input-item">
                                <label for="" class="form-label">Representante:</label>
                                <input type="number" class="form-control" name="existencia" id="" disabled value="<?php echo $stock['representante'] ?>" placeholder="<?php echo $stock['representante'] ?>...">
                            </div>   
                            

                            <div class="input-item">
                                <label for="" class="form-label">Fecha Creacion:</label>
                                <input type="number" class="form-control" name="existencia" id="" disabled value="<?php echo $stock['fecha_creacion'] ?>" placeholder="<?php echo $stock['fecha_creacion'] ?>...">
                            </div>

                            <div class="input-item">
                                <label for="" class="form-label">Tasa del dia:</label>
                                <input type="number" class="form-control" name="existencia" id="" disabled  placeholder="Tasa del dia...">
                            </div>
                            <div class="input-item">
                                <label for="" class="form-label">Monto Operacion:</label>
                                <input type="number" class="form-control" name="existencia" id="" disabled  value="<?php echo $stock['monto'] ?>" placeholder="<?php echo $stock['monto'] ?>...">
                            </div>

                           
                        </div>
                        <!-- <div class="row mb-3 mt-4">
                            <input type="submit" class="submit-btn-2 " value="Actualizar" name="actualizar">
                            $rol = $_SESSION['rol'];
                                if ($rol == 'master') {
                                    echo '<input type="submit" class="submit-invert" value="Borrar" name="borrar">';
                                }
                            ?> 
                        </div> -->
                    </form>
                </div>
            <?php endforeach ?>
            <?php
            if (isset($_POST['borrar'])) {
                $delete = " DELETE FROM stock WHERE id_stock='$stockid'";

                $stmt = $conn->prepare($delete);
                $stmt->execute();
                echo '<script>
                alert("Se elimino el producto ' . $stockid . '--' . $stock['nombre'] . '");
                window.location.href = "../stock.php";
                </script>';
            };

            if (isset($_POST['actualizar'])) {
                $username = $_SESSION['username'];
                $fecha_dia = date("Ymd");
                $codigo = $_POST['codigo'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $existencia = $_POST['existencia'];
                $lote = $_POST['lote'];
                $costo = $_POST['costo'];
                $precio_1 = $_POST['precio_1'];
                $precio_2 = $_POST['precio_2'];
                $precio_3 = $_POST['precio_3'];
                $tasa = $_POST['tasa'];
                $tasa_variable = $_POST['tasa_variable'];
                $iva = $_POST['iva'];
                $color = $_POST['color'];
                $voltaje = $_POST['voltaje'];
                $medida = $_POST['medida'];
                $calibre = $_POST['calibre'];
                $n_hilos = $_POST['n_hilos'];
                $unidad = $_POST['unidad'];
                $serials = $_POST['serials'];
                $largo = $_POST['largo'];
                $peso_bruto = $_POST['peso_bruto'];
                $peso_kilo_gramo = $_POST['peso_kg_cobre'];

                $query = "UPDATE stock SET codigo='$codigo',nombre='$nombre',descripcion='$descripcion',existencia='$existencia',lote='$lote',costo='$costo',precio_1='$precio_1',precio_2='$precio_2',precio_3='$precio_3',tasa='$tasa',tasa_variable='$tasa_variable',iva='$iva',color='$color',voltaje='$voltaje',medida='$medida',calibre='$calibre',N_hilos='$n_hilos',unidades='$unidad',serials='$serials',largo='$largo',peso_bruto='$peso_bruto',peso_kg_cobre='$peso_kilo_gramo' WHERE id_stock='$stockid'";

                $consulta = $conn->prepare($query);
                $consulta->execute();

                $act = $consulta->fetchAll();

                if ($act > 0) {
                    echo '<script>
                alert("Se agrego campos para empresa");
                window.location.href = "../stock.php";
                </script>';
                } else {
                    echo '<script>alert("Hubo un error!")</script>';
                }
            }

            ?>
        </div>
    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>