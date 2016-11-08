<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file generates a HTML form which will be used to add a new record to the IKnew table.
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
//import the variables from the form in prenew.php and store in variables
$taxon = $_POST['taxon'];
$collector = $_POST['collector'];
$county = $_POST['county'];
$state = $_POST['state'];

//  Create query from values passed from search.php above
$query = "SELECT * FROM taxonomy WHERE Taxon LIKE '$taxon'";

// submit the query
$result = mysql_query($query);

//Start a HTML Table
echo "<table border=1>";

// for every result do the below
$row = mysql_fetch_array($result);
?>

<form action="post.php" method="post">
<table style="width: 100%" class="style1" cellspacing="1">
<tr><td class="style4" style="height: 26px">Herbarium Code:</td>
	<td class="style4" style="height: 26px"><select name="Herbarium">
	<option value="EKY" selected>Eastern Kentucky University Herbarium
<option value="WVA">West Virginia University Herbarium
</SELECT></td><td class="style4" style="height: 26px"></td><td class="style4" style="height: 26px"></td>
<tr><td class="style2" style="height: 26px">Taxon: </td>
	<td style="width: 372px; height: 26px;" class="style2">
	<INPUT TYPE="text" NAME="Taxon" VALUE="<?php print $taxon ?>" style="width: 369px"></td>
<td style="height: 26px" class="style2">Bar_Code:  </td>
	<td style="height: 26px" class="style2">
	<INPUT TYPE="text" NAME="Bar_Code" style="width: 530px"></td></tr>
<tr><td class="style3">GUID:  </td><td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="GUID" VALUE="" style="width: 369px"></td>
<td class="style3">Image:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Image" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style4">Kingdom:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Kingdom" VALUE="Plantae" style="width: 370px"></td>
<td class="style4">Genus:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Genus" VALUE="<?php print $row["Genus"] ?>" style="width: 530px"></td></tr>
<tr><td class="style2">Species:  </td><td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="Species" VALUE="<?php print $row["Species"] ?>" style="width: 369px"></td>
<td class="style2">Variety_Name:  </td><td class="style2">
	<INPUT TYPE="text" NAME="Variety_Name" VALUE="<?php print $row["Variety_Name"] ?>" style="width: 530px"></td></tr>
<tr><td class="style3">Ssp_Name:  </td><td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Ssp_Name" VALUE="<?php print $row["Ssp_Name"] ?>" style="width: 369px"></td>
<td class="style3">Ssp_Variety_Name:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Ssp_Varietal_Name" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style4">Taxon_Author:  </td>
	<td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Taxon_Author" VALUE="<?php print $row["Taxon_Author"] ?>" style="width: 369px"></td>
<td class="style4">Accession:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Accession" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style2">State:  </td><td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="State" VALUE="<?php print $state ?>" style="width: 369px"></td>
<td class="style2">County:  </td><td class="style2">
	<INPUT TYPE="text" NAME="County" VALUE="<?php print $county ?>" style="width: 530px"></td></tr>
<tr><td class="style3">Habitat:  </td><td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Habitat" VALUE="" style="width: 369px; height: 89px"></td>
<td class="style3">Locality:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Locality" VALUE="" style="width: 530px; height: 90px"></td></tr>
<tr><td class="style4">Latitude:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Latitude" VALUE="" style="width: 369px"></td>
<td class="style4">Longitude:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Longitude" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style2">Quadrangle:  </td>
	<td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="Quadrangle" VALUE="" style="width: 369px"></td>
<td class="style2">Collector:  </td><td class="style2">
	<INPUT TYPE="text" NAME="Collector" VALUE="<?php print $collector ?>" style="width: 530px"></td></tr>
<tr><td class="style3">Collection_Number:  </td>
	<td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Collection_Number" VALUE="" style="width: 369px"></td>
<td class="style3">Country:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Country" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style4">Family:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Family" VALUE="<?php print $row["Family"] ?>" style="width: 369px"></td>
<td class="style4">Annotation:  </td><td class="style4">
	<INPUT TYPE="text" NAME="Annotation" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style2">Col_Date:  </td><td style="width: 372px" class="style2">
	<INPUT TYPE="text" NAME="Col_Date" VALUE="" style="width: 369px; height: 90px;"></td>
<td class="style2">Comments:  </td><td class="style2">
	<INPUT TYPE="text" NAME="Comments" VALUE="" style="width: 530px; height: 90px"></td></tr>
<tr><td class="style3">Natural_Area:  </td>
	<td style="width: 372px" class="style3">
	<INPUT TYPE="text" NAME="Natural_Area" VALUE="" style="width: 369px"></td>
<td class="style3">Col_Datet:  </td><td class="style3">
	<INPUT TYPE="text" NAME="Col_Datet" VALUE="" style="width: 530px"></td></tr>
<tr><td class="style4">Symbol:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Symbol" VALUE="<?php print $row["Symbol"] ?>" style="width: 369px"></td>
	<td class="style4">Private:  </td><td style="width: 372px" class="style4">
	<INPUT TYPE="text" NAME="Private" VALUE="0" style="width: 369px"></td>
	</tr>
</table>
<center><input type="submit" value="Submit" /></center>
</form>
<?php
//display footer
include_once("footer.php");
?>