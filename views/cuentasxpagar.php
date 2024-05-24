<?php
include("../php/functions/validar.php");

// include("../php/functions/tasa.php");
include_once("../php/dbconn.php");
$sql = "SELECT tblcustomers.ID,transacciones.estatus,tblcustomers.Name,tblcustomers.cedula, SUM(transacciones.saldo) AS total_saldo FROM transacciones INNER JOIN tblinvoice ON tblinvoice.BillingId = transacciones.invoice INNER JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID WHERE transacciones.estatus = 'Abono' GROUP BY tblcustomers.ID,transacciones.estatus, tblcustomers.Name,tblcustomers.cedula";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();

$report_x_pagina = 10;

$total_report = $stmt->rowCount();


$paginas = ceil($total_report / $report_x_pagina);
$paginas = ($paginas <= 0) ? 1 : $paginas;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">

    <title>Cuentas Por Pagar</title>
</head>

<body>
    <?php include("../views/assets/headersintasa.php"); ?>


    <section class="container">
        <h1 class="page-heading">Cuentas x Pagar</h1>
        <!-- Button trigger modal -->

        <div class="row b-3">
            <div class="col-md">
                <form action="" method="post">
                    <input type="text" class="form-control" name="campo" placeholder="Usuario, nombre, rol...." id="">
                    <input type="submit" class="table-btn" value="busqueda" name="busqueda">
                    <a href="cuentasxpagar.php" class="table-btn">Mostrar Todos</a>
                </form>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-style">
                <thead>
                    <tr>

                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Nombre</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Monto</th>

                        <!-- <th scope="col">Accion</th> -->

                    </tr>
                </thead>
                <!-- Codigo PHP -->
                <tbody>

                    <?php
                    if (!$_GET) {
                        header('Location:cuentasxpagar.php?pagina=1');
                    }
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header('Location:cuentasxpagar.php?pagina=1');
                    }

                    if (!isset($_POST['busqueda'])) {

                        $iniciar = ($_GET['pagina'] - 1) * $report_x_pagina;

                        $sql_report = "SELECT tblcustomers.ID,transacciones.estatus,tblcustomers.Name,tblcustomers.cedula, SUM(transacciones.saldo) AS total_saldo FROM transacciones INNER JOIN tblinvoice ON tblinvoice.BillingId = transacciones.invoice INNER JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID WHERE transacciones.estatus = 'Abono' GROUP BY tblcustomers.ID,transacciones.estatus, tblcustomers.Name,tblcustomers.cedula LIMIT :iniciar,:nusuarios";
                        $stm_report = $conn->prepare($sql_report);
                        $stm_report->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                        $stm_report->bindParam(':nusuarios', $report_x_pagina, PDO::PARAM_INT);
                        $stm_report->execute();


                        $resultado_usuario = $stm_report->fetchAll();
                    ?>

                        <?php foreach ($resultado_usuario as $usuario) :   ?>
                            <tr>
                                <!-- <th scope="row" class="d-none"><?php echo $usuario['idtransac'];  ?></th> -->
                                <td><?php echo $usuario['Name']; ?></td>
                                <td><?php echo $usuario['cedula']; ?></td>
                                <td><?php echo $usuario['estatus']; ?></td>
                                <td><?php echo $usuario['total_saldo']; ?></td>
                                <!-- <td><?php echo $usuario['fecha_creacion']; ?></td>
                      
                        <td class="action"><a class="table-btn" href="ventadetalles.php?billing=<?php echo $usuario['invoice']; ?>">Detalles </a></td> -->


                            </tr>
                        <?php endforeach  ?>
                        <?php } else {
                        if (isset($_POST['busqueda'])) {
                            $busqueda = $_POST['campo'];
                            $iniciar = ($_GET['pagina'] - 1) * $report_x_pagina;

                            $sql_report = "SELECT tblcustomers.ID,transacciones.estatus,tblcustomers.Name,tblcustomers.cedula, SUM(transacciones.saldo) AS total_saldo FROM transacciones INNER JOIN tblinvoice ON tblinvoice.BillingId = transacciones.invoice INNER JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID WHERE transacciones.estatus = 'Abono' and (tblcustomers.Name LIKE '%$busqueda%' OR tblcustomers.cedula LIKE '%$busqueda') GROUP BY tblcustomers.ID,transacciones.estatus, tblcustomers.Name,tblcustomers.cedula LIMIT :iniciar,:nusuarios";
                            $stm_report = $conn->prepare($sql_report);
                            $stm_report->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                            $stm_report->bindParam(':nusuarios', $report_x_pagina, PDO::PARAM_INT);
                            $stm_report->execute();



                            $resultado_usuario = $stm_report->fetchAll();
                        ?>

                            <?php foreach ($resultado_usuario as $usuario) :   ?>
                                <tr>
                                    <!-- <th scope="row" class="d-none"><?php echo $usuario['idtransac'];  ?></th> -->
                                    <td><?php echo $usuario['Name']; ?></td>
                                    <td><?php echo $usuario['cedula']; ?></td>
                                    <td><?php echo $usuario['estatus']; ?></td>
                                    <td><?php echo $usuario['total_saldo']; ?></td>

                                    <!-- <td class="action"><a class="table-btn" href="ventadetalles.php?billing=<?php echo  $usuario['invoice'];  ?>">Detalles </a></td> -->


                                </tr>
                            <?php endforeach  ?>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item 
                <?php echo $_GET['pagina'] < $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="cuentasxpagar.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item pnum <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="cuentasxpagar.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor  ?>


                <li class="page-item
                <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="cuentasxpagar.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>
    </section>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="js/functions.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>