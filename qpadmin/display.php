<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file deals with displaying the results of queries produced from the html form located in search.php
//it accomplishes this by receiving the form data and issueing a query, with the results dumped to browser in the form of a table.
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

//import the values chosen from the form in search.php and process them against nulls and bad characters then store them in variables

//Create variables that will house the GET values, which are then checked to see if 
//they contain a value, if not then set them as NULL.

$IKherbarium = (isset($_GET['herbarium']) ? $_GET['herbarium'] : null);
$IKgenus = (isset($_GET['genus']) ? $_GET['genus'] : null);
$IKspecies = (isset($_GET['species']) ? $_GET['species'] : null);
$IKstate = (isset($_GET['state']) ? $_GET['state'] : null);
$IKcounty = (isset($_GET['county']) ? $_GET['county'] : null);
$IKfamily = (isset($_GET['family']) ? $_GET['family'] : null);
$IKlocality = (isset($_GET['locality']) ? $_GET['locality'] : null);
$IKaccession = (isset($_GET['accession']) ? $_GET['accession'] : null);
$IKcollector = (isset($_GET['collector']) ? $_GET['collector'] : null);
$IKcollno = (isset($_GET['coll_no']) ? $_GET['coll_no'] : null);
$IKsymbol = (isset($_GET['symbol']) ? $_GET['symbol'] : null);

//this checks to ensure that the GET information isn't malicious code by passing it through mysqli to strip out
//undesirable code passed to GET

$searchherbarium = mysqli_real_escape_string($mysqli,$IKherbarium);
$searchgenus = mysqli_real_escape_string($mysqli,$IKgenus);
$searchspecies = mysqli_real_escape_string($mysqli,$IKspecies);
$searchstate = mysqli_real_escape_string($mysqli,$IKstate);
$searchcounty = mysqli_real_escape_string($mysqli,$IKcounty);
$searchfamily = mysqli_real_escape_string($mysqli,$IKfamily);
$searchlocality = mysqli_real_escape_string($mysqli,$IKlocality);
$searchaccession = mysqli_real_escape_string($mysqli,$IKaccession);
$searchcollector = mysqli_real_escape_string($mysqli,$IKcollector);
$searchcollno = mysqli_real_escape_string($mysqli,$IKcollno);
$searchsymbol = mysqli_real_escape_string($mysqli,$IKsymbol);

//Initialize the prequery variables
$prequery = "SELECT * FROM iknew WHERE Private = 0";
$prequery1 = "";
$prequery2 = "";
$prequery3 = "";
$prequery4 = "";
$prequery5 = "";
$prequery6 = "";
$prequery7 = "";
$prequery8 = "";
$prequery9 = "";
$prequery10 = "";
$prequery11 = "";

//Initialize variables to hold plants.usda.gov search string fragments.
$usda1 = "http://plants.usda.gov/java/nameSearch?keywordquery=";
$usda2 = "&mode=sciname&submit.x=0&submit.y=0";

//Initialize variables to hold wikipedia search string fragments.
$wiki1 = "http://en.wikipedia.org/wiki/";

//Detect if the passed variables from search.php are empty (null) if not then build a portion of the query by adding a string to prequery variables
if ($searchherbarium != '') $prequery1 = "AND Herbarium LIKE '%$searchherbarium%'";
if ($searchgenus != '') $prequery2 = "AND Genus LIKE '%$searchgenus%'";
if ($searchspecies != '') $prequery3 = "AND Species LIKE '%$searchspecies%'";
if ($searchstate != '') $prequery4 = "AND State LIKE '%$searchstate%'";
if ($searchcounty != '') $prequery5 = "AND County LIKE '%$searchcounty%'";
if ($searchfamily != '') $prequery6= "AND Family LIKE '%$searchfamily%'";
if ($searchlocality != '') $prequery7 = "AND Locality LIKE '%$searchlocality%'";
if ($searchaccession != '') $prequery8 = "AND Accession LIKE '%$searchaccession%'";
if ($searchcollector != '') $prequery9 = "AND Collector LIKE '%$searchcollector%'";
if ($searchcollno != '') $prequery10 = "AND Collection_Number LIKE '$searchcollno'";
if ($searchsymbol != '') $prequery11 = "AND Symbol LIKE '%$searchsymbol%'";

//initialize $row_count, this variable will hold the number of rows returned by the query
//and will be used to color resultant rows
$row_count = 0;

//concantenate all the prequery variables into a query string which will be used to query the database
$query = "$prequery $prequery1 $prequery2 $prequery3 $prequery4 $prequery5 $prequery6 $prequery7 $prequery8 $prequery9 $prequery10 $prequery11 LIMIT $maxsearch";

//echo the query string to screen for debugging
//echo $query;

