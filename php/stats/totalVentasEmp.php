<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <title>Document</title>
</head>
<body>

    
    <table id = "table">
        <tr>
            <th>Vendedor</th>
            <th></th>
            <th>Cliente</th>
            <th></th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Fecha</th>
        </tr>
    
        <?php
         if(isset($_POST['submit'])){
            $vendedor_id = $_POST['vendedorID'];
         }
           
         include '../mysqli.php';

        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "SELECT e.FirstName, e.LastName, c.FirstName, c.LastName, p.pname, p.price, v.fecha from venta v 
                inner join vendedor e on v.empID = e.vendedorID inner join cliente c on v.clientID = c.clientID 
                inner join productos p on v.pid = p.pid
                where e.vendedorID = '$vendedor_id'";

        $result = $mysqli->query($query);


    
       

        while($row = $result->fetch_array(MYSQLI_NUM)){
            echo "<tr>";
                echo "<th>" .$row[0] . "</th>";
                echo "<th>" .$row[1] . "</th>";
                echo "<th>" .$row[2] . "</th>";
                echo "<th>" .$row[3] . "</th>";
                echo "<th>" .$row[4] . "</th>";
                echo "<th>" .$row[5] . "</th>";
                echo "<th>" .$row[6] . "</th>";
            echo "<tr>";
        }

        

        $mysqli->close();
    ?> 

    </table>
</body>
</html>