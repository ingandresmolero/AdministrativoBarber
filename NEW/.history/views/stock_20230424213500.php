<?php
include("../php/functions/validar.php");
include_once("../php/dbconn.php");
$sql = 'SELECT * FROM stock';
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();

$stock_x_pagina = 10;

$total_stock = $stmt->rowCount();


$paginas = ceil($total_stock / $stock_x_pagina);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
    <title>Inventario</title>
</head>

<body>
    <?php include("../views/assets/header.php"); ?>
    

    <section class="container-fluid">
    <h2>Inventario</h2>
    <a href="./operacion/add_stock.php" class="btn btn-primary">Crear Item</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Existencia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Accion</th>
                
                </tr>
            </thead>
            <!-- Codigo PHP -->
            <tbody>

<?php
    if(!$_GET){
        header('Location:stock.php?pagina=1');
    }if ($_GET['pagina']>$paginas || $_GET['pagina']<=0 ){
        header('Location:stock.php?pagina=1');
    }

    $iniciar = ($_GET['pagina']-1) * $stock_x_pagina;
   
    $sql_stock = "SELECT * FROM stock LIMIT :iniciar,:nusuarios";
    $stm_stock = $conn->prepare($sql_stock);
    $stm_stock->bindParam(':iniciar' , $iniciar,PDO::PARAM_INT);
    $stm_stock->bindParam(':nusuarios' , $stock_x_pagina,PDO::PARAM_INT);
    $stm_stock->execute();


    $resultado_stock = $stm_stock->fetchAll();



?>



                <?php foreach ($resultado_stock as $stock) :   
                    
                    $id=$stock['id_stock'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $stock['id_stock'];  ?></th>
                        <td><?php echo $stock['codigo']; ?></td>
                        <td><?php echo $stock['nombre']; ?></td>
                        <td><?php echo $stock['descripcion']; ?></td>
                        <td><?php echo $stock['existencia']; ?></td>
                        <td><?php echo $stock['costo']; ?></td>
                        <td><a href="operacion/editarstock.php?stockid=<?php echo $id ?>">Detalles/Modificar </a></td>
                        
                       
                    </tr>
            </tbody>
        <?php endforeach ?>

        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item 
                <?php echo $_GET['pagina'] < $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="stock.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="stock.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor  ?>


                <li class="page-item
                <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="stock.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
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