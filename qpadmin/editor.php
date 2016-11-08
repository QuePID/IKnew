<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file retrieves a record from the IKnew table and displays it via a HTML form for editing.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//
?>
<head>
<style type="text/css">
.style1 {
	border: 2px solid #800000;
background-color: #0099CC;
}
.style2 {
	background-color: #FFFFFF;
}
.style3 {
	background-color: #CCCCCC;
}
.style4 {
	background-color: #999999;
}
</style>
</head>

<?php
//display header
include_once("header.php");

// connect to database.
include("connect.php");

//include common variables/settings
include("common.php");


//import the Accession Number from the form in edit.php and protect against nulls or rogue code then store in variable $editaccession

$editaccession = mysqli_real_escape_string($mysqli,$_POST['accession']);
?>
<form action="updater.php" method="post">
<?php

//  Create query from values passed from search.php above
$query = "SELECT * FROM iknew WHERE Accession LIKE '$editaccession'";

// submit the query
$result = mysql_query($query);

//Start a HTML Table
echo "<table border=1>";

// Define the urls data for later use in the echo statements, $urlone will hold the first half of the url, with $urltwo holding the remainder

// for every result do the below
$row = mysql_fetch_array($result);
?>
<table style="width: 100%" class="style1" cellspacing="1">
<tr><td class="style4" style="height: 26px">Herbarium Code:</td>
	<td class="style4" style="height: 26px"><INPUT TYPE="text" NAME="Herbarium" VALUE="<?php print $row["Herbarium"] ?>" style="width: 369px"></td>
	<td class="style4" style="height: 26px">ID: </td>
	<td class="style4" style="height: 26px"><INPUT TYPE="text" NAME="ID" VALUE="<?php print $row["ID"] ?>" style="width: 369px"></td>
<tr><td class="style2" style="height: 26px">Taxon: </td>
	<td style="width: 372px; height: 26px;" class="style2">
	<INPUT TYPE="text" NAME="Taxon" VALUE="<?php print $row["Taxon"] ?>" style="width: 369px"></td>
<td style="height: 26px" class="style2">Bar_Code:  </td>
	<td style="height: 26px" class="style2">
	<INPUT TYPE="text" NAME="Bar_Code" VALUE="<?php print $row["Bar_Code"] ?>" style="width: 530px"></td></tr>
<tr><td class="style3">GUID:  </td><td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="GUID" VALUE="<?php print $row["GUID"] ?>" style="width: 369px"></td>
<td class="style3">Image:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Image" VALUE="<?php print $row["Image"] ?>" style="width: 530px"></td></tr>
<tr><td class="style4">Kingdom:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Kingdom" VALUE="<?php print $row["Kingdom"] ?>" style="width: 370px"></td>
<td class="style4">Genus:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Genus" VALUE="<?php print $row["Genus"] ?>" style="width: 530px"></td></tr>
<tr><td class="style2">Species:  </td><td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="Species" VALUE="<?php print $row["Species"] ?>" style="width: 369px"></td>
<td class="style2">Variety_Name:  </td><td class="style2">
	<INPUT TYPE="text" NAME="Variety_Name" VALUE="<?php print $row["Variety_Name"] ?>" style="width: 530px"></td></tr>
<tr><td class="style3">Ssp_Name:  </td><td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Ssp_Name" VALUE="<?php print $row["Ssp_Name"] ?>" style="width: 369px"></td>
<td class="style3">Ssp_Variety_Name:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Ssp_Varietal_Name" VALUE="<?php print $row["Ssp_Varietal_Name"] ?>" style="width: 530px"></td></tr>
<tr><td class="style4">Taxon_Author:  </td>
	<td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Taxon_Author" VALUE="<?php print $row["Taxon_Author"] ?>" style="width: 369px"></td>
<td class="style4">Accession:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Accession" VALUE="<?php print $row["Accession"] ?>" style="width: 530px"></td></tr>
<tr><td class="style2">State:  </td><td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="State" VALUE="<?php print $row["State"] ?>" style="width: 369px"></td>
<td class="style2">County:  </td><td class="style2">
	<INPUT TYPE="text" NAME="County" VALUE="<?php print $row["County"] ?>" style="width: 530px"></td></tr>
<tr><td class="style3">Habitat:  </td><td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Habitat" VALUE="<?php print $row["Habitat"] ?>" style="width: 369px; height: 89px"></td>
<td class="style3">Locality:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Locality" VALUE="<?php print $row["Locality"] ?>" style="width: 530px; height: 90px"></td></tr>
<tr><td class="style4">Latitude:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Latitude" VALUE="<?php print $row["Latitude"] ?>" style="width: 369px"></td>
<td class="style4">Longitude:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Longitude" VALUE="<?php print $row["Longitude"] ?>" style="width: 530px"></td></tr>
<tr><td class="style2">Quadrangle:  </td>
	<td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="Quadrangle" VALUE="<?php print $row["Quadrangle"] ?>" style="width: 369px"></td>
<td class="style2">Collector:  </td><td class="style2">
	<INPUT TYPE="text" NAME="Collector" VALUE="<?php print $row["Collector"] ?>" style="width: 530px"></td></tr>
<tr><td class="style3">Collection_Number:  </td>
	<td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Collection_Number" VALUE="<?php print $row["Collection_Number"] ?>" style="width: 369px"></td>
<td class="style3">Country:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Country" VALUE="<?php print $row["Country"] ?>" style="width: 530px"></td></tr>
<tr><td class="style4">Family:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Family" VALUE="<?php print $row["Family"] ?>" style="width: 369px"></td>
<td class="style4">Annotation:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Annotation" VALUE="<?php print $row["Annotation"] ?>" style="width: 530px"></td></tr>
<tr><td class="style2">Col_Date:  </td><td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="Col_Date" VALUE="<?php print $row["Col_Date"] ?>" style="width: 369px; height: 90px;"></td>
<td class="style2">Comments:  </td><td class="style2">
	<INPUT TYPE="text" NAME="Comments" VALUE="<?php print $row["Comments"] ?>" style="width: 530px; height: 90px"></td></tr>
<tr><td class="style3">Natural_Area:  </td>
	<td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Natural_Area" VALUE="<?php print $row["Natural_Area"] ?>" style="width: 369px"></td>
<td class="style3">Col_Datet:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Col_Datet" VALUE="<?php print $row["Col_Datet"] ?>" style="width: 530px"></td></tr>
<tr><td class="style4">Symbol:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Symbol" VALUE="<?php print $row["Symbol"] ?>" style="width: 369px"></td>
	<td class="style4">Private:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Private" VALUE="<?php print $row["Private"] ?>" style="width: 369px"></td>
	</tr>
</table>
<br>
<center><input type="submit" value="Submit" /></center>
</form>
<?php
//display footer
include_once("footer.php");
?>