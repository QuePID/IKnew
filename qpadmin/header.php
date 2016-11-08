<?PHP
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file is loaded via other php and displays a header at the top of every page.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//
?>
<html>
<head><title>Eastern Kentucky University Herbarium</title> <style type="text/css"> table { empty-cells:show; } </style></head>
<BODY BGCOLOR="#FFFFCC" TEXT=BLACK LINK=BLUE VLINK=PURPLE ALINK=RED>
<table bgcolor="7C2B4E" style="width: 100%">
	<tr><td><a href="http://herbariumdb.eku.edu"><img id="ekuLogo" src="../images/eku.jpg" alt="Eastern Kentucky University" style="float: left"></a></td><td><h1><font color="FFFFFF">Herbarium</FONT></h1></td>	</tr>
</table>