<?php
// include("../../php/functions/validar.php");
include("../../../php/dbconn.php");
// include("../../../php/functions/tasa.php");
session_start();

$nombreservidor = $_SESSION["username"];
$sql = "SELECT * FROM transacciones 

INNER JOIN tblinvoice ON transacciones.invoice = tblinvoice.BillingId
INNER JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID
INNER JOIN tblassignedservice on tblassignedservice.invoice = tblinvoice.BillingId
INNER JOIN tblbarber on tblassignedservice.idbarbero = tblbarber.idbarber

WHERE tblbarber.nombre = '$nombreservidor'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();

$usuarios_x_pagina = 10;

$total_usuario = $stmt->rowCount();

$paginas = ceil($total_usuario / $usuarios_x_pagina);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/styles.min.css">
    <title>Clientes - Servicios</title>
</head>

<body>
    <?php include("headersintasabarber.php"); ?>

    <section class="container">
        <h1 class="page-heading">clientes</h1>
        <div class="row b-3">
            <div class="col-md">
                <form action="" method="post">
                    <input type="text" class="form-control" name="campo" placeholder="Factura,Cliente,Barbero,Estado..." id="">
                    <input type="submit" class="table-btn" value="busqueda" name="busqueda">
                    <a href="clientesatendidos.php" class="table-btn">Mostrar Todos</a>
                </form>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-style">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NroFactura</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Fecha</th>
                        <!-- <th scope="col">Estado</th> -->
                        <th scope="col">Ver</th>
                        <!-- <th scope="col">Eliminar</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$_GET) {
                        header('Location:clientesatendidos.php?pagina=1');
                    }
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header('Location:clientesatendidos.php?pagina=1');
                    }

                    if (!isset($_POST['busqueda'])) {
                        $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;
                        $sql_usuarios = "SELECT distinct tblinvoice.BillingId,tblcustomers.Name,tblcustomers.cedula,tblinvoice.PostingDate FROM transacciones 

                        INNER JOIN tblinvoice ON transacciones.invoice = tblinvoice.BillingId
                        INNER JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID
                        INNER JOIN tblassignedservice on tblassignedservice.invoice = tblinvoice.BillingId
                        INNER JOIN tblbarber on tblassignedservice.idbarbero = tblbarber.idbarber
                        
                        WHERE tblbarber.nombre = '$nombreservidor'  LIMIT :iniciar, :nusuarios;";
                        $stm_usuario = $conn->prepare($sql_usuarios);
                        $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                        $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                        $stm_usuario->execute();
                        $resultado_usuario = $stm_usuario->fetchAll();
                        $ctn = 1;
                        foreach ($resultado_usuario as $usuario) :   ?>
                            <tr>
                                <th scope="row"><?php echo $ctn;  ?></th>
                                <td><?php echo $usuario['BillingId']; ?></td>
                                <td><?php echo $usuario['Name']; ?></td>
                                <td><?php echo $usuario['cedula']; ?></td>
                                <td><?php echo $usuario['PostingDate']; ?></td>
                                <!-- <td><?php echo $usuario['estado']; ?></td> -->
                                <td class="action"><a class="table-btn" href="../../../views/detalles.php?billing=<?php echo $usuario['BillingId'] ?>&barber=<?php echo $nombreservidor ?>">Detalle</a></td>
                                <!-- <td class="action"><a class="table-btn" href="#">Eliminar</a></td> -->
                            </tr>
                            <?php $ctn = $ctn + 1;
                        endforeach;
                    } else {
                        if (isset($_POST['busqueda'])) {
                            $busqueda = $_POST['campo'];
                            $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;
                            $sql_usuarios = "SELECT * FROM transacciones 

                            INNER JOIN tblinvoice ON transacciones.invoice = tblinvoice.BillingId
                            INNER JOIN tblcustomers ON tblinvoice.Userid = tblcustomers.ID
                            INNER JOIN tblassignedservice on tblassignedservice.invoice = tblinvoice.BillingId
                            INNER JOIN tblbarber on tblassignedservice.idbarbero = tblbarber.idbarber
                            
                            WHERE tblbarber.nombre = '$nombreservidor' AND (Name LIKE '%$busqueda%') OR (cedula LIKE '%$busqueda%') LIMIT :iniciar,:nusuarios";
                            $stm_usuario = $conn->prepare($sql_usuarios);
                            $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                            $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                            $stm_usuario->execute();
                            $resultado_usuario = $stm_usuario->fetchAll();
                            $ctn2 = 1;
                            foreach ($resultado_usuario as $usuario) :   ?>
                                <tr>
                                    <th scope="row"><?php echo $ctn2;  ?></th>
                                    <td><?php echo $usuario['BillingId']; ?></td>
                                    <td><?php echo $usuario['Name']; ?></td>
                                    <td><?php echo $usuario['cedula']; ?></td>
                                    <!-- <td><?php echo $usuario['estado']; ?></td> -->
                                    <td class="action"><a class="table-btn" href="../../../views/detalles.php?billing=<?php echo $usuario['BillingId'] ?>">Detalle</a></td>
                                    <!-- <td class="action"><a class="table-btn" href="#">Eliminar</a></td> -->
                                </tr>
                    <?php $ctn2 = $ctn2 + 1;
                            endforeach;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pagina'] < $paginas ? ' disabled' : '' ?>"><a class="page-link" href="clientesatendidos.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>
                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item pnum <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="clientesatendidos.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor; ?>
                <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?>"><a class="page-link" href="clientesatendidos.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="../../js/functions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>