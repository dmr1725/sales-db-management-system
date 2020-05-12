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


    <table id = "table">
        <tr>
            <th>Cliente Nombre</th>
            <th>Cliente Apellido</th>
            
        </tr>
    
        <?php
        
        include '../mysqli.php';

        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $query = "select c.FirstName, c.LastName from cliente c where c.clientID not in (select d.clientId from demo d)";
        $result = $mysqli->query($query);


    
       

        while($row = $result->fetch_array(MYSQLI_NUM)){
            echo "<tr>";
                echo "<th>" .$row[0] . "</th>";
                echo "<th>" .$row[1] . "</th>";
                
            echo "<tr>";
        }


        $mysqli->close();
    ?> 

    </table>
</body>
</html>