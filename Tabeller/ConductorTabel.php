<html>
<head>
	<title>Conductor</title>
</head>

<body>
	<h3>Conductor</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	$query = "SELECT CondID, Conductor_Name FROM conductor";

	$result = mysqli_query($db,$query);

    if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	echo "<P>antal: " . mysqli_num_rows($result) . " conductor\n </P>";


?>


  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>CondID</th>
      <th bgcolor=#eeeedd style='width: 200px;'>Conductor_Name</th>
    </tr>


<?php

while (list($CondID, $Conductor_Name) = mysqli_fetch_row($result))
{
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $CondID . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Conductor_Name . "</td>";
    echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>