<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file contains a HTML form which will pass via $_POST an accession number to the editor.php that will enable editing of a record.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

include_once("header.php");
include("common.php");
?>
<br><br>
<form action="editor.php" method="post">
<strong>Edit Entry::Accession Number</strong><br><br>
<strong>Accession Number: </strong><input type="text" size="10" name="accession" value="EKY" style="width: 241px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" />
</form>
<?php
//display footer
include_once("footer.php");
?>