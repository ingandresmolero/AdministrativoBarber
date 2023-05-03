<?php
   

    include("../../php/dbconn.php");

    
    if(isset($_POST['guardar'])){
        $username=$_SESSION['username'];
    $fecha_dia= date("Ymd");

        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $existencia=$_POST['existencia'];
        $lote=$_POST['lote'];
        $costo=$_POST['costo'];
        $precio_1=$_POST['precio_1'];
        $precio_2=$_POST['precio_2'];
        $precio_3=$_POST['precio_3'];
        $tasa=$_POST['tasa'];
        $tasa_variable=$_POST['tasa_variable'];
        $iva=$_POST['iva'];
        $color=$_POST['color'];
        $voltaje=$_POST['voltaje'];
        $medida=$_POST['medida'];
        $calibre=$_POST['calibre'];
        $n_hilos=$_POST['n_hilos'];
        $unidad = $_POST['unidad'];
        $serials=$_POST['serials'];
        $largo=$_POST['largo'];
        $peso_bruto=$_POST['peso_bruto'];
        $peso_kilo_gramo=$_POST['peso_kg_cobre'];

        $newstock="INSERT INTO stock (codigo, nombre, descripcion, existencia,lote, costo, precio_1, precio_2, precio_3,tasa, tasa_variable,iva,  color, voltaje, medida, calibre, N_hilos, unidades, serials, largo, peso_bruto, peso_kg_cobre, usuario, fecha_creacion) VALUES ('$codigo','$nombre','$descripcion','$existencia','$lote','$costo','$precio_1','$precio_2','$precio_3','$tasa','$tasa_variable','$iva','$color','$voltaje','$medida','$calibre','$n_hilos','$unidad','$serials','$largo','$peso_bruto','$peso_kilo_gramo','$username','$fecha_dia')";

        $add = $conn->prepare("$newstock");
        $add->execute();

        $stmt = $add->fetchAll();

        if($stmt > 0){
            echo 'prueba1';

        }else{
            echo 'prueba2';
        }

    }
