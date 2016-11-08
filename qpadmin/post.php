<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file adds a new record to the IKnew table by recieving data from other php files via $_POST from an HTML form.
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

//Store input from the form new.php into variables and use mysqli_real_escape_string to wrap
//problematic characters with appropriate backslashes so that we can build a proper insert line
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
$query = "INSERT INTO iknew (Herbarium, Taxon, Bar_Code, GUID, Private, Image, Kingdom, Genus, Species, Variety_Name, Ssp_Name, Ssp_Varietal_Name, Taxon_Author, Accession, State, County, Habitat, Locality, Latitude, Longitude, Quadrangle, Collector, Collection_Number, Country, Family, Annotation, Col_Date, Comments, Natural_Area, Col_Datet, Symbol) VALUES ('$herbarium', '$taxon', '$bar_code', '$guid', '$private', '$image', '$kingdom', '$genus', '$species', '$variety_name', '$ssp_name', '$ssp_varietal_name', '$taxon_author', '$accession', '$state', '$county', '$habitat', '$locality', '$latitude', '$longitude', '$quadrangle', '$collector', '$collection_number', '$country', '$family', '$annotation', '$col_date', '$comments', '$natural_area', '$col_datet', '$symbol')";

//run the query
$result = mysql_query($query);

//Display any potential errors
echo mysql_error(); 

echo "<br><br><br><center><strong>Record successfully added!</strong></cente><br><br><br><br>";

//Display the html footer
include_once("footer.php");
?>