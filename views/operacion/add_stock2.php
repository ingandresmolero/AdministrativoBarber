<?php include("../../php/functions/validar.php"); ?>
<?php
    include("agregar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Orden Carga</title>
</head>

<body>
    <?php include("../assets/header.php"); ?>

    <main>



        <section>
            <div class="container-sm">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-3 ">
                            <label for="" class="form-label">Codigo:</label>
                            <input type="tex" class="form-control" name="codigo" id="">

                        </div>

                        <div class="col-lg-3">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="tex" class="form-control" name="nombre" id="">
                        </div>

                        <div class="col-lg-3">
                            <label for="" class="form-label">Descripcion:</label>
                            <input type="tex" class="form-control" name="descripcion" id="">
                        </div>

                        <div class="col-3">
                            <label for="" class="form-label">Existencia:</label>
                            <input type="number" class="form-control" name="existencia" id="">
                        </div>

                        <div class="col-3">
                            <label for="" class="form-label">Lote:</label>
                            <input type="number" class="form-control" name="lote" id="">
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="form-label">Costo:</label>
                            <input type="number" class="form-control" name="costo" id="">
                        </div>

                        <div class="row ">
                            <div class="col-sm-3">
                                <label for="" class="form-label">Precio 1:</label>
                                <input type="number" class="form-control" name="precio_1" id="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">Precio 2:</label>
                                <input type="number" class="form-control" name="precio_2" id="">
                            </div>
                            <div class="col-sm-3">
                                <label for="" class="form-label">Precio 3:</label>
                                <input type="number" class="form-control" name="precio_3" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="" class="form-label">Tasa del dia BS.S:</label>
                                <input type="number" class="form-control" name="tasa" id="">

                            </div>
                            <div class="col-3">
                                <label for="" class="form-label">% IVA:</label>
                                <input type="number" class="form-control" name="iva" id="">
                            </div>
                            <div class="col-3">
                                <label for="" class="form-label">Tasa Variable:</label>
                                <input type="tasa_variable" class="form-control" name="tasa_variable" id="">

                            </div>
                        </div>

                        <hr>
                        <p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseCaracteristicas" role="button" aria-expanded="false" aria-controls="multiCollapseCaracteristicas">Caracteristicas</a>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseEmbalaje" aria-expanded="false" aria-controls="multiCollapseEmbalaje">Embalaje</button>

                        </p>
                        <hr>
                    </div>

                    <div>
                        <!-- CARACTERISTICAS -->
                        <div class="collapse multi-collapse" id="multiCollapseCaracteristicas">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Color:</label>
                                        <input type="tex" class="form-control" name="color" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Voltaje:</label>
                                        <input type="tex" class="form-control" name="voltaje" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Medida:</label>
                                        <input type="tex" class="form-control" name="medida" id="">
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Calibre:</label>
                                        <input type="tex" class="form-control" name="calibre" id="">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">No de Hilos</label>
                                        <input type="tex" class="form-control" name="n_hilos" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- EMBALAJE -->
                    <div>
                        <div class="collapse multi-collapse" id="multiCollapseEmbalaje">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Unidad:</label>
                                        <select name="unidad" id="unidad">
                                            <option value="kg">Kilogramos</option>
                                            <option value="mt">mt</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Serial:</label>
                                        <input type="tex" class="form-control" name="serials" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Largo:</label>
                                        <input type="tex" class="form-control" name="largo" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Peso Bruto:</label>
                                        <input type="tex" class="form-control" name="peso_bruto" id="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Peso Kilo/Cobre:</label>
                                        <input type="tex" class="form-control" name="peso_kg_cobre" id="">
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>



                    <input type="submit"  class="btn btn-primary mb-3" value="Guardar" name="guardar">
                </form>
             
            </div>
        </section>



    </main>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>