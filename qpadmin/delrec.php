<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file deletes a record from the IKnew table based on an ID that has been passed to it from sedel.php
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

include("common.php");
include_once("header.php");
include("connect.php");

//retrieve $id data input from seldel.php
$id = $_POST['ID'];

//build query string
$query = "DELETE FROM iknew WHERE iknew.ID = '$id'";

//perform query to delete record based on $id variable
$result = mysql_query($query) or die("MS-Query Error in Delete-query");

//display confirmation
echo "<br><br><center><strong>Record successfully deleted!</center></strong><br><br>";

include("footer.php");
?>