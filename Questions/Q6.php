<html>
<head>
	<title>Q6</title>
</head>

<body>
	<h3>Q6 : Show compositions with Al Fine's favorite key (F Minor) </h3>
  <pre>
  SELECT Composition
    FROM composition
    WHERE Composition LIKE '%F# Minor';


  </pre>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	$query = "SELECT Composition_Name
    FROM composition
    WHERE Composition_Name LIKE '%F# Minor';
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
    </tr>


<?php

while (list($Composition_Name) = mysqli_fetch_row($result))
{
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $Composition_Name . "</td>";
    echo "</tr>";
}
?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>