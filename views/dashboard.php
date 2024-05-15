<?php

include("../php/functions/validar.php");


include("../php/functions/tasa.php");
// include("../php/dbconn.php");



$nombreservidor = $_SESSION["username"];


// var_dump($idbarbero);
// var_dump($rol);

//CONTADORES
$fecha=date('Y-m-d');
$contador1 = "SELECT * FROM tblbarber inner JOIN tblassignedservice on tblassignedservice.idbarbero = tblbarber.idbarber inner join tblinvoice on tblinvoice.BillingId = tblassignedservice.invoice WHERE tblbarber.nombre = '$nombreservidor' and tblinvoice.PostingDate > '$fecha';";
$contador2 = "SELECT SUM(IFNULL(tblassignedservice_intern.monto,0) + IFNULL(tblassignedproducts_intern.monto,0) + IFNULL(servicios_adicional_interno.monto,0)) as total_monto FROM consumo_interno INNER JOIN tblassignedservice_intern ON tblassignedservice_intern.intern = consumo_interno.intern INNER JOIN tblassignedproducts_intern ON tblassignedproducts_intern.intern = consumo_interno.intern LEFT JOIN servicios_adicional_interno ON servicios_adicional_interno.intern = consumo_interno.intern INNER JOIN tbladmin ON tbladmin.ID = consumo_interno.servidor WHERE tbladmin.AdminName = '$nombreservidor' and fecha_creacion >= '$fecha';";

$contador3 = "SELECT * from vales inner join tbladmin on vales.idbarber = tbladmin.ID WHERE tbladmin.AdminName ='$nombreservidor' and vales.fecha >= '$fecha'";
$contador4 = "SELECT SUM(propina) FROM tblassignedservice inner JOIN tblbarber on tblassignedservice.idbarbero = tblbarber.idbarber inner join tblinvoice on tblassignedservice.invoice = tblinvoice.BillingId WHERE tblbarber.nombre = '$nombreservidor' and tblinvoice.PostingDate >= '$fecha'";

$stmt1 = $conn->prepare($contador1);
$stmt2 = $conn->prepare($contador2);
$stmt3 = $conn->prepare($contador3);
$stmt4 = $conn->prepare($contador4);

$stmt1->execute();
$stmt2->execute();
$stmt3->execute();
$stmt4->execute();

$row1 = $stmt1->rowCount();
$row2 = $stmt2->fetch();
$row3 = $stmt3->rowCount();
$row4 = $stmt4->fetch();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Activo Barbershop</title>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">

    <link rel="stylesheet" href="../css/styles.min.css">

</head>

