<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file deals with restoring the database
//it accomplishes this by using mysqldump to import the database from a file
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

//string for restore
$restore = "mysql -u root -pS0M0teItB3 iknew < iknew.sql";

//issue command to backup
exec($restore);

//display message to show backup accomplished
echo "<br><br><br><br><center><strong>Database has been successfully restored up!</center></strong><br><br><br>";

include("footer.php");
?> 