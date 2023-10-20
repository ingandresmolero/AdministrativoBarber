<?php
include("../php/functions/validar.php");
include("../php/conex.php")
// include("../php/functions/tasa.php");
?>
<?php
include("../php/dbconn.php");
$sql = 'SELECT * FROM consumo_interno';
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
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Consumo interno</title>
</head>

<body>
    <?php include("../views/assets/headersintasa.php"); ?>


    <section class="container">
        <h1 class="page-heading">CONSUMO INTERNO</h1>
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nueva Consumo
        </button>
        <div class="row b-3">
            <div class="col-md">
                <form action="" method="post">
                    <input type="text" class="form-control" name="campo" placeholder="Factura,Cliente,Barbero,Estado..." id="">
                    <input type="submit" class="table-btn" value="busqueda" name="busqueda">
                    <a href="consumo_interno.php" class="table-btn">Mostrar Todos</a>
                </form>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-style">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NroConsumo</th>
                        <th scope="col">Barbero</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Procesar</th>
                        <th scope="col">Eliminar</th>

                    </tr>
                </thead>
                <!-- Codigo PHP -->
                <tbody>

                    <?php
                    if (!$_GET) {
                        header('Location:consumo_interno.php?pagina=1');
                    }
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header('Location:consumo_interno.php?pagina=1');
                    }

                    if (!isset($_POST['busqueda'])) {

                        $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;

                        $sql_usuarios = "SELECT consumo_interno.idconsumo, consumo_interno.fecha_creacion,tblbarber.nombre as barbero,consumo_interno.estado FROM consumo_interno 
                        JOIN tblproducts on consumo_interno.idproducto = tblproducts.idproducts
                        JOIN tblbarber ON consumo_interno.servidor = tblbarber.idbarber LIMIT :iniciar, :nusuarios;";
                        $stm_usuario = $conn->prepare($sql_usuarios);
                        $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                        $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                        $stm_usuario->execute();


                        $resultado_usuario = $stm_usuario->fetchAll();
                        $ctn = 1;
                    ?>

                        <?php foreach ($resultado_usuario as $usuario) :   ?>
                            <tr>
                                <th scope="row"><?php echo $ctn;  ?></th>
                                <td><?php echo $usuario['idconsumo']; ?></td>
                                <td><?php echo $usuario['barbero']; ?></td>
                                <td><?php echo $usuario['fecha_creacion']; ?></td>
                                <td><?php echo $usuario['estado']; ?></td>
                                <td class="action"><a class="table-btn" href="../views/venta.php?billing=<?php echo $usuario['idconsumo'] ?>">Procesar</a></td>
                                <td class="action"><a class="table-btn" href="#">Eliminar</a></td>

                            </tr>
                        <?php $ctn = $ctn + 1;
                        endforeach  ?>
                        <?php } else {
                        if (isset($_POST['busqueda'])) {
                            $busqueda = $_POST['campo'];
                            $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;

                            $sql_usuarios = "SELECT DISTINCT tblcustomers.Name ,tblcustomers.Gender, tblcustomers.cedula,tblinvoice.BillingId ,tblcustomers.assignedbarber as barbero,tblinvoice.PostingDate,tblinvoice.estado from tblcustomers join tblinvoice on tblcustomers.ID=tblinvoice.Userid WHERE (Name LIKE  '%$busqueda%') OR (cedula LIKE '%$busqueda%') LIMIT :iniciar,:nusuarios";
                            $stm_usuario = $conn->prepare($sql_usuarios);
                            $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                            $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                            $stm_usuario->execute();



                            $resultado_usuario = $stm_usuario->fetchAll();
                            $ctn2 = 1;
                        ?>

                            <?php foreach ($resultado_usuario as $usuario) :   ?>
                                <tr>
                                    <th scope="row"><?php echo $ctn2;  ?></th>
                                    <td><?php echo $usuario['BillingId']; ?></td>
                                    <td><?php echo $usuario['Name']; ?></td>
                                    <td><?php echo $usuario['cedula']; ?></td>
                                    <td><?php echo $usuario['Gender']; ?></td>
                                    <td><?php echo $usuario['estado']; ?></td>
                                    <?php if(!$rol == 'manager'){
                                        echo '
                                        <td class="action"><a class="table-btn" href="../views/venta.php?billing='.$usuario['BillingId'].'">Facturar</a></td>
                                        <td class="action"><a class="table-btn" href="#">Eliminar</a></td>';
                                ?>
                                    
                                        </tr>
                            <?php }endforeach  ?>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item 
                <?php echo $_GET['pagina'] < $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="consumo_interno.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item pnum <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="consumo_interno.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor  ?>


                <li class="page-item
                <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="consumo_interno.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Orden de Consumo </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?PHP

                    $sql_datos = "SELECT * FROM tblbarber";
                    $stm_datos = $conn->prepare($sql_datos);
                    $resultado_datos = $stm_datos->fetchAll();


                    ?>
                    <form action="operacion/crearconsumo.php" method="post">
                        <label class="form-label" for="">Barbero:</label>

                        <select name="barbero" class="form-select" id="barbero">
                            <?php
                            $consulta = "Select * from tblbarber";
                            $list_barber = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['idbarber'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>
                        </select>

                        <label class="form-label" for="">Producto:</label>
                        <select name="producto" class="form-select" id="producto">
                            <?php
                            $consulta = "Select * from tblproducts";
                            $list_products = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_array($list_products)) {
                                echo "	<option value=" . $row['idproducts'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>
                        </select>

                        <label class="form-label" for="">Cantidad</label>
                        <input type="number" class="form-control mb-3 " name="cantidad">
                        

                        <input type="submit" class="btn btn-primary" name="crear" value="Guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="js/functions.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>