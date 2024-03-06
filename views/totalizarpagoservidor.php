<?php

//OPERACION DE ELIMINAR UN PRODUCTO 
include("../php/conex.php");

if(isset($_POST['totalizar'])){
    $rol = $_POST['rol'];
    $fecha = date("d/m/Y");
    $total_cancelado = $_POST['totalcancelado'];
    $idusuario = $_POST['userid'];
    $saldopendiente  = $_POST['saldo_pendiente'];

    

    echo 'id'.$idusuario;
    echo 'monto'.$total_cancelado;
    echo 'saldo'.$saldopendiente;
    echo 'fecha'.$fecha;

}
?> 