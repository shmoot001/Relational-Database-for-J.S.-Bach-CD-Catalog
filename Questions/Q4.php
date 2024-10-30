<html>
<head>
	<title>Q4</title>
</head>

<body>
	<h3>Q4 : list all the Glenn Gould recordings</h3>
  <pre>
  SELECT cd.TITLE, composition.Composition_Name
  FROM cd
  JOIN cd_performer ON cd.CID = cd_performer.CID
  JOIN performer ON cd_performer.PID = performer.PID
  JOIN comp_cd ON cd.CID = comp_cd.CID
  JOIN composition ON comp_cd.CompID = composition.CompID
  WHERE performer.Performer_Name = 'Glenn Gould';
  </pre>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	$query = "SELECT cd.TITLE, composition.Composition_Name
    FROM cd
    JOIN cd_performer ON cd.CID = cd_performer.CID
    JOIN performer ON cd_performer.PID = performer.PID
    JOIN comp_cd ON cd.CID = comp_cd.CID
    JOIN composition ON comp_cd.CompID = composition.CompID
    WHERE performer.Performer_Name = 'Glenn Gould';
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
    <th bgcolor=#eeeeee style='width: 200px;'>TITLE</th>
    <th bgcolor=#eeeeee style='width: 200px;'>Composition_Name</th>
    </tr>


<?php

while (list($TITLE, $Composition_Name) = mysqli_fetch_row($result))
{
    echo "<tr>";
    echo "<td bgcolor=#aaaaaa>" . $TITLE . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $Composition_Name . "</td>";
    echo "</tr>";
}
?>
  </table>
<br><br>
<a href="index.html">Home</a>
</body>
</html>