// submit the query
$result = mysql_query($query) or die("MS-Query Error in select-query");

//calculate number of results of the query ran and display
$querystats=mysql_num_rows($result); 
echo "<center><p><b>Your query returned $querystats results (max queries = $maxsearch)</b></p></center>";

//Start a HTML Table
echo "<table border=1>";

// display results in HTML Table
echo "<tr><td bgcolor=$color3><b>#</b></td><td bgcolor=$color3><b>ID</td><td bgcolor=$color3><b>Herbarium</b></td><td bgcolor=$color3><b>Taxon</td><td bgcolor=$color3><b>Bar_Code</td><td bgcolor=$color3><b>GUID</td><td bgcolor=$color3><b>Image</td><td bgcolor=$color3><b>Kingdom</td><td bgcolor=$color3><b>Genus</td><td bgcolor=$color3><b>Species</td><td bgcolor=$color3><b>Variety_Name</td><td bgcolor=$color3><b>Ssp_Name</td><td bgcolor=$color3><b>Ssp_Varietal_Name</td><td bgcolor=$color3><b>Taxon_Author</td><td bgcolor=$color3><b>Accession</td><td bgcolor=$color3><b>State</td><td bgcolor=$color3><b>County</td><td bgcolor=$color3><b>Habitat</td><td bgcolor=$color3><b>Locality</td><td bgcolor=$color3><b>Latitude</td><td bgcolor=$color3><b>Longitude</td><td bgcolor=$color3><b>Quadrangle</td><td bgcolor=$color3><b>Collector</td><td bgcolor=$color3><b>Collection_Number</td><td bgcolor=$color3><b>Country</td><td bgcolor=$color3><b>Family</td><td bgcolor=$color3><b>Annotation</td><td bgcolor=$color3><b>Col_Date</td><td bgcolor=$color3><b>Comments</td><td bgcolor=$color3><b>Natural_Area</td><td bgcolor=$color3><b>Col_Datet</td><td bgcolor=$color3><b>Symbol</td><td bgcolor=$color3><b>More Info</td></tr>";
//echo "<tr><td bgcolor=$color3><b>#</b></td><td bgcolor=$color3><b>ID</td><td bgcolor=$color3><b>Herbarium</b></td><td bgcolor=$color3><b>Taxon</td><td bgcolor=$color3><b>Image</td><td bgcolor=$color3><b>Accession</td><td bgcolor=$color3><b>State</td><td bgcolor=$color3><b>County</td><td bgcolor=$color3><b>Habitat</b></td><td bgcolor=$color3><b>Locality</b></td><td bgcolor=$color3><b>Latitude</td><td bgcolor=$color3><b>Longitude</td><td bgcolor=$color3><b>Quadrangle</td><td bgcolor=$color3><b>Collector</td><td bgcolor=$color3><b>Collection_Number</td><td bgcolor=$color3><b>Country</td><td bgcolor=$color3><b>Family</td><td bgcolor=$color3><b>Annotation</td><td bgcolor=$color3><b>Col_Date</td><td bgcolor=$color3><b>Symbol</td><td bgcolor=$color3><b>More Info</b></td></tr>";

// Define the urls data for later use in the echo statements, $urlone will hold the first half of the url, with $urltwo holding the remainder

//initialize $resultcounter variable
$resultcounter=1;

// for every result returned from query do the below

