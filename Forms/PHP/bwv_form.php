<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h2>Search Results</h2>

    <?php
    // Database connection
    $db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3");

    if (!$db) {
        echo("Could not connect to MySQL server!" . mysqli_connect_error());
    }

    // Retrieve search parameters from form
    $bwvNumber = $_GET['bwv_number'];

    // Construct SQL query based on search parameters
    $query = 
    "SELECT composition.BWV_Num, composition.Composition_Name, cd.TITLE, performer.Performer_Name 
    FROM composition
    JOIN comp_cd ON composition.CompID = comp_cd.CompID
    JOIN cd ON comp_cd.CID = cd.CID
    LEFT JOIN cd_performer ON cd.CID = cd_performer.CID
    LEFT JOIN performer ON cd_performer.PID = performer.PID

    WHERE composition.BWV_Num = '$bwvNumber';        
    ";
    // Execute SQL query
    $result = mysqli_query($db, $query);

    if (!$result) {
        echo("<p>Error performing query.</p>");
    }
    ?>

    <table border="1">
    <tr>
    <th bgcolor=#eeeeee style='width: 200px;'>BWV_Num</th>
    <th bgcolor=#eeeeee style='width: 200px;'>Composition_Name</th>
    <th bgcolor=#eeeeee style='width: 200px;'>CD TITLE</th>
    <th bgcolor=#eeeeee style='width: 200px;'>Performer_Name</th>

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
_
    ?>

  </table>

</body>
</html>
