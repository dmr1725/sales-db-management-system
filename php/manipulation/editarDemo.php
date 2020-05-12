<?php
   if(isset($_POST['submit'])){
       $cliente_id = $_POST['clienteID'];
       $vendedor_id = $_POST['vendedorID'];
       $cloro = $_POST['cloro'];
       $sedimentacion = $_POST['sedimentacion'];
       $espuma = $_POST['espuma'];
       $dureza = $_POST['dureza'];

       include '../connect.php';

       if($connect->connect_error){
           die('Connection Failed   :' .$connect->connect_error);
       }

       $sql = "UPDATE demo SET cloro = '$cloro', sedimentacion = '$sedimentacion', espuma = '$espuma', dureza = '$dureza'
               where clientID = '$cliente_id' and empID = '$vendedor_id'";

       if(!mysqli_query($connect, $sql)){
           echo "Not inserted <br>";
           echo $connect->error;
       }

       else{
           echo "Inserted <br>";
       }
   }

   

   header("refresh:2; url=../../html/main/index.html");    

?>