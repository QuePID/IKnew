<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file deals with displaying a tabled list of families found within the IKnew database.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

//display the html header
include_once("header.php");

// connect to database.
include("connect.php");

//load the global variables
include("common.php");

//initialize $row_count, this variable will hold the number of rows returned by the query
//and will be used to color resultant rows
$row_count = 0;
//
// Statistics
//

//Count the number of unique families within the collection
$famresults = mysql_query("SELECT COUNT(DISTINCT Family) AS Family FROM iknew");
$stats_f = mysql_fetch_assoc($famresults);
$statsf = $stats_f['Family'];
//Count the number of unique genera within the collection
$genresults = mysql_query("SELECT COUNT(DISTINCT Family, Genus) AS Genus FROM iknew");
$stats_g = mysql_fetch_assoc($genresults);
$statsg = $stats_g['Genus'];
//count the number of unique species within the collection
$speresults = mysql_query("SELECT COUNT(DISTINCT Family, Genus, Species) AS Species FROM iknew");
$stats_s = mysql_fetch_assoc($speresults);
$statss = $stats_s['Species'];
//count the total number of records within the collection
$totresults = mysql_query("SELECT COUNT(*) AS Total FROM iknew");
$stats_t = mysql_fetch_assoc($totresults);
$statst = $stats_t['Total'];

//Build a query string that will display unique families
$query = "SELECT DISTINCT Family from iknew ORDER BY Family LIMIT $maxsearch";

// submit the query
$result = mysql_query($query) or die("MS-Query Error in select-query");

//calculate number of results of the query ran and display
$querystats=mysql_num_rows($result); 

//Display statistics
echo "<br><center><p><b>This database houses $statsf plant families, $statsg genera, and $statss species, totaling $statst specimens. </b></p></center><br>";

//Start a HTML Table for results
echo "<center><table border=1>";

// displaying results in a HTML Table
echo "<tr><td bgcolor=$color3><b>Family</b></td></tr>";

//initialize $resultcounter variable
$resultcounter=1;

// for every result returned from query do the below

while ($row = mysql_fetch_array($result))
{

// determine row colour
$row_color = ($row_count % 2) ? $color1 : $color2;

// prepare url for genera browsing
$genurl = "$urlthree"."browser_genera.php"."?"."family="."$row[Family]";

//
// Now display actual data in the table cells via echo to browser of the $row's array of data
   echo "<tr><td bgcolor=$row_color><a href='$genurl'><b>$row[Family]</b></a></td></tr>";
      $resultcounter++;
   
   // Add 1 to the row count
   $row_count++;

}
// close the table
echo "</table></center>";

//display footer
include_once("footer.php");
?>
</div>

</body>
</html>
