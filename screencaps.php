<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file provides a list of screenshots of the various features of the IKnew package.
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
<center><br><br>Screen Captures of the IKnew Administration Area<br><br></center>
<center><a href="./images/screen01.jpg">Administration Screen</a></center>
<center><a href="./images/screen02.jpg">Add New Entry Screen 1</a></center>
<center><a href="./images/screen03.jpg">Add New Entry Screen 2</a></center>
<center><a href="./images/screen04.jpg">Add New Entry Screen 3</a></center>
<center><a href="./images/screen05.jpg">Print A Herbarium Label</a></center>
<center><a href="./images/screen06.jpg">Download Excell Template</a></center>
<center><a href="./images/screen07.jpg">Edit An Entry</a></center>
</body>
</html>
<?php
//display footer
include_once("footer.php");
?>