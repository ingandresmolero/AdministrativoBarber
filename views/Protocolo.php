<?php
include("../php/functions/validar.php");

// include("../php/functions/tasa.php");
?>
<?php

$username = $_SESSION['username'];


include("../php/dbconn.php");
include("../php/conex.php");
$sql = 'SELECT * FROM tblcustomers';
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
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <title>Clientes</title>
</head>

<body>
    <?php include("../views/assets/headersintasa.php"); ?>


    <section class="container">
        <h1 class="page-heading">Clientes</h1>
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nuevo Usuario
        </button>
        <div class="row b-3">
            <div class="col-md">
                <form action="" method="post">
                    <input type="text" class="form-control" name="campo" placeholder="Nombre,Cedula..." id="">
                    <input type="submit" class="table-btn" value="busqueda" name="busqueda">
                    <a href="Protocolo.php" class="table-btn">Mostrar Todos</a>
                </form>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-style">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cedula</th>
                        <!-- <th scope="col">Barbero</th>
                        <th scope="col">Fecha</th> -->
                        <th scope="col">Tipo Cliente</th>
                        <th scope="col">Editar</th>
                        <!-- <th scope="col">Eliminar</th> -->

                    </tr>
                </thead>
                <!-- Codigo PHP -->
                <tbody>

                    <?php
                    if (!$_GET) {
                        header('Location:Protocolo.php?pagina=1');
                    }
                    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
                        header('Location:Protocolo.php?pagina=1');
                    }

                    if (!isset($_POST['busqueda'])) {

                        $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;

                        $sql_usuarios = "SELECT * FROM tblcustomers ORDER BY ID DESC LIMIT :iniciar,:nusuarios";
                        $stm_usuario = $conn->prepare($sql_usuarios);
                        $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                        $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                        $stm_usuario->execute();


                        $resultado_usuario = $stm_usuario->fetchAll();
                    ?>
                        <h2 class="page-heading">Listado de Cliente</h2>
                        
                        <?php foreach ($resultado_usuario as $usuario) :   ?>
                            <form action="./operacion/asignarfactura.php" method="POST">
                                <tr>
                                    <th scope="row"><?php echo $usuario['ID'];  ?></th>
                                    <td><?php echo $usuario['Name']; ?></td>
                                    <td><?php echo $usuario['cedula']; ?></td>
                                    <!-- <td><?php echo $usuario['assignedbarber']; ?></td>
                                    <td><?php echo $usuario['CreationDate']; ?></td> -->
                                    <td><?php echo $usuario['Gender']; ?></td>
                                    <td class="action">

                                        <input type="text" class="d-none" name="idcliente" value="<?php echo $usuario['ID'] ?>">
                                        <input type="text" class="d-none" name="usuarioid" value="<?php echo $userid ?>">


                                        <input type="submit" class="table-btn" value="Procesar">
                                    </td>

                                    <!-- DETERMINAR LOGICA PARA ELIMINAR UN CLIENTE -->
                                    <!-- <td class="action"><a class="table-btn" href="../views/operacion/eliminarusuario.php?username=<?php echo $usuario['ID'] ?>">Eliminar</a></td> -->

                                </tr>
                            </form>
                        <?php endforeach  ?>
                        <?php } else {
                        if (isset($_POST['busqueda'])) {
                            $busqueda = $_POST['campo'];
                            $iniciar = ($_GET['pagina'] - 1) * $usuarios_x_pagina;

                            $sql_usuarios = "SELECT * FROM tblcustomers WHERE (Name LIKE '%$busqueda%') OR (cedula LIKE '%$busqueda%') LIMIT :iniciar,:nusuarios";
                            $stm_usuario = $conn->prepare($sql_usuarios);
                            $stm_usuario->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
                            $stm_usuario->bindParam(':nusuarios', $usuarios_x_pagina, PDO::PARAM_INT);
                            $stm_usuario->execute();



                            $resultado_usuario = $stm_usuario->fetchAll();
                        ?>

                            <?php foreach ($resultado_usuario as $usuario) :   ?>
                                <form action="./operacion/asignarfactura.php" method="POST">
                                <tr>
                                    <th scope="row"><?php echo $usuario['ID'];  ?></th>
                                    <td><?php echo $usuario['Name']; ?></td>
                                    <td><?php echo $usuario['cedula']; ?></td>
                                  
                                  
                                    <td><?php echo $usuario['Gender']; ?></td>
                                    <td class="action">

                                        <input type="text" class="d-none" name="idcliente" value="<?php echo $usuario['ID'] ?>">
                                        <input type="text" class="d-none" name="usuarioid" value="<?php echo $userid ?>">


                                        <input type="submit" class="table-btn" value="Procesar">
                                    </td>

                                    <!-- DETERMINAR LOGICA PARA ELIMINAR UN CLIENTE -->
                                    <!-- <td class="action"><a class="table-btn" href="../views/operacion/eliminarusuario.php?username=<?php echo $usuario['ID'] ?>">Eliminar</a></td> -->

                                </tr>
                            </form>
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
                "><a class="page-link" href="Protocolo.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item pnum <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="Protocolo.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor  ?>


                <li class="page-item
                <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="Protocolo.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="operacion/crearcliente.php" method="post">
                        <input type="text" name="username" value="<?php echo $username ?>" class="d-none">
                        <label class="form-label" for="">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="">
                        <label class="form-label" for="">Cedula</label>
                        <input class="form-control" type="text" name="cedula" value="" id="">
                        <!-- <label class="form-label" for="">Barbero</label>
                        <select name="idbarber" class="form-control" id="">


                            <?php
                            $consultabarber = "Select * from tblbarber";
                            $list_barber = mysqli_query($conexion, $consultabarber);
                            while ($row = mysqli_fetch_array($list_barber)) {
                                echo "	<option value=" . $row['nombre'] . ">" . $row['nombre'] . "</option>";
                            };
                            ?>

                        </select> -->


                        <label class="form-label" for="">Tipo Cliente</label>
                        <select name="tipo_cliente" class="form-control" id="">
                            <option value="eventual">Eventual</option>
                            <option value="cortesia">Cortesia</option>
                            <option value="interno">Interno</option>
                            <option value="vip">VIP</option>
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