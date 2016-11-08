<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file deals with backing up the database
//it accomplishes this by using mysqldump to output the database to a file
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

//string for backup
$backup = "mysqldump --opt --user root --password=S0M0teItB3 iknew > iknew.sql";

//delete any previous backup
if (file_exists(iknew.sql)) { unlink(iknew.sql); }

//issue command to backup
exec($backup);

//display message to show backup accomplished
echo "<br><br><br><br><center><strong>Database has been successfully backedup!</center></strong><br><br><br>";

//display footer
include("footer.php");
?> 