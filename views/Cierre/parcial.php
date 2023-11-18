<?php
    include("../../php/dbconn.php");

    $query  = "SELECT SUM(monto_total) FROM transacciones; "; //total de operaciones
    $query2 = "SELECT SUM(monto_total) FROM transacciones WHERE estatus = 'totalizado'"; //total totalizado
    $query3 = "SELECT SUM(monto_total) FROM transacciones WHERE estatus = 'abono'"; //total de facturas con abono
    $query4 = "SELECT SUM(monto_total) FROM transacciones WHERE estatus = 'restante' "; //total de pendiente por pagar cliente
    $Query5 = "SELECT SUM(monto) from vales;";

    $querymetodos  = "SELECT SUM(monto) FROM `cuentas_cobrar` inner join metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo WHERE cuentas_cobrar.idmetodo='1'; "; //total de operaciones
    $querymetodos2 = "SELECT SUM(monto) FROM `cuentas_cobrar` inner join metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo WHERE cuentas_cobrar.idmetodo='2'; "; //total totalizado
    $querymetodos3 = "SELECT SUM(monto) FROM `cuentas_cobrar` inner join metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo WHERE cuentas_cobrar.idmetodo='4'; "; //total de facturas con abono
    $querymetodos4 = "SELECT SUM(monto) FROM `cuentas_cobrar` inner join metodos_pago on cuentas_cobrar.idmetodo = metodos_pago.idmetodo WHERE cuentas_cobrar.idmetodo='5'; "; //total de pendiente por pagar cliente
    $Querymetodos5 = "SELECT SUM(monto) from vales;";
    
    $exequery  = $conn->prepare($query);
    $exequery2 = $conn->prepare($query2);
    $exequery3 = $conn->prepare($query3);
    $exequery4 = $conn->prepare($query4);
    $exequery5 = $conn->prepare($Query5);

    $exequerymetodos  = $conn->prepare($querymetodos);
    $exequerymetodos2 = $conn->prepare($querymetodos2);
    $exequerymetodos3 = $conn->prepare($querymetodos3);
    $exequerymetodos4 = $conn->prepare($querymetodos4);
    $exequerymetodos5 = $conn->prepare($Querymetodos5);

    $exequery->execute();
    $exequery2->execute();
    $exequery3->execute();
    $exequery4->execute();
    $exequery5->execute();

    $exequerymetodos->execute();
    $exequerymetodos2->execute();
    $exequerymetodos3->execute();
    $exequerymetodos4->execute();
    $exequerymetodos5->execute();

    $row1 = $exequery->fetch();
    $row2 = $exequery2->fetch();
    $row3 = $exequery3->fetch();
    $row4 = $exequery4->fetch();
    $row5 = $exequery5->fetch();

    $rowmetodos1 = $exequerymetodos->fetch();
    $rowmetodos2 = $exequerymetodos2->fetch();
    $rowmetodos3 = $exequerymetodos3->fetch();
    $rowmetodos4 = $exequerymetodos4->fetch();
    $rowmetodos5 = $exequerymetodos5->fetch();




?>



<!DOCTYPE html>
<html lang="en">
<head></head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/styles.min.css">
    <title>Cierre - Parcial - <?php echo $idservicio ?></title>
</head>

<body>
    <?php include("../../views/assets/headersintasa.php"); ?>

    <main>



        <section>
            <div class="container-sm mt-3 " id="prueba1">
                <form action="operacion/asignarpropina.php" method="post">
                <input type="text" class="d-none" name="idservicioasignado" value="<?php echo $idservicio ?>">
                <input type="text" class="d-none" name="billing" value="<?php echo $row['invoice'] ?>">
                    <div class="row">
                        <div class="col text-light">
                            <label for="">General</label>
                           <ul>
                            <li>Total transacciones: $<?php echo $row['SUM(monto_total)'] ?></li>
                            <li>Total cuentas totalizadas: $<?php echo $row2['SUM(monto_total)'] ?></li>
                            <li>Total cuentas x cobrar: $<?php echo $row3['SUM(monto_total)'] ?></li>
                            <li>Total de cuentas x pagar: $<?php echo $row4['SUM(monto_total)'] ?></li>
                            <li>Total de Vales: $<?php echo $row5['SUM(monto_total)'] ?></li>
                            
                           </ul>
                        </div>
                        <!-- <div class="col text-light">
                            <h2>Servicio</h2>
                            <h2><?php echo $row['ServiceName'] ?></h2>
                        </div> -->
                    </div>

                    <div class="row">
                        <h3>Metodos pagos:</h3>
                        <ul>
                            <li>Zelle: $ <?php echo $rowmetodos1['SUM(monto)']; ?></li>
                            <li>Efectivo: $ <?php echo $rowmetodos2['SUM(monto)']; ?></li>
                            <li>Binance: $ <?php echo $rowmetodos3['SUM(monto)']; ?></li>
                            <li>Pago Movil: $ <?php echo $rowmetodos4['SUM(monto)']; ?></li>
                        </ul>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-5">

                            <label for="" class="form-label text-white">Detalles</label>
                            <input type="text" name="detalle" value="" id="" class="form-control">
                        </div>
                    </div> -->





                    <div class="col-md-3 mt-3">
                        <input type="submit" value="Guardar" class="btn btn-primary" name="Guardar">
                    </div>

                </form>
            </div>
        </section>



    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">

    </script>
</body>