while ($row = mysql_fetch_array($result))
{

// determine row colour
$row_color = ($row_count % 2) ? $color1 : $color2;

//
//Define the variables that will be output via the table from the row array returned by MySQL query.
//
$IKid = "$row[ID]";
$IKherbarium = "$row[Herbarium]";
$IKtaxon = "$row[Taxon]";
$IKbarcode = "$row[Bar_Code]";
$IKguid = "$row[GUID]";
$IKimage = "$row[Image]";
$IKkingdom = "$row[Kingdom]";
$IKgenus = "$row[Genus]";
$IKspecies = "$row[Species]";
$IKvarietyname = "$row[Variety_Name]";
$IKsspname = "$row[Ssp_Name]";
$IKsspvarietalname = "$row[Ssp_Varietal_Name]";
$IKtaxonauthor = "$row[Taxon_Author]";
$IKaccession = "$row[Accession]";
$IKstate = "$row[State]";
$IKcounty = "$row[County]";
$IKhabitat = "$row[Habitat]";
$IKlocality = "$row[Locality]";
$IKlatitude = "$row[Latitude]";
$IKlongitude = "$row[Longitude]";
$IKquadrangle = "$row[Quadrangle]";
$IKcollector = "$row[Collector]";
$IKcollectionnumber = "$row[Collection_Number]";
$IKcountry = "$row[Country]";
$IKfamily = "$row[Family]";
$IKannotation = "$row[Annotation]";
$IKcoldate = "$row[Col_Date]";
$IKcomments = "$row[Comments]";
$IKnaturalarea = "$row[Natural_Area]";
$IKcoldatet = "$row[Col_Datet]";
$IKsymbol = "$row[Symbol]";

$usdataxon = "$IKgenus"."+"."$IKspecies";

//Create link prefixs for plants.usda.gov and wikipedia.
$usdami = "<a href='"."$usda1"."$IKgenus"."+"."$IKspecies"."$usda2"."'"." "."'target=_blank'>USDA</a><br>";
$wiki = "<a href='"."$wiki1"."$IKgenus"."_"."$IKspecies"."'"." "."'"."target=_blank'>Wiki</a>";
$checkthumbnail = "$urlone"."$IKfamily"."/"."$IKgenus"."/"."$IKspecies"."/"."$IKbarcode"."_sm.jpg";

//Check to see if thumbnail exists
if (isset($row['Bar_Code'])) {
$thumbnail = "$urlone"."$IKfamily"."/"."$IKgenus"."/"."$IKspecies"."/"."$IKbarcode"."_sm.jpg";
} else {
$thumbnail = "http://localhost/images/comingsoon.jpg";
} 

//Initialize variables to store urls for more indepth queries
$stateq = "$urlq"."state="."$IKstate";
$countyq = "$urlq"."county="."$IKcounty"."&state="."$IKstate";
$collectorq = "$urlq"."collector="."$IKcollector";
$symbolq = "$urlq"."symbol="."$IKsymbol";

// Now display actual data in the table cells via echo to browser of the $row's array of data
   echo "<tr><td bgcolor = $row_color>$resultcounter</td>";
   echo "<td bgcolor=$row_color>"."$IKid"."</td>";
   echo "<td bgcolor=$row_color>"."$IKherbarium"."</td>";
   echo "<td bgcolor=$row_color>"."$IKtaxon"."</td>";
   echo "<td bgcolor=$row_color>"."$IKbarcode"."</td>";
   echo "<td bgcolor=$row_color>"."$IKguid"."</td>";
   echo "<td bgcolor=$row_color><a href="."'"."$urlone"."$IKfamily"."/"."$IKgenus"."/"."$IKspecies"."/"."$IKbarcode.html"."'"." "."'"."target=_blank"."'"."> <image src="."'"."$thumbnail"."'"."></a></td>";
   echo "<td bgcolor=$row_color>"."$IKkingdom"."</td>";
   echo "<td bgcolor=$row_color>"."$IKgenus"."</td>";
   echo "<td bgcolor=$row_color>"."$IKspecies"."</td>";
   echo "<td bgcolor=$row_color>"."$IKvarietyname"."</td>";
   echo "<td bgcolor=$row_color>"."$IKsspname"."</td>";
   echo "<td bgcolor=$row_color>"."$IKsspvarietalname"."</td>";
   echo "<td bgcolor=$row_color>"."$IKtaxonauthor"."</td>";
   echo "<td bgcolor=$row_color>"."$IKaccession"."</td>";
   echo "<td bgcolor=$row_color><a href='$stateq'>"."$IKstate"."</a></td>";
   echo "<td bgcolor=$row_color><a href='$countyq'>"."$IKcounty"."</a></td>";
   echo "<td bgcolor=$row_color>"."$IKhabitat"."</td>";
   echo "<td bgcolor=$row_color>"."$IKlocality"."</td>";
   echo "<td bgcolor=$row_color>"."$IKlatitude"."</td>";
   echo "<td bgcolor=$row_color>"."$IKlongitude"."</td>";
   echo "<td bgcolor=$row_color>"."$IKquadrangle"."</td>";
   echo "<td bgcolor=$row_color>"."<a href='$collectorq'>"."$IKcollector"."</a></td>";
   echo "<td bgcolor=$row_color>"."$IKcollectionnumber"."</td>";
   echo "<td bgcolor=$row_color>"."$IKcountry"."</td>";
   echo "<td bgcolor=$row_color>"."$IKfamily"."</td>";
   echo "<td bgcolor=$row_color>"."$IKannotation"."</td>";
   echo "<td bgcolor=$row_color>"."$IKcoldate"."</td>";
   echo "<td bgcolor=$row_color>"."$IKcomments"."</td>";
   echo "<td bgcolor=$row_color>"."$IKnaturalarea"."</td>";
   echo "<td bgcolor=$row_color>"."$IKcoldatet"."</td>";
   echo "<td bgcolor=$row_color><a href="."'"."$symbolq"."'".">"."$IKsymbol"."</a></td>";
   echo "<td bgcolor=$row_color>"."$usdami"." "."$wiki"."</td>";
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
