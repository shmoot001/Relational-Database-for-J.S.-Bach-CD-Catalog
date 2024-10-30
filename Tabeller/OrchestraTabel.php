<html>
<head>
	<title>Performer</title>
</head>

<body>
	<h3>Performer</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	$query = "SELECT OrcID, Orchestra_Name FROM orchestra";

	$result = mysqli_query($db,$query);

    if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	echo "<P>antal: " . mysqli_num_rows($result) . " orchestra\n </P>";


?>


  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>OrcID</th>
      <th bgcolor=#eeeedd style='width: 200px;'>Orchestra_Name</th>
    </tr>


<?php

while (list($OrcID, $Orchestra_Name) = mysqli_fetch_row($result))
{
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $OrcID . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Orchestra_Name . "</td>";
    echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>