<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file will create the iknew table and subsequent fields.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

include("connect.php");
include("header.php");
include("common.php");

//build a query string to create the database
$query = "Create DATABASE `iknew2`";

//build a query string to create the table
$query1 = "CREATE TABLE IF NOT EXISTS `iknew2` (
  `ID` int(16) NOT NULL AUTO_INCREMENT,
  `Herbarium` varchar(255) DEFAULT NULL,
  `Taxon` varchar(255) DEFAULT NULL,
  `Bar_Code` varchar(255) DEFAULT NULL,
  `GUID` varchar(255) DEFAULT NULL,
  `Private` tinyint(1) NOT NULL DEFAULT '0',
  `Image` varchar(255) DEFAULT NULL,
  `Kingdom` varchar(255) DEFAULT NULL,
  `Genus` varchar(255) DEFAULT NULL,
  `Species` varchar(255) DEFAULT NULL,
  `Variety_Name` varchar(255) DEFAULT NULL,
  `Ssp_Name` varchar(255) DEFAULT NULL,
  `Ssp_Varietal_Name` varchar(255) DEFAULT NULL,
  `Taxon_Author` varchar(255) DEFAULT NULL,
  `Accession` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `County` varchar(255) DEFAULT NULL,
  `Habitat` varchar(255) DEFAULT NULL,
  `Locality` varchar(255) DEFAULT NULL,
  `Latitude` varchar(255) DEFAULT NULL,
  `Longitude` varchar(255) DEFAULT NULL,
  `Quadrangle` varchar(255) DEFAULT NULL,
  `Collector` varchar(255) DEFAULT NULL,
  `Collection_Number` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Family` varchar(255) DEFAULT NULL,
  `Annotation` varchar(255) DEFAULT NULL,
  `Col_Date` date DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Natural_Area` varchar(255) DEFAULT NULL,
  `Col_Datet` date DEFAULT NULL,
  `Symbol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63321";

//run query to create new database
$result=mysql_query($query);

//check for errors in above ran query
if (!$result) {
    die('Error creating Database: ' . mysql_error());
}

//run query to select new database
$result2=mysql_selectdb('iknew2');

//check for errors in above ran query
if (!$result2) {
    die('Error selecting Database: ' . mysql_error());
}

//run query to create new table
$result3=mysql_query($query1);

//check for errors in above ran query
if (!$result3) {
    die('Error creating Table: ' . mysql_error());
}

//echo a message to show database created successfully
echo "<br><br><br><br><center><strong>Database & Table Created!</center></strong><br><br><br>";

include("footer.php");
?>
