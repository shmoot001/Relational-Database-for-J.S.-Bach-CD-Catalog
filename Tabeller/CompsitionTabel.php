<html>
<head>
	<title>Compistion</title>
</head>

<body>
	<h3>Compistion</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr�ga och spara den i en variabel */
	$query = "SELECT CompID, Composition_Name, BWV_Num FROM composition";

	/* K�r SQL-fr�gan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

    if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* H�r skriver jag ut antalet rader i resultat-tabellen */
	echo "<P>antal: " . mysqli_num_rows($result) . " composition\n </P>";


?>


  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>CompID</th>
      <th bgcolor=#eeeedd style='width: 200px;'>Composition Name</th>
      <th bgcolor=#eeeeee style='width: 200px;'>BWV Num</th>
    </tr>


<?php

/* H�mta en rad i taget fr�n resultat-tabellen och l�gg attributv�rdena i variablerna 
   $spid, $sname och $year. Skriv ut dessa samtidigt som du skapar en rad i en HTML-tabell */
   while (list($CompID, $Composition_Name, $BWV_Num) = mysqli_fetch_row($result))
   {
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $CompID . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Composition_Name . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $BWV_Num . "</td>";
    echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>