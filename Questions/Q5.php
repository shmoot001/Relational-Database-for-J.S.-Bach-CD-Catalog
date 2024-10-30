<html>
<head>
	<title>Q5</title>
</head>

<body>
	<h3>Q5 : how many recordings in the library are of the same piece?</h3>
    <pre>
    SELECT composition.Composition, COUNT(*) AS 'Num Recordings'
    FROM composition
    JOIN comp_cd ON composition.CompID = comp_cd.CompID
    GROUP BY composition.Composition
    HAVING COUNT(*) > 1;
    </pre>
	<hr>
<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );
	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }
	$query = "SELECT composition.Composition_Name, COUNT(*)
    FROM composition
    JOIN comp_cd ON composition.CompID = comp_cd.CompID
    GROUP BY composition.Composition_Name
    HAVING COUNT(*) > 1;
    ";

	$result = mysqli_query($db,$query);
    if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}
	//echo "<P>antal: " . mysqli_num_rows($result) . " orchestra\n </P>";
?>
  <table border="1">
    <tr>
    <th bgcolor=#eeeeee style='width: 200px;'>Composition_Name</th>
    <th bgcolor=#eeeeee style='width: 200px;'>Num_Recordings</th>
    </tr>
<?php

while (list($Composition_Name, $Num_Recordings) = mysqli_fetch_row($result))
{
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $Composition_Name . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Num_Recordings . "</td>";
    echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>