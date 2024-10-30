<html>
<head>
	<title>Q3</title>
</head>

<body>
	<h3>Q3 : list all CDs with a recording of BWV 780, together with artists' names and CD titles</h3>
    <pre>
    SELECT cd.TITLE AS 'CD Title', performer.Performer AS 'Artist Name'
    FROM cd
    JOIN cd_performer ON cd.CID = cd_performer.CID
    JOIN performer ON cd_performer.PID = performer.PID
    WHERE cd.CID IN (
        SELECT CID
        FROM comp_cd
        WHERE CompID IN (
            SELECT CompID
            FROM composition
            WHERE BWV_Num = 'BWV 780'
        )
    );
    </pre>
	<hr>
<?php
	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "ahmasham101", "00Ahmad00@", "ahmasham101_Labb3" );
	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }
	$query = "SELECT cd.TITLE , performer.Performer_Name
    FROM cd
    JOIN cd_performer ON cd.CID = cd_performer.CID
    JOIN performer ON cd_performer.PID = performer.PID
    WHERE cd.CID IN (
        SELECT CID
        FROM comp_cd
        WHERE CompID IN (
            SELECT CompID
            FROM composition
            WHERE BWV_Num = 'BWV 780'
        )
    );
    
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
    <th bgcolor=#eeeeee style='width: 200px;'>Title</th>
    <th bgcolor=#eeeeee style='width: 200px;'>Artist</th>
    </tr>
<?php

while (list($TITLE, $Performer_Name) = mysqli_fetch_row($result))
{
    echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $TITLE . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Performer_Name . "</td>";
    echo "</tr>";
}
?>

  </table>

<br><br>
<a href="index.html">Home</a>
</body>

</html>