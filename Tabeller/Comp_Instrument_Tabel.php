<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comp_instrument Tabell </title>
</head>
<body>
    <h2>comp_instrument Tabell</h2>

    <?php
    // Database connection
    $db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3");

    if (!$db) {
        echo("Could not connect to MySQL server!" . mysqli_connect_error());
    }


	$query = 
    "SELECT composition.CompID, instrument.InstID
    FROM composition
    JOIN comp_instrument ON composition.CompID = comp_instrument.CompID
    JOIN instrument ON comp_instrument.InstID = instrument.InstID
    ORDER BY composition.CompID;
    ";

    
    // Execute SQL query
    $result = mysqli_query($db, $query);

    if (!$result) {
        echo("<p>Error performing query.</p>");
    }
    ?>

    <table border="1">
    <tr>
    <th bgcolor=#eeeeee style='width: 200px;'>compID</th>
    <th bgcolor=#eeeeee style='width: 200px;'>InstID</th>
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
