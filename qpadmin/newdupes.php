<?php

//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file looks for duplicates in the IKnew table based on accession field and dumps the results to the duplicates table.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

include("connect.php");
include("common.php");
include("header.php");

//query to delete table duplicates
$delquery = "DROP TABLE if exists duplicates";

//delete table duplicates
$result1 = mysql_query($delquery) or die("MS-Query Error in select-query");

//query that will create a new table duplicates that will house all duplicated records within database
$query="CREATE TABLE duplicates AS SELECT a.* FROM iknew a INNER JOIN (SELECT Accession, COUNT(*) FROM iknew GROUP BY Accession HAVING COUNT(*) > 1) b ON a.Accession = b.Accession";

//create new table duplicates
$result = mysql_query($query) or die("MS-Query Error in select-query");

//initialize $row_count, this variable will hold the number of rows returned by the query
//and will be used to color resultant rows
$row_count = 0;

//concantenate all the prequery variables into a query string which will be used to query the database
$query = "SELECT * FROM duplicates ORDER BY Accession";

//echo the query string to screen for debugging
//echo $query;

// submit the query
$result = mysql_query($query) or die("MS-Query Error in select-query");

//calculate number of results of the query ran and display
$querystats=mysql_num_rows($result); 
echo "<center><p><b>Your query returned $querystats results</b></p></center>";

//Start a HTML Table
echo "<table border=1>";

// display results in HTML Table
//echo "<tr><td bgcolor=$color3><b>Taxon</td><td bgcolor=$color3><b>Bar_Code</td><td bgcolor=$color3><b>GUID</td><td bgcolor=$color3><b>Image</td><td bgcolor=$color3><b>Kingdom</td><td bgcolor=$color3><b>Genus</td><td bgcolor=$color3><b>Species</td><td bgcolor=$color3><b>Variety_Name</td><td bgcolor=$color3><b>Ssp_Name</td><td bgcolor=$color3><b>Ssp_Varietal_Name</td><td bgcolor=$color3><b>Taxon_Author</td><td bgcolor=$color3><b>Accession</td><td bgcolor=$color3><b>State</td><td bgcolor=$color3><b>County</td><td bgcolor=$color3><b>Habitat</td><td bgcolor=$color3><b>Locality</td><td bgcolor=$color3><b>Latitude</td><td bgcolor=$color3><b>Longitude</td><td bgcolor=$color3><b>Quadrangle</td><td bgcolor=$color3><b>Collector</td><td bgcolor=$color3><b>Collection_Number</td><td bgcolor=$color3><b>Country</td><td bgcolor=$color3><b>Family</td><td bgcolor=$color3><b>Annotation</td><td bgcolor=$color3><b>Col_Date</td><td bgcolor=$color3><b>Comments</td><td bgcolor=$color3><b>Natural_Area</td><td bgcolor=$color3><b>Col_Datet</td><td bgcolor=$color3><b>Symbol</td></tr>";
echo "<tr><td bgcolor=$color3><b>#</b></td><td bgcolor=$color3><b>ID</td><td bgcolor=$color3><b>Herbarium</b></td><td bgcolor=$color3><b>Taxon</td><td bgcolor=$color3><b>Image</td><td bgcolor=$color3><b>Accession</td><td bgcolor=$color3><b>State</td><td bgcolor=$color3><b>County</td><td bgcolor=$color3><b>Habitat</b></td><td bgcolor=$color3><b>Locality</b></td><td bgcolor=$color3><b>Latitude</td><td bgcolor=$color3><b>Longitude</td><td bgcolor=$color3><b>Quadrangle</td><td bgcolor=$color3><b>Collector</td><td bgcolor=$color3><b>Collection_Number</td><td bgcolor=$color3><b>Country</td><td bgcolor=$color3><b>Family</td><td bgcolor=$color3><b>Annotation</td><td bgcolor=$color3><b>Col_Date</td><td bgcolor=$color3><b>Symbol</td></tr>";

// Define the urls data for later use in the echo statements, $urlone will hold the first half of the url, with $urltwo holding the remainder

//initialize $resultcounter variable
$resultcounter=1;

// for every result returned from query do the below

while ($row = mysql_fetch_array($result))
{

// determine row colour
$row_color = ($row_count % 2) ? $color1 : $color2;

  // Now display actual data in the table cells via echo to browser of the $row's array of data
   echo "<tr><td bgcolor = $row_color>$resultcounter</td>";
   echo "<td bgcolor=$row_color>$row[ID]</td>";
   echo "<td bgcolor=$row_color>$row[Herbarium]</td>";
   echo "<td bgcolor=$row_color>$row[Taxon]</td>";
//   echo "<td bgcolor=$row_color>$row[Bar_Code]</td>";
//   echo "<td bgcolor=$row_color>$row[GUID]</td>";
   echo "<td bgcolor=$row_color>$urlone$row[Family]/$row[Genus]/$urltwo$row[Accession].jpg</td>";
//   echo "<td bgcolor=$row_color>$row[Kingdom]</td>";
//   echo "<td bgcolor=$row_color>$row[Genus]</td>";
//   echo "<td bgcolor=$row_color>$row[Species]</td>";
//   echo "<td bgcolor=$row_color>$row[Variety_Name]</td>";
//   echo "<td bgcolor=$row_color>$row[Ssp_Name]</td>";
//   echo "<td bgcolor=$row_color>$row[Ssp_Varietal_Name]</td>";
//   echo "<td bgcolor=$row_color>$row[Taxon_Author]</td>";
   echo "<td bgcolor=$row_color>$row[Accession]</td>";
   echo "<td bgcolor=$row_color>$row[State]</td>";
   echo "<td bgcolor=$row_color>$row[County]</td>";
   echo "<td bgcolor=$row_color>$row[Habitat]</td>";
   echo "<td bgcolor=$row_color>$row[Locality]</td>";
   echo "<td bgcolor=$row_color>$row[Latitude]</td>";
   echo "<td bgcolor=$row_color>$row[Longitude]</td>";
   echo "<td bgcolor=$row_color>$row[Quadrangle]</td>";
   echo "<td bgcolor=$row_color>$row[Collector]</td>";
   echo "<td bgcolor=$row_color>$row[Collection_Number]</td>";
   echo "<td bgcolor=$row_color>$row[Country]</td>";
   echo "<td bgcolor=$row_color>$row[Family]</td>";
   echo "<td bgcolor=$row_color>$row[Annotation]</td>";
   echo "<td bgcolor=$row_color>$row[Col_Date]</td>";
//   echo "<td bgcolor=$row_color>$row[Comments]</td>";
//   echo "<td bgcolor=$row_color>$row[Natural_Area]</td>";
//   echo "<td bgcolor=$row_color>$row[Col_Datet]</td>";
   echo "<td bgcolor=$row_color>$row[Symbol]</td>";
   echo "</tr>";
   $resultcounter++;
   
   // Add 1 to the row count
   $row_count++;

}
echo "</table>";

//display footer
include_once("footer.php");
?>

</div>

</body>
</html>


?>