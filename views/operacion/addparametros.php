<?php



if(isset($_POST['guardar'])){
    
    $nombre = $_POST['nombre'];
    $rif =$_POST['rif'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $n_control=$_POST['n_control'];
    $n_control_interno = $_POST['n_control_interno'];

    $sql="UPDATE tblconfig SET nombre_empresa='$nombre',razon_social='$rif',direccion='$direccion',telefono='$telefono',NControl='$n_control',NControlInterno='$n_control_interno' ";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();



    $add = $stmt->fetchAll();

    if($add > 0){
        echo '<script>alert("Se agrego campos para empresa")</script>';
    }else{
        echo '<script>alert("Hubo un error!")</script>';
    }
}


?>