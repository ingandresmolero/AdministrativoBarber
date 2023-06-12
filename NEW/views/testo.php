<?php
include("../php/functions/validar.php");

include("../php/functions/tasa.php");
include_once("../php/dbconn.php");
$sql = 'SELECT * FROM reportes ';
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll();

$report_x_pagina = 10;

$total_report = $stmt->rowCount();


$paginas = ceil($total_report / $report_x_pagina);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.min.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">

    <title>Reportes</title>
</head>

<body>
    <?php include("../views/assets/header.php"); ?>
    

    <section class="container">
    <h1 class="page-heading">Reportes</h1>
    <div class="table-responsive-sm">
        <table class="table table-style">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Egreso</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha Creacion</th>
                    <th scope="col">Accion</th>
                
                </tr>
            </thead>
            <!-- Codigo PHP -->
            <tbody>

<?php
    if(!$_GET){
        header('Location:reportes.php?pagina=1');
    }if ($_GET['pagina']>$paginas || $_GET['pagina']<=0 ){
        header('Location:reportes.php?pagina=1');
    }

    $iniciar = ($_GET['pagina']-1) * $report_x_pagina;
   
    $sql_report = "SELECT * FROM reportes LIMIT :iniciar,:nusuarios";
    $stm_report = $conn->prepare($sql_report);
    $stm_report->bindParam(':iniciar' , $iniciar,PDO::PARAM_INT);
    $stm_report->bindParam(':nusuarios' , $report_x_pagina,PDO::PARAM_INT);
    $stm_report->execute();


    $resultado_report = $stm_report->fetchAll();



?>



                <?php foreach ($resultado_report as $report) :   
                    
                    $id=$report['id_reporte'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $report['id_reporte'];  ?></th>
                        <td><?php echo $report['codigo']; ?></td>
                        <td><?php echo $report['egreso']; ?></td>
                        <td><?php echo $report['ingreso']; ?></td>
                        <td><?php echo $report['usuario']; ?></td>
                        <td><?php echo $report['fecha_creacion']; ?></td>
                        <td class="action"><a class="table-btn" href="operacion/verreporte.php?reporteid=<?php echo $id ?>">Detalles </a></td>
                        
                       
                    </tr>
            </tbody>
        <?php endforeach ?>

        </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item 
                <?php echo $_GET['pagina'] < $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="reportes.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) : ?>
                    <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? ' active' : '' ?>"><a class="page-link" href="reportes.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                <?php endfor  ?>


                <li class="page-item
                <?php echo $_GET['pagina'] >= $paginas ? ' disabled' : '' ?> 
                "><a class="page-link" href="reportes.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
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