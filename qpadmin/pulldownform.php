<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file file generates a HTML form which then passes those values via $_GET to pulldowns.php which will generate pull down menus
//for selecting things like taxon, state, county, and collector.
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
<form action="pulldowns.php" method="post">
<center><strong>Symbol Lookup</strong></center>
<center>Symbol: <input type="text" name="symbol" style="width: 241px" /></center>
<br><br>
<center><strong>Collector Lookup<br></strong></center>
<center>Symbol: <input type="text" name="collector" style="width: 241px" /></center>
<center><input type="submit" /></center>
</form>
<?php
//display footer
include_once("footer.php");
?>