<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file allows a user to print a label from an IKnew database entry.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

// connect to database.
include_once("header.php");
include("connect.php");
include("common.php");

//import the Accession Number from the form in search.php and store in variable $searchaccession
$searchaccession = mysqli_real_escape_string($mysqli,$_GET['accession']);

//  Create query from values passed from search.php above
$query = "SELECT * FROM iknew WHERE Accession = '$searchaccession'";

// submit the query
$result = mysql_query($query);

// for every result do the below
while ($row = mysql_fetch_array($result))
{
//Start a HTML Table
echo "<table style='width: 500px'>";
echo "<tr><td><b><center>EASTERN KENTUCKY UNIVERSITY HERBARIUM</center></td></tr>";
echo "<tr><td><b><center><b><u>Flora of $row[State]</u></b></center></td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td><center>$row[County] County</center></td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td>$row[Family]</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td>$row[Taxon]</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td>Locality: $row[Locality]</td></tr>";
echo "<tr><td>Latitude: $row[Latitude]  Longitude: $row[Longitude]</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td>Habitat: $row[Habitat]</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td>Notes: $row[Comments]</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td>Collector Name: $row[Collector]<br></td></tr>";
echo "<tr><td>Collection Number: $row[Collection_Number]<br></td></tr>";
echo "<tr><td>Date: $row[Col_Date]</td></tr>";
echo "</table>";
}
?>

</body>
</html>
<?php
//display footer
include_once("footer.php");
?>