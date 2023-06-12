<?php
  

  include("dbconn.php");
  session_start();
  if(isset($_POST["login"])){
    
    if($_POST["usuario"]== "" or $_POST["passw"]==""){
        echo "<center><h1>Usuario y contrasena no deben estar vacios</h1></center>";

}else{
    $username =$_POST["usuario"];
    $passw=$_POST["passw"];
    $query=$conn->prepare("SELECT * FROM usuarios WHERE user='$username' and passw='$passw'");
    $query -> execute();
    $control=$query ->fetch();
    
    if($control>0){
        $rol = $control['rol'];
        $_SESSION["username"]=$username;
        $_SESSION["rol"] =$rol;
        header("Location:views/dashboard.php");
     
    }
    echo "<div class='alert alert-danger' role="alert>El usuario y contraseña no coinciden.</div>";
  }

}
?>