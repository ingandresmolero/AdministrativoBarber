<?php
try{
    $user = "root";
    $passw = "";
    $conn=new PDO("mysql:host=localhost;dbname=activosys",$user,$passw);

}catch(PDOException $e){
    print "Error!: " . $e->getMessage()."<br/>";
    die();
}
    

?>