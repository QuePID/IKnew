<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file is the default file opened when someone visits IKnew, from here the other pages are subsequently linked
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
<br><center><img alt="EKU Herbarium Gold Label" src="./images/ribbedturquoisegold.jpg" width="354" height="37"></center><br><br>
<center><a href="./search.php">Search the Herbarium</a></center>
<center><a href="./browser_family.php">Browse the Herbarium Collection</a></center>
<center><a href="./images/zoomify.html">Zoomify Example</a></center>
<center><a href="./templates.php">Excel Templates</a></center>
<center><a href="./labels.php">Print Herbarium Label</a></center>
<center><a href="./screencaps.php">Screen Captures (Demonstration)</a></center>
<center><a href="./qpadmin/index.php">Administrative Login</a><center>
</body>
</html>
<?php
//display footer
include_once("footer.php");
?>