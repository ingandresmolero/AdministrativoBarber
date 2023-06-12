<?php include("../../php/functions/validar.php");
?>
<?php

include("../../php/dbconn.php");
$stockid = $_GET['stockid'];
$sql = "SELECT * FROM stock INNER JOIN reportes ON stock.codigo = reportes.codigo where stock.id_stock='$stockid' AND reportes.fecha_creacion = (SELECT MAX(fecha_creacion) from reportes) AND id_reporte = (SELECT MAX(id_reporte) FROM reportes) LIMIT 1";
// $sql = "SELECT * FROM stock where id_stock='$stockid' ";


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
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../../css/styles.min.css">
    <title>Editar Producto</title>
</head>

<body>
    <?php include("../../views/assets/headersintasa.php"); ?>

    <main>

        <div class="container">
            <h1 class="page-heading">Editar articulo</h1>
            <div class="box-bg-2">
                <?php foreach ($resultado as $stock) : ?>
                    <form action="" method="post" class="form-style-3">

                        <div class="row ">
                            <div class="col-lg-4">
                                <label for="" class="form-label">Codigo:</label>
                                <input type="tex" class="form-control" name="codigo" id="" value="<?php echo $stock['codigo'] ?>" placeholder="<?php echo $stock['codigo'] ?>">

                            </div>

                            <div class="col-lg-4">
                                <label for="" class="form-label">Nombre:</label>
                                <input type="tex" class="form-control" name="nombre" id="" value="<?php echo $stock['nombre'] ?>" placeholder="<?php echo $stock['nombre'] ?>">
                            </div>

                            <div class="col-lg-4">
                                <label for="" class="form-label">Descripcion:</label>
                                <input type="tex" class="form-control" name="descripcion" id="" value="<?php echo $stock['descripcion'] ?>" placeholder="<?php echo $stock['descripcion'] ?>...">
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-4 ">
                                <label for="" class="form-label">Existencia Compra:</label>
                                <input id="ingreso_input" type="number" class="form-control" name="existencia"  value="<?php echo $stock['existencia'] ?>" placeholder="<?php echo $stock['ingreso'] ?>...">
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="form-label">Existencia:</label>
                                <input id="cantidad_input" type="number" class="form-control" name="existencia"  value="<?php echo $stock['existencia'] ?>" placeholder="<?php echo $stock['existencia'] ?>...">
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="form-label">Lote:</label>
                                <input type="text" class="form-control" name="lote" id="" value="<?php echo $stock['lote'] ?>" placeholder="<?php echo $stock['lote'] ?>...">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Costo Promedio Anterior $:</label>
                                <input id="costoPAnt_input" type="number" class="form-control" name="costo" value="<?php echo $stock['monto'] ?>" placeholder="<?php echo $stock['monto'] ?>...">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">Costo Promedio $:</label>
                                <input id="costoP_input" type="number" class="form-control" name="costo" value="<?php echo $stock['monto'] ?>" placeholder="<?php echo $stock['costo'] ?>...">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">Utilidad %:</label>
                                <input id="utilidad_input" type="number" class="form-control" name="costo" value="<?php echo $stock['costo'] ?>" placeholder="<?php echo $stock['costo'] ?>...">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">Precio PVP del costoprom:</label>
                                <input id="precioPvp_input" type="number" class="form-control" name="costo" value="<?php echo $stock['costo'] ?>" placeholder="<?php echo $stock['costo'] ?>...">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-sm-4">
                                <label for="" class="form-label">Precio 1 $:</label>
                                <input type="number" class="form-control" name="precio_1" id="precio1_input" >
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="form-label">utilidad calculo</label>
                                <input type="number" class="form-control" name="precio_2" id="precio2_input"  >
                            </div>
                            <div class="col-sm-4">
                                <label for="" class="form-label">Precio utilidad </label>
                                <input type="number" class="form-control" name="precio_3" id="precio3_input" value="<?php echo $stock['precio_3'] ?>" placeholder="<?php echo $stock['precio_3'] ?>...">
                            </div>
                        </div>
                        <hr class="mt-3">

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="" class="form-label">Tasa Compra del dia BS.S:</label>
                                <input type="number" class="form-control" name="tasa" id="" value="<?php echo $stock['tasa'] ?>" placeholder="<?php echo $stock['tasa'] ?>...">

                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">% IVA:</label>
                                <input type="number" class="form-control" name="iva" id="" value="<?php echo $stock['iva'] ?>" placeholder="<?php echo $stock['iva'] ?>...">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Tasa Variable Bs.S:</label>
                                <input type="tasa_variable" class="form-control" name="tasa_variable" id="" value="<?php echo $stock['tasa_variable'] ?>" placeholder="<?php echo $stock['tasa_variable'] ?>...">

                            </div>
                        </div>

                        <hr>
                        <div class="mt-4">
                            <a class="btn-invert" data-bs-toggle="collapse" href="#multiCollapseCaracteristicas" role="button" aria-expanded="false" aria-controls="multiCollapseCaracteristicas">Caracteristicas</a>
                            <button class="btn-invert" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseEmbalaje" aria-expanded="false" aria-controls="multiCollapseEmbalaje">Embalaje</button>

                        </div>
                        <hr>
                        <div>
                            <!-- CARACTERISTICAS -->
                            <div class="collapse multi-collapse mt-3 mb-3" id="multiCollapseCaracteristicas">
                                <div class="card card-body">
                                    <div class="row">
                                        <h3 class="module-title">Caracteristicas</h3>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Color:</label>
                                            <input type="tex" class="form-control" name="color" id="" value="<?php echo $stock['color'] ?>" placeholder="<?php echo $stock['color'] ?>...">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Voltaje:</label>
                                            <input type="tex" class="form-control" name="voltaje" id="" value="<?php echo $stock['voltaje'] ?>" placeholder="<?php echo $stock['voltaje'] ?>...">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Medida:</label>
                                            <input type="tex" class="form-control" name="medida" id="" value="<?php echo $stock['medida'] ?>" placeholder="<?php echo $stock['medida'] ?>...">
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Calibre:</label>
                                            <input type="tex" class="form-control" name="calibre" id="" value="<?php echo $stock['calibre'] ?>" placeholder="<?php echo $stock['calibre'] ?>...">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">No de Hilos</label>
                                            <input type="tex" class="form-control" name="n_hilos" id="" value="<?php echo $stock['N_hilos'] ?>" placeholder="<?php echo $stock['N_hilos'] ?>...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EMBALAJE -->
                        <div>
                            <div class="collapse multi-collapse mt-2 mb-3" id="multiCollapseEmbalaje">
                                <div class="card card-body">
                                    <div class="row">
                                        <h3 class="module-title">Embalaje</h3>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Unidad:</label>
                                            <select class="form-select" name="unidad" id="unidad">
                                                <option value="kg">Kilogramos</option>
                                                <option value="mt">Metros</option>
                                                <option value="carrete">Carrete</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Serial:</label>
                                            <input type="tex" class="form-control" name="serials" id="" value="<?php echo $stock['serials'] ?>" placeholder="<?php echo $stock['serials'] ?>...">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Largo:</label>
                                            <input type="tex" class="form-control" name="largo" id="" value="<?php echo $stock['largo'] ?>" placeholder="<?php echo $stock['largo'] ?>...">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Peso Bruto:</label>
                                            <input type="tex" class="form-control" name="peso_bruto" id="" value="<?php echo $stock['peso_bruto'] ?>" placeholder="<?php echo $stock['peso_bruto'] ?>...">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Peso Kilo/Cobre:</label>
                                            <input type="tex" class="form-control" name="peso_kg_cobre" id="" value="<?php echo $stock['peso_kg_cobre'] ?>" placeholder="<?php echo $stock['peso_kg_cobre'] ?>...">
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>


                        <div class="row mb-3 mt-4">
                            <input type="submit" class="submit-btn-2" value="Actualizar" name="actualizar">
                            <?php
                            $rol = $_SESSION['rol'];
                            if ($rol == 'master') {
                                echo '<input type="submit" class="submit-invert " value="Borrar" name="borrar">';
                            }
                            ?>
                        </div>
                    </form>

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
        </div>
    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<script src="../../js/productFuction.js"></script>

<script>
    // const costo = document.getElementById("costo");
    // const utilidad = document.getElementById("utilidad");
    // const pvp = document.getElementById("pvp");

    // costo.classList.add(" btn-primary");
    //Servicios
</script>

</html>