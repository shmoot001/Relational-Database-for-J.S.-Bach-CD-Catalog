<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comp_CD </title>
</head>
<body>
    <h2>Comp_CD</h2>

    <?php
    // Database connection
    $db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3");

    if (!$db) {
        echo("Could not connect to MySQL server!" . mysqli_connect_error());
    }


	$query = 
    "SELECT cd.CID, orchestra.OrcID
    FROM cd
    JOIN cd_orc ON cd.CID = cd_orc.CID
    JOIN orchestra ON cd_orc.OID = orchestra.OrcID
    ORDER BY cd.CID;
    ";

    
    // Execute SQL query
    $result = mysqli_query($db, $query);

    if (!$result) {
        echo("<p>Error performing query.</p>");
    }
    ?>

    <table border="1">
    <tr>
    <th bgcolor=#eeeeee style='width: 200px;'>CID</th>
    <th bgcolor=#eeeeee style='width: 200px;'>OrcID</th>

    </tr>
  

    <?php

    while ($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td bgcolor=#aaaaaa>" . $value . "</td>";
        }
        echo "</tr>";
    }

    ?>

  </table>

</body>
</html>
