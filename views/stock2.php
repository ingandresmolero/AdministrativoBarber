<?php
include("../php/functions/validar.php");

// include("../php/functions/tasa.php");
?>
<?php
include("../php/dbconn.php");
$sql = 'SELECT * FROM tblproducts';
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();

$usuarios_x_pagina = 10;

$total_usuario = $stmt->rowCount();


$paginas = ceil($total_usuario / $usuarios_x_pagina);
$paginas = ($paginas <= 0) ? 1 : $paginas;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">

    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Inventario</title>
</head>

<body>
    <?php include("../views/assets/headersintasa.php"); ?>


    <section class="container">
        <h1 class="page-heading">Actualizacion de Inventario</h1>
<h2 class="text-light mb-5">PRECAUCION: SE ACTUALIZARAN A LA CANTIDAD COLOCADA, UTILIZAR SOLO CUANDO SEA NECESARIO</h2>

        <!-- Button trigger modal -->
        <!-- <button type="button" onclick="window.location.href='stock.php'" class="m-2 btn btn-primary">Guardar Cambios</button> -->

        <div class="row justify-content-center">
            <form action="" method="post">
                <div class="col-7">

                    <input type="text" class="form-control" name="campo" placeholder="Productos, Deposito...." id="">

                </div>

                <div class="col">

                    <input type="submit" class="table-btn" value="busqueda" name="busqueda">

                </div>
                <div class="col ">

                    <a href="stock2.php" class="table-btn">Mostrar Todos</a>

                </div>
            </form>
        </div>

        <div class="table-responsive-sm">
            <table class="table table-style">

                <?php if ($rol == 'manager') { ?>

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>

                            <th scope="col">PVP</th>
                            <th scope="col">Deposito</th>


                        </tr>
                    </thead>

                    <?php } else {
                    if ($rol == 'admin') { ?>

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">PVP</th>
                                <th scope="col">Deposito</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Añadir</th>

                            </tr>
                        </thead>
                <?php }
                } ?>


                <!-- Codigo PHP -->
                <tbody>

                    <?php
                    if (!$_GET) {
                        header('Location:stock2.php?pagina=1');
                    }
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header('Location:stock2.php?pagina=1');
                    }

                    if (!isset($_POST['busqueda'])) {

                        $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;

                        $sql_usuarios = "SELECT * FROM tblproducts LIMIT :iniciar,:nusuarios";
                        $stm_usuario = $conn->prepare($sql_usuarios);
                        $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                        $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                        $stm_usuario->execute();


                        $resultado_usuario = $stm_usuario->fetchAll();
                    ?>

                        <?php foreach ($resultado_usuario as $usuario) :   ?>
                            <?php if ($rol == 'admin') { ?>
                                <tr>
                                    <form action="./operacion/actualizarstock2.php" method="post">
                                        <input type="text" class="d-none" name="idproducto" value="<?php echo $usuario['idproducts'] ?>" id="">
                                        <th scope="row"><?php echo $usuario['idproducts'];  ?></th>
                                        <td><?php echo $usuario['nombre']; ?></td>
                                        <td><?php echo $usuario['cantidad']; ?></td>
                                        <td><?php echo $usuario['precio']; ?></td>

                                        <td><?php echo $usuario['deposito']; ?></td>
                                        <td class="action"><input class="table-btn bg-light text-dark" type="text" name="cantidad" placeholder="..." /></td>

                                        <!-- <td class="action"><a class="table-btn text-dark" href="../views/operacion/actualizarstock2.php?idproduct=<?php echo $usuario['idproducts'] ?>">+</a></td> -->
                                        <td class="action"> <input type="submit" class="table-btn" value="+" name="actualizacion"> </td>
                                    </form>
                                </tr>
                                <?php } else {
                                if ($rol == 'manager') { ?>
                                    <tr>
                                        <th scope="row"><?php echo $usuario['idproducts'];  ?></th>
                                        <td><?php echo $usuario['nombre']; ?></td>

                                        <td><?php echo $usuario['precio']; ?></td>
                                        <td><?php echo $usuario['deposito']; ?></td>

                                    </tr>
                            <?php }
                            } ?>

                        <?php endforeach  ?>
                        <?php } else {
                        if (isset($_POST['busqueda'])) {
                            $busqueda = $_POST['campo'];
                            $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;

                            $sql_usuarios = "SELECT * FROM tblproducts WHERE (nombre LIKE '%$busqueda%') OR (deposito LIKE '%$busqueda%') LIMIT :iniciar,:nusuarios";
                            $stm_usuario = $conn->prepare($sql_usuarios);
                            $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                            $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                            $stm_usuario->execute();



                            $resultado_usuario = $stm_usuario->fetchAll();
                        ?>

                            <?php foreach ($resultado_usuario as $usuario) :   ?>

                                <?php if ($rol == 'manager') { ?>
                                    <tr>
                                        <th scope="row"><?php echo $usuario['idproducts'];  ?></th>
                                        <td><?php echo $usuario['nombre']; ?></td>

                                        <td><?php echo $usuario['precio']; ?></td>

                                        <td><?php echo $usuario['deposito']; ?></td>


                                    </tr>
                                    <?php  } else {
                                    if ($rol == 'admin') { ?>
                                        <form action="./operacion/actualizarstock2.php" method="post">
                                            <input type="text" class="d-none" name="idproducto" value="<?php echo $usuario['idproducts'] ?>" id="">
                                            <th scope="row"><?php echo $usuario['idproducts'];  ?></th>
                                            <td><?php echo $usuario['nombre']; ?></td>
                                            <td><?php echo $usuario['cantidad']; ?></td>
                                            <td><?php echo $usuario['precio']; ?></td>

                                            <td><?php echo $usuario['deposito']; ?></td>
                                            <td class="action"><input class="table-btn bg-light text-dark" type="text" name="cantidad" placeholder="..." /></td>

                                            <!-- <td class="action"><a class="table-btn text-dark" href="../views/operacion/actualizarstock2.php?idproduct=<?php echo $usuario['idproducts'] ?>">+</a></td> -->
                                            <td class="action"> <input type="submit" class="table-btn" value="+" name="actualizacion"> </td>
                                        </form>
                                <?php }
                                } ?>

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
                "><a class="page-link" href="stock2.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item pnum <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="stock2.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor  ?>


                <li class="page-item
                <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="stock2.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>

    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/crearproducto.php" method="post">
                        <label class="form-label" for="">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="">
                        <label class="form-label" for="">PVP</label>
                        <input class="form-control" type="text" name="pvp" id="">
                        <label class="form-label" for="">Cantidad</label>
                        <input class="form-control" type="text" name="cantidad" id="">
                        <label class="form-label" for="">Deposito</label>
                        <select class="form-control" name="deposito" id="">
                            <option value="Belleza">Belleza</option>
                            <option value="Bebida">Bebida</option>
                            <option value="Snack">Snack</option>
                            <option value="Otros">Otros</option>
                        </select>


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