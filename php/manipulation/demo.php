<?php
   if(isset($_POST['submit'])){
       $cliente_id = $_POST['clienteID'];
       $vendedor_id = $_POST['vendedorID'];
       $fecha = $_POST['fecha'];
   

       include '../connect.php';

       if($connect->connect_error){
           die('Connection Failed   :' .$connect->connect_error);
       }

       $sql = "INSERT INTO demo (clientID, empID, fechaHora)
                VALUES ('$cliente_id', '$vendedor_id', '$fecha')";

       if(!mysqli_query($connect, $sql)){
           echo "Not inserted <br>";
       }

       else{
           echo "Inserted <br>";
       }


   }

   

   header("refresh:2; url=../../html/main/index.html");


?>