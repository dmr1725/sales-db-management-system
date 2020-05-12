<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <title>Total de Ventas</title>
</head>
<body>

    <p>Clientes que ya tienen cita, pero el vendedor no ha dado la demo por cualquier razon</p>
    <table id = "table">
        <tr>
            <th>Vendedor</th>
            <th></th>
            <th>Cliente</th>
            <th></th>
            
        </tr>
    
        <?php
        
        // $mysqli =  new mysqli("localhost", "root", "", "rainsoftdb");
        include '../mysqli.php';

        

        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "select e.FirstName, e.LastName, c.FirstName, c.LastName from demo d inner join vendedor e on d.empID = e.vendedorID 
                    inner join cliente c on d.clientID = c.clientID where c.clientID in (select d.clientId from demo d where d.cloro = '')";
        $result = $mysqli->query($query);


        while($row = $result->fetch_array(MYSQLI_NUM)){
            echo "<tr>";
                echo "<th>" .$row[0] . "</th>";
                echo "<th>" .$row[1] . "</th>";
                echo "<th>" .$row[2] . "</th>";
                echo "<th>" .$row[3] . "</th>";
                
            echo "<tr>";
        }


        $mysqli->close();
    ?> 

    </table>
</body>
</html>