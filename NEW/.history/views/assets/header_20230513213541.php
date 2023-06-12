<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../media/logo/logo.png" alt="logo"></a>
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="tasa">
      <a class="nav-link" href="../views/stock.php">Tasa del dia: <?php echo "$tasadia Fecha: $tasafecha "; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../views/dashboard.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/stock.php">Inventario</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../views/operaciones.php">Operaciones</a></li>
            <li><a class="dropdown-item" href="../views/reportes.php">Reportes</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../views/configuracion.php">Configuracion</a></li>
            <li>
              <form action="../php/functions/logout.php" method="post">
                <input type="submit" value="Logout" name="logout">
              </form>

            </li>
          </ul>
        </li>
      </ul>
    </div>
    
  </div>
</nav>