<body id="dashboard">
    <?php
    include("assets/header.php");
    ?>
    <section class="container">



        <?php if ($rol == 'manager') { ?>
            <div class="elements">
                <a href="Protocolo.php" class="item">

                    <img src="../img/icons/clientes-ab.png">
                    <p class="card-title">Clientes</p>
                </a>
                <a href="./lista_facturas.php" class="item">

                    <img src="../img/icons/facturas-ab.png">
                    <p class="card-title">Caja</p>
                </a>
                <a href="stock.php?pagina=1" class="item">

                    <img src="../img/icons/stock-ab.png">
                    <p class="card-title">Inventario</p>
                </a>
            </div>

            <div class="elements">

                <a href="consumo_interno.php" class="item">

                    <img src="../img/icons/pago-ab.png">
                    <p class="card-title">Consumo Interno</p>
                </a>

            </div>


        <?php } else if ($rol == 'servidor') {
            $contadorsql = "select * from tbladmin inner join tblbarber on tbladmin.AdminName = tblbarber.nombre WHERE tblbarber.nombre = '$nombreservidor'";

            $stmt = $conn->prepare($contadorsql);
            $stmt->execute();
            $row = $stmt->fetch();


            $idbarbero = $row['idbarber'];

        ?>

            <section class="container-fluid">

                <div class="row d-flex justify-content-between align-content-between shadow-lg p-2 m-3 mb-4 mt-4 rounded-5">
                    <h1 style="color: #a4d61d !important;">Fecha del dia: <?php echo $date = date("d.m.Y"); ?></h1>

                    <div class="col-sm-2 p-2" type="button" onclick="location.href='assets/barberos/clientesatendidos.php'">
                        <h3 class="text-light text-center" style="color: #a4d61d !important;"><?php echo $row1 ?></h3>
                        <p class="text-center text-light">Clientes Atendidos</p>
                    </div>
                    <div class="col-sm-2 p-2 text-ligh" type="button" onclick="location.href='assets/barberos/consumobarbero.php'">
                        <h3 class="text-light text-center" style="color: #a4d61d !important;">$ <?php echo $row2['total_monto'] ?></h3>
                        <p class="text-center text-light">Consumo</p>
                    </div>
                    <div class="col-sm-2 p-2" type="button" onclick="location.href='assets/barberos/valesbarber.php'">
                        <h3 class="text-light text-center" style="color: #a4d61d !important;"><?php echo $row3 ?></h3>
                        <p class="text-center text-light">Vales</p>
                    </div>
                    <div class="col-sm-2 p-2" type="button" onclick="location.href='assets/barberos/propinasbarbero.php'">
                        <h3 class="text-light text-center " style="color: #a4d61d !important;">$ <?php echo $row4['SUM(propina)'] ?></h3>
                        <p class="text-center text-light">Propina</p>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-content-center shadow-lg m-3 p-3 rounded-5">

                    <div class="col pb-3 pt-3">

                        <div class="row justify-content-center">

                            <div class="row text-dark p-2 justify-content-center">
                                <button type="button" onclick="location.href='assets/barberos/clientesatendidos.php'" class="rounded-4 text-light p-2" style="background-color: #84aa1d; border: #84aa1d;">Clientes atendidos</button>
                            </div>

                        </div>

                        <div class="row justify-content-center">

                            <div class="row text-dark p-2 justify-content-center">
                                <button type="button" onclick="location.href='assets/barberos/consumobarbero.php'" class="rounded-4 text-light p-2" style="background-color: #84aa1d; border: #84aa1d;">Consumo</button>
                            </div>

                        </div>

                        <div class="row justify-content-center">

                            <div class="row text-dark p-2 justify-content-center">
                                <button type="button" onclick="location.href='assets/barberos/valesbarber.php'" class="rounded-4 text-light p-2" style="background-color: #84aa1d; border: #84aa1d;">Vales</button>
                            </div>

                        </div>
                        <div class="row justify-content-center">

                            <div class="row text-dark p-2 justify-content-center">
                                <button type="button" onclick="location.href='assets/barberos/historicopagosbarbero.php'" class="rounded-4 text-light p-2" style="background-color: #84aa1d; border: #84aa1d;">Historico Pagos</button>
                            </div>

                        </div>

                        <!-- 
                        <div class="row justify-content-center">

                            <div class="row text-dark p-2 justify-content-center">
                                <button type="button" onclick="location.href='assets/barberos/propinasbarbero.php'" class="rounded-4 text-light p-2" style="background-color: #84aa1d; border: #84aa1d;">Propinas</button>
                            </div>

                        </div> -->

                    </div>
                </div>

            </section>

        <?php } else if ($rol == 'admin') { ?>
            <div class="elements">
                <a href="Protocolo.php" class="item">

                    <img src="../img/icons/clientes-ab.png">
                    <p class="card-title">Ingreso / Clientes</p>
                </a>

                <a href="lista_facturas.php" class="item">

                    <img src="../img/icons/citas-ab.png">
                    <p class="card-title">Citas</p>
                </a>

                <a href="facturas.php" class="item">
                    <img src="../img/icons/facturas-ab.png">
                    <p class="card-title">Facturas</p>

                </a>
                <a href="stock.php?pagina=1" class="item">

                    <img src="../img/icons/stock-ab.png">
                    <p class="card-title">Stock</p>
                </a>
                <a href="tasa.php" class="item">

                    <img src="../img/icons/tasa-ab.png">
                    <p class="card-title">Tasa del dia</p>
                </a>
                <!-- 
                <a href="operaciones.php" class="item">
                    <img src="../img/icons/operaciones.png">
                    <p class="card-title">Operaciones</p>

                </a> -->

            </div>
            <div class="elements">
                <!-- <a href="reportes.php" class="item">
                    <img src="../img/icons/reportes.png">
                    <p class="card-title">Reportes</p>
                </a> -->
                <a href="cierrediario.php" class="item">
                    <img src="../img/icons/cierre-ab.png">
                    <p class="card-title">Cierre</p>
                </a>



                <a href="consumo_interno.php" class="item">

                    <img src="../img/icons/pago-ab.png">
                    <p class="card-title">Consumo Interno</p>
                </a>

                <a href="vales.php" class="item">

                    <img src="../img/icons/vales-ab.png">
                    <p class="card-title">Vales</p>
                </a>

                <a href="mant_servicios.php" class="item">
                    <img src="../img/icons/servicios-ab.png">
                    <p class="card-title">Servicios</p>
                </a>

                <a href="configuracion.php" class="item">
                    <img src="../img/icons/config-ab.png">
                    <p class="card-title">Configuracion</p>
                </a>
            </div>

            <div class="elements">
                <a href="cuentas.php" class="item">
                    <img src="../img/icons/operacion-ab.png">
                    <p class="card-title">Cuentas</p>
                </a>
                <a href="pagosservidores.php" class="item">
                    <img src="../img/icons/operacion-ab.png">
                    <p class="card-title">Pago Servidor</p>
                </a>
            </div>


        <?php }; ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>