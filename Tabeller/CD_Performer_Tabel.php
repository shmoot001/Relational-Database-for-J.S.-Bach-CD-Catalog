<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comp_instrument </title>
</head>
<body>
    <h2>Comp_instrument</h2>

    <?php
    // Database connection
    $db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3");

    if (!$db) {
        echo("Could not connect to MySQL server!" . mysqli_connect_error());
    }


	$query = 
    "SELECT cd.CID, performer.PID
    FROM cd
    JOIN cd_performer ON cd.CID = cd_performer.CID
    JOIN performer ON cd_performer.PID = performer.PID
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
    <th bgcolor=#eeeeee style='width: 200px;'>PID</th>

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
