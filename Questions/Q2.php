<html>
<head>
	<title>Q2</title>
</head>

<body>
	<h3>Q2 : llist all available concertos (composition names that contains the word "concert") </h3>
  <pre>
  SELECT Composition
  FROM composition
  WHERE Composition LIKE '%concert%';

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
    WHERE Composition_Name LIKE '%concert%';    
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
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>