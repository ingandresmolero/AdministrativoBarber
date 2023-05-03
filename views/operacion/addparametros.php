<?php



if(isset($_POST['guardar'])){
    
    $nombre = $_POST['nombre'];
    $rif =$_POST['rif'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $n_control=$_POST['n_control'];

    $sql="INSERT INTO empresa( nombre, rif, direccion, telefono, n_control) VALUES ('$nombre','$rif','$direccion','$telefono','$n_control')";

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