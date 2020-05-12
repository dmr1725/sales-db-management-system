<?php
   if(isset($_POST['submit'])){
       $name = $_POST['username'];
       $precio = $_POST['price'];

       include '../connect.php';

       if($connect->connect_error){
           die('Connection Failed   :' .$connect->connect_error);
       }

       $sql = "INSERT INTO productos (Pname, Price) VALUES ('$name', '$precio')";

       if(!mysqli_query($connect, $sql)){
           echo "Not inserted <br>";
       }

       else{
           echo "Inserted <br>";
       }


   }

   echo "Product name : ".$name. "<br>";
   echo "Price : ".$precio. "<br>";

   header("refresh:2; url=../../html/main/index.html");

    

?>