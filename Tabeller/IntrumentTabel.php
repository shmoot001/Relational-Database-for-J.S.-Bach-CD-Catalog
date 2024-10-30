<html>
<head>
	<title>instrument</title>
</head>

<body>
	<h3>instrument</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	$query = "SELECT InstID, Instrument_Name FROM instrument";

	$result = mysqli_query($db,$query);

    if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	echo "<P>antal: " . mysqli_num_rows($result) . " instrument\n </P>";


?>


  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>InstID</th>
      <th bgcolor=#eeeedd style='width: 200px;'>Instrument_Name</th>
    </tr>


<?php

while (list($InstID, $Instrument_Name) = mysqli_fetch_row($result))
{
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $InstID . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Instrument_Name . "</td>";
    echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>