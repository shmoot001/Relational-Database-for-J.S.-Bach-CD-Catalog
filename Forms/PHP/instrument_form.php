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
        die("Could not connect to MySQL server!" . mysqli_connect_error());
    }

    // Retrieve search parameters from form
    $instrument_Input = $_GET['instrument'];

    // Construct SQL query based on search parameters
    if (!empty($instrument_Input)) {
        $query = "
        SELECT instrument.Instrument_Name, composition.Composition_Name, cd.TITLE
        FROM instrument

        JOIN comp_instrument ON instrument.InstID = comp_instrument.InstID
        JOIN composition ON comp_instrument.CompID = composition.CompID
        
        JOIN comp_cd ON composition.CompID = comp_cd.CompID
        JOIN cd ON comp_cd.cid = cd.cid

        WHERE instrument.Instrument_Name = '$instrument_Input';
        ";

        // Execute SQL query
        $result = mysqli_query($db, $query);

        if (!$result) {
            die("<p>Error performing query: " . mysqli_error($db) . "</p>");
        } else {
            // Count the number of rows
            $row_count = mysqli_num_rows($result);
            echo "<p>Number of results: $row_count</p>";
        }
    } else {
        echo "<p>Please enter a search term.</p>";
        exit;
    }
    ?>

    <table border="1">
    <tr>
        <th bgcolor="#eeeeee" style="width: 200px;">Instrument_Name</th>
        <th bgcolor="#eeeeee" style="width: 200px;">Composition_Name</th>
        <th bgcolor="#eeeeee" style="width: 200px;">CD_TITLE</th>
        <th bgcolor="#eeeeee" style="width: 200px;">Row Number</th>
    </tr>

    <?php
    $row_number = 1; // Initialize the row number counter
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td bgcolor=\"#aaaaaa\">" . htmlspecialchars($value) . "</td>";
        }
        // Add the row number cell
        echo "<td bgcolor=\"#aaaaaa\">" . $row_number . "</td>";
        echo "</tr>";
        $row_number++; // Increment the row number counter
    }
    ?>

    </table>

</body>
</html>
