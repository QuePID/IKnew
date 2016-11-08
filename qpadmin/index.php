<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file is the first file loaded in the Admin area of the IKnew package.
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
<br><center><img alt="EKU Herbarium Gold Label" src="../images/ribbedturquoisegold.jpg" width="354" height="37"></center><br><br>
<center><a href="./search.php">Search the Herbarium</a></center>
<center><a href="../browser_family.php">Browse the Herbarium Collection</a></center>
<center><a href="./prenew.php">Add a New Entry</a></center>
<center><a href="./edit.php">Edit an Entry</a></center>
<center><a href="./sedel.php">Delete an Entry</a></center>
<center><a href="../images/zoomify.html">Zoomify Example</a></center>
<center><a href="./backup.php">Backup Database</a></center>
<center><a href="./restore.php">Restore Database</a></center>
<center><a href="../phpmyadmin/index.php">PHPMyAdmin</a></center>
<center><a href="./duplicates.php"/>Build Duplicate Table (slow)</a></center>
<center><a href="./showdupes.php"/>View Duplicate Table</a></center>
<center><a href="./moveimages.php"/>Move Processed Images to /IMAGES subfolder</a></center>
<center><a href="../templates.php">Excel Templates</a></center>
<center><a href="./labels.php">Print Herbarium Label</a></center>
</body>
</html>
<?php
//display footer
include_once("footer.php");
?>