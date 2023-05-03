<?php

    $sql2 = 'SELECT * FROM stock';
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();

   
  
    $total = 0;
    while($resultado2 = $stmt2->fetch())
    {
      $total = $total + ($resultado2['costo']*$resultado2['existencia']); // Sumar variable $total + resultado de la consulta
    }
    echo '<h3>Total de Inversion en Stock: $'.$total.'</h3>' ;

