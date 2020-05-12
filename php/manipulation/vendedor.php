<?php
   if(isset($_POST['submit'])){
       $name = $_POST['username'];
       $lname = $_POST['lname'];

       include '../connect.php';

       if($connect->connect_error){
           die('Connection Failed   :' .$connect->connect_error);
       }

       $sql = "INSERT INTO vendedor (FirstName, LastName) VALUES ('$name', '$lname')";

       if(!mysqli_query($connect, $sql)){
           echo "Not inserted <br>";
       }

       else{
           echo "Inserted <br>";
       }


   }

   echo "Your first name is : ".$name. "<br>";
   echo "Your last name is : ".$lname. "<br>";

   header("refresh:2; url=../../html/main/index.html");


?>