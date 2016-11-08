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

//
//This collects the data input from the new.php and inserts the data into a new record of the database
//

//retrieves information necessary to connect to MySQL
include("connect.php");

//Fetch global variables common to all php
include("common.php");

//Display the html headers
include_once("header.php");

//Store input from the form editor.php into variables and use mysqli_real_escape_string to wrap
//problematic characters with appropriate backslashes so that we can build a proper insert line
$id = mysqli_real_escape_string($mysqli,$_POST['ID']);
$herbarium = mysqli_real_escape_string($mysqli,$_POST['Herbarium']);
$taxon = mysqli_real_escape_string($mysqli,$_POST['Taxon']);
$bar_code = mysqli_real_escape_string($mysqli,$_POST['Bar_Code']);
$guid = mysqli_real_escape_string($mysqli,$_POST['GUID']);
$private = mysqli_real_escape_string($mysqli,$_POST['Private']);
$image = mysqli_real_escape_string($mysqli,$_POST['Image']);
$kingdom = mysqli_real_escape_string($mysqli,$_POST['Kingdom']);
$genus = mysqli_real_escape_string($mysqli,$_POST['Genus']);
$species = mysqli_real_escape_string($mysqli,$_POST['Species']);
$variety_name = mysqli_real_escape_string($mysqli,$_POST['Variety_Name']);
$ssp_name = mysqli_real_escape_string($mysqli,$_POST['Ssp_Name']);
$ssp_varietal_name = mysqli_real_escape_string($mysqli,$_POST['Ssp_Varietal_Name']);
$taxon_author = mysqli_real_escape_string($mysqli,$_POST['Taxon_Author']);
$accession = mysqli_real_escape_string($mysqli,$_POST['Accession']);
$state = mysqli_real_escape_string($mysqli,$_POST['State']);
$county = mysqli_real_escape_string($mysqli,$_POST['County']);
$habitat = mysqli_real_escape_string($mysqli,$_POST['Habitat']);
$locality = mysqli_real_escape_string($mysqli,$_POST['Locality']);
$latitude = mysqli_real_escape_string($mysqli,$_POST['Latitude']);
$longitude = mysqli_real_escape_string($mysqli,$_POST['Longitude']);
$quadrangle = mysqli_real_escape_string($mysqli,$_POST['Quadrangle']);
$collector = mysqli_real_escape_string($mysqli,$_POST['Collector']);
$collection_number = mysqli_real_escape_string($mysqli,$_POST['Collection_Number']);
$country = mysqli_real_escape_string($mysqli,$_POST['Country']);
$family = mysqli_real_escape_string($mysqli,$_POST['Family']);
$annotation = mysqli_real_escape_string($mysqli,$_POST['Annotation']);
$col_date = mysqli_real_escape_string($mysqli,$_POST['Col_Date']);
$comments = mysqli_real_escape_string($mysqli,$_POST['Comments']);
$natural_area = mysqli_real_escape_string($mysqli,$_POST['Natural_Area']);
$col_datet = mysqli_real_escape_string($mysqli,$_POST['Col_Datet']);
$symbol = mysqli_real_escape_string($mysqli,$_POST['Symbol']);

//build the query string for inserting a record into the databases using the variables $table_fields and $qvalues
$query = "UPDATE iknew SET ID='$id', Herbarium='$herbarium', Taxon='$taxon', Bar_Code='$bar_code', GUID='$guid', Private='$private', Image='$image', Kingdom='$kingdom', Genus='$genus', Species='$species', Variety_Name='$variety_name', Taxon_Author='$taxon_author', Accession='$accession', State='$state', County='$county', Habitat='$habitat', Locality='$locality', Latitude='$latitude', Longitude='$longitude', Quadrangle='$quadrangle', Collector='$collector', Collection_Number='$collection_number', Country='$country', Family='$family', Annotation='$annotation', Col_Date='$col_date', Comments='$comments', Natural_Area='$natural_area', Col_datet='$col_datet', Symbol='$symbol' WHERE iknew.ID = '$id' LIMIT 1";

echo "$query<br><br><br>";
//run the query
$result = mysql_query($query);

//Display any potential errors
echo mysql_error(); 

echo "<br><br><br><center><strong>Record successfully Updated!</strong></cente><br><br><br><br>";

//Display the html footer
include_once("footer.php");
?>