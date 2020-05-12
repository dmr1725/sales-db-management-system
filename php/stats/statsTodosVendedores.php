<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <title>Stats de todos los vendedores</title>
</head>
<body>


    <table id = "table">
        <tr>
            <th>Vendedor</th>
            <th>Citas Asignadas</th>
            <th>Demos</th>
            <th>Ventas</th>
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

      
        $query_citas = "SELECT e.FirstName, COUNT(d.empID) AS `demo` FROM demo d inner join vendedor e on d.empId = e.vendedorID
                        GROUP BY d.empID";
        $query_demo = "SELECT e.FirstName, COUNT(d.empID) AS `demo` FROM demo d inner join vendedor e on d.empId = e.vendedorID 
                        where d.cloro <> '' GROUP BY d.empID";
        $query_ventas = "SELECT e.FirstName, COUNT(v.empID) AS `sales` FROM venta v inner join vendedor e on v.empId = e.vendedorID
                        GROUP BY v.empID";
     
     
        $result1 = $mysqli->query($query_citas);
        $result2 = $mysqli->query($query_demo);
        $result3 = $mysqli->query($query_ventas);

        
        
       while($row1 = $result1->fetch_array(MYSQLI_NUM)){
            $row2 = $result2->fetch_array(MYSQLI_NUM);
            $row3 = $result3->fetch_array(MYSQLI_NUM);
            echo "<tr>";
                echo "<th>" .$row1[0] . "</th>";
                echo "<th>" .$row1[1] . "</th>";
                echo "<th>" .$row2[1] . "</th>";
                echo "<th>" .$row3[1] . "</th>";
            echo "<tr>";
       }
       
        

        $mysqli->close();
    ?> 

    </table>
</body>
</html>