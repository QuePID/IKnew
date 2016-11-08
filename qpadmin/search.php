<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file generates the HTML form which passes values via $_GET to display.php which will subsequently display the results.
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
<br>
<form action="display.php" method="get">
<center><strong>Search the herbaria</strong></center>
<center><strong>Herbarium: </strong><input type="text" size="6" name="herbarium" style="width: 241px" /></center>
<center><strong>Genus: </strong><input type="text" size="6" name="genus" style="width: 241px" /></center>
<center><strong>Species: </strong><input type="text" size="6" name="species" style="width: 241px" /></center>
<center><strong>State: </strong><input type="text" size="6" name="state" style="width: 241px" /></center>
<center><strong>County: </strong><input type="text" size="6" name="county" style="width: 241px" /></center>
<center><strong>Family: </strong><input type="text" size="6" name="family" style="width: 241px" /></center>
<center><strong>Locality: </strong><input type="text" size="6" name="locality" style="width: 241px" /></center>
<center><strong>Accession: </strong><input type="text" size="6" name="accession" style="width: 241px" /></center>
<center><strong>Collector: </strong><input type="text" size="6" name="collector" style="width: 241px" /></center>
<center><strong>Collection Number: </strong><input type="text" size="6" name="coll_no" style="width: 241px" /></center>
<center><strong>Symbol: </strong><input type="text" size="6" name="symbol" style="width: 241px" /></center>
<center><input type="submit" /></center>
</form>
</body>
</html> 
<?php
//display footer
include_once("footer.php");
?>