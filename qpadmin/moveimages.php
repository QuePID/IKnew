<?php 
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file's main duty is to move images from the temporary folder to the image folder tree. 
//It accomplishes this by reading the barcode from the imagelist.txt file line by line, querying the barcode number and thus obtaining
//the family/genus/species for that barcoded entry.  It then generates a batch file which is a series of move commands that will
//move the images and image folders into the appropriate subfolder under images folder.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

//display the html header
include_once("header.php");

// connect to database.
include("connect.php");

//load the global variables
include("common.php");

//execute the batch file getimagelists.bat which will generate a list of image files present in the /images/temp folder
//system("cmd /c D:\\wamp\\www\qpadmin\\getimageslist.bat");
//echo "<b>Batch file executed...<b><br><br>";

//create handle and open the file image.list.txt in read mode
$file_imagelist = fopen("D:\\wamp\\www\\qpadmin\\imagelist.txt", "r+");

//open the move.bat file into read and write mode
$fw_mbat = fopen("D:\\wamp\\www\\qpadmin\\move.bat", "w+");

fwrite($fw_mbat, "cd D:/wamp/www/images/temp/\n");

//Let the client know that batch file is being created
echo "<b>Processing batch file...</b><br><br>";

//while not at the end of the file, get a line from the file and store in $line, echo this line
while (!feof($file_imagelist)) {
$line = fgets($file_imagelist);

//we only need the barcode number, not the .jpg file type, which is also stored in imagelist.txt
//so we use substr to cut off this portion of the string
$bc = substr($line,-20,14);

//build a query string based on the barcode read from the imagelist.txt file
$query = "SELECT * FROM iknew WHERE Bar_Code=$bc LIMIT 1";

//issue query and collect results into variable $result
$result = mysql_query($query) or die("MS-Query Error in select-query");

//parse the results into an array $row
$row = mysql_fetch_array($result);

//fill the following variables using data retrieved from query
$barcode = $row['Bar_Code'];
$family = "$row[Family]";
$genus = "$row[Genus]";
$species = "$row[Species]";

//generate a text line that will be written to the move.bat file which will move the full sized jpeg
$batlines1="MOVE /Y $bc".".jpg"." "."D:/wamp/www/images/"."$family/"."$genus/"."$species/"."\n";
echo "$batlines1 <br>";

//generate a text line that will be written to the move.bat file which will move the thumbnail files
$batlines2="MOVE /Y $bc"."_sm.jpg"." "."D:/wamp/www/images/"."$family/"."$genus/"."$species/"."\n";
echo "$batlines2 <br>";

//generate a text line that will be written to the move.bat file which will move the cameras raw files
$batlines3="MOVE /Y $bc".".cr2"." "."D:/wamp/www/images/"."$family/"."$genus/"."$species/"."\n";
echo "$batlines3 <br>";

//generate a text line that will be written to the move.bat file which will move the zoomify folders and files
$batlines4="MOVE /Y $bc"." "."D:/wamp/www/images/"."$family/"."$genus/"."$species/"."\n";
echo "$batlines4 <br>";

//generate a text line that will be written to the move.bat file which will move the html files
$batlines5="MOVE /Y $bc".".html"." "."D:/wamp/www/images/"."$family/"."$genus/"."$species/"."\n";
echo "$batlines5 <br>";

//write the $batlines to the MOVE.BAT file
fwrite($fw_mbat, $batlines1);
fwrite($fw_mbat, $batlines2);
fwrite($fw_mbat, $batlines3);
fwrite($fw_mbat, $batlines4);
fwrite($fw_mbat, $batlines5);
}

//exit while due to being at the end of the file and echo that we are at the end of the file
echo "-End of File-<br>";

//close the file
fclose($file_imagelist);

//close the file
fclose($fw_mbat);

//let the client know that the batch file has been created
echo "<b>Batch file completed!</b><br>";

echo "<br><b>Moving files.....</b><br><br>";
//execute the batch file move.bat which will move the images located in /www/images/temp/ to the /images/ subfolders
system("cmd /c D:\\wamp\\www\qpadmin\\move.bat");
echo "<b>Batch file MOVE.BAT executed...<b><br><br>";

?>