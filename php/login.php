<?php
  

  include("dbconn.php");
  session_start();
  if(isset($_POST["login"])){
    
    if($_POST["usuario"]== "" or $_POST["passw"]==""){
        echo "<center><h1>Usuario y contrasena no deben estar vacios</h1></center>";

}else{
    
    $username =$_POST["usuario"];
    $passw=md5($_POST["passw"]);
    $query=$conn->prepare("SELECT * FROM tbladmin WHERE UserName='$username' and Password='$passw'");
    $query -> execute();
    $control=$query ->fetch();

   
   

    
    if($control>0){
        $rol = $control['Role'];
        $_SESSION["username"]=$username;
        $_SESSION["Role"] =$rol;
        $_SESSION["ID"] =$userid;
        
        header("Location:views/dashboard.php");
     
    }
    echo "<center><div class='alert alert-danger' role='alert'>El usuario y contraseña no coinciden.</div></center>";
  }

}
  
?>