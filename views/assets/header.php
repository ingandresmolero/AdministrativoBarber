<nav class="navbar navbar-expand-lg bg-secondary text-light " >
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../media/logo/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../views/dashboard.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/stock.php?pagina=1">Inventario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="../views/operaciones.php">Operaciones</a></li>
            <li><a class="dropdown-item" href="../views/reportes.php">Reportes</a></li> -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../views/configuracion.php">Configuracion</a></li>

            <!-- DATO PARA HACER LA VALIDACION DE USUARIO -->
              <form action="../php/functions/logout.php" method="post">
              <li><a class="dropdown-item user-name" id="rol"><?php echo $rol ?></a></li>
              <li> <a class="d-none"> <?php echo $userid ?> </a> </li>
              <li> <a class="d-none"> <?php echo $_SESSION["username"] ?> </a> </li>
                <input type="submit" value="Salir" name="logout" class="btn-menu">
              </form>

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/tasa.php">Tasa del dia: <?php echo "$tasadia Fecha: $tasafecha "; ?></a>
        </li>
    </div>
  </div>
</nav>