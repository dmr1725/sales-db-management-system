<?php
   if(isset($_POST['submit'])){
       $cliente_id = $_POST['clienteID'];
       $vendedor_id = $_POST['vendedorID'];
    
      

       include '../connect.php';

       
       if($connect->connect_error){
           die('Connection Failed   :' .$connect->connect_error);
       }

       $sql = "DELETE FROM venta where clientID = $cliente_id and empID = $vendedor_id";

       if(!mysqli_query($connect, $sql)){
           echo "Not deleted <br>";
       }

       else{
           echo "Deleted <br>";
       }


   }

   

   header("refresh:2; url=../../html/main/index.html");
    
   
?>