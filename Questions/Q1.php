<html>
<head>
	<title>Q1</title>
</head>

<body>
	<h3>Q1 : list all the harpsichord pieces in the library</h3>
  <pre>
  SELECT composition.Composition_Name, cd.CID, cd.TITLE
  FROM composition 
  
  JOIN comp_instrument ON composition.CompID = comp_instrument.CompID 
  JOIN instrument ON comp_instrument.InstID = instrument.InstID 
  
  JOIN comp_cd ON composition.CompID = comp_cd.CompID
  JOIN cd ON comp_cd.CID = cd.CID
  WHERE instrument.Instrument_Name = 'Harpsichord';
  </pre>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	$query = "SELECT composition.Composition_Name, cd.CID, cd.TITLE
    FROM composition 

    JOIN comp_instrument ON composition.CompID = comp_instrument.CompID 
    JOIN instrument ON comp_instrument.InstID = instrument.InstID 

    JOIN comp_cd ON composition.CompID = comp_cd.CompID
    JOIN cd ON comp_cd.CID = cd.CID


    WHERE instrument.Instrument_Name = 'Harpsichord';
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
    <th bgcolor=#eeeeee style='width: 200px;'>composition</th>
    <th bgcolor=#eeeeee style='width: 200px;'>CID</th>
    <th bgcolor=#eeeeee style='width: 200px;'>CD Title</th>
    </tr>


<?php

while (list($composition, $CID, $TITLE) = mysqli_fetch_row($result))
{
    echo "<tr>";
    echo "<td bgcolor=#aaaaaa>" . $composition . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $CID . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $TITLE . "</td>";
    echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>