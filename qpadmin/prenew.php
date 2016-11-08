<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file is generates an HTML form which will pass values via $_GET to pulldowns.php.
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
include("connect.php");
?>
<br>
<form action="pulldowns.php" method="post">
<center><strong>Symbol Lookup</strong></center>
<center>Symbol: <input type="text" name="symbol" style="width: 241px" /></center>
<br>
<center><strong>Collector Lookup<br></strong></center>
<center>Collector: <input type="text" name="collector" style="width: 241px" /></center>
<br>
<center><strong>State Lookup<br></strong</center>
<center>State:  <select name="state"></center>
<option value="">None
<option value="AL">Alabama
<option value="AK">Alaska
<option value="AZ">Arizona
<option value="AR">Arkansas
<option value="CA">California
<option value="CO">Colorado
<option value="CT">Connecticut
<option value="DE">Delaware
<option value="FL">Florida
<option value="GA">Georgia
<option value="HI">Hawaii
<option value="ID">Idaho
<option value="IL">Illinois
<option value="IN">Indiana
<option value="IA">Iowa
<option value="KS">Kansas
<option value="KY" selected>Kentucky
<option value="LA">Louisiana
<option value="ME">Maine
<option value="MD">Maryland
<option value="MA">Massachusetts
<option value="MI">Michigan
<option value="MN">Minnesota
<option value="MS">Mississippi
<option value="MO">Missouri
<option value="MT">Montana
<option value="NE">Nebraska
<option value="NV">Nevada
<option value="NH">New Hampshire
<option value="NJ">New Jersey
<option value="NM">New Mexico
<option value="NY">New York
<option value="NC">North Carolina
<option value="ND">North Dakota
<option value="OH">Ohio
<option value="OK">Oklahoma
<option value="OR">Oregon
<option value="PA">Pennsylvania
<option value="RI">Rhode Island
<option value="SC">South Carolina
<option value="SD">South Dakota
<option value="TN">Tennessee
<option value="TX">Texas
<option value="UT">Utah
<option value="VT">Vermont
<option value="VA">Virginia
<option value="WA">Washington
<option value="DC">Washington D.C.
<option value="WV">West Virginia
<option value="WI">Wisconsin
<option value="WY">Wyoming
</SELECT><br><br>
<center><input type="submit" /></center>
</form>
<br><br>
<?php
//display footer
include_once("footer.php");
?>