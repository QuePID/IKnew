<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file produces an HTML form which will pass necessary information (Accession #) to printlabel.php.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

//display header
include_once("header.php");
include("common.php");
?>
<br><br>
<form action="printlabel.php" method="get">
<center><strong>Print A Herbarium Label From Accession#</strong></center><br><br>
<center><strong>Accession Number: </strong><input type="text" size="10" name="accession" style="width: 241px" /><br></center>
<center><input type="submit" /></center>
</form>

<?php
//display footer
include_once("footer.php");
?>
</body>
</html> 