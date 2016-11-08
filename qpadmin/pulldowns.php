<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file takes information from an HTML form via $_GET and generates pull down menus containing things like state, county,
//collector, and taxon.
//
//the include files:
//header.php - this contains the html header information such as university banner and icon along with title text
//common.php - this contains global variables that are needed for formatting or shaping queries (such as the maximum number of query results via LIMIT)
//connect.php - this contains the connection settings for the MySQL database (such as Db name, username, password, server)
//footer.php - this contains the information to be displayed at the bottom of the page (copyright, version)
//

//display header
include_once("header.php");

//load global variables common to all
include ("common.php");

//Store the data input from the form into variables to be used to build query string
$searchsymbol = $_POST['symbol'];
$searchcollector = $_POST['collector'];
$searchstate = $_POST['state'];

// connect to database.
include("connect.php");

//create the first query string which will be passed to mysql
$query1 = "SELECT * FROM taxonomy
              WHERE Symbol LIKE '%$searchsymbol%'
              LIMIT $maxsearch";

//store the results of the query in the variable $results
$result1 = mysql_query($query1);

//make sure that the variable options is empty
$options1="";

//extract the information desired from the results and store in variable options
while ($row1=mysql_fetch_array($result1)) {

$taxon=$row1["Taxon"];
$options1.="<OPTION VALUE=\"$taxon\">".$taxon.'</option>';
}

//create the 2nd query string which will be passed to mysql
$query2 = "SELECT DISTINCT Collector FROM iknew WHERE Collector LIKE \"%$searchcollector%\"";

//store the results of the query in the variable $results2
$result2 = mysql_query($query2);

//make sure that the variable options2 is empty
$options2="";

//extract the information desired from the results2 and store in variable options2
while ($row2=mysql_fetch_array($result2)) {

$collector=$row2["Collector"];
$options2.="<OPTION VALUE=\"$collector\">".$collector.'</option>';
}

//create the third query string which will be passed to mysql
$query3 = "SELECT * FROM geography WHERE State LIKE '%$searchstate%'";

//echo query string for debugging
//echo "Query3=$query3<br>";

//store the results of the query in the variable $results3
$result3 = mysql_query($query3);

//echo result for debugging
//echo "Result3 = $result3<br>";

//make sure that the variable options is empty
$options3 = "";

//extract the information desired from the results and store in variable options
while ($row3=mysql_fetch_array($result3)) {
$county=$row3["County"];
$state=$row3["State"];
$options3.="<OPTION VALUE=\"$county\">".$county.'</OPTION>';
}
?>

<!--This section creates the form and the three pull down input fields based on php variables-->
<!--This form posts it's input to new.php-->
<br><br>
<form action="new.php" method="post">
<center>Taxon: <SELECT NAME=taxon>
<OPTION VALUE=0>
<?php echo $options1?>
</SELECT>
<br>
<center>Collector: <SELECT NAME=collector>
<OPTION VALUE=0>
<?php echo $options2?>
</SELECT>
<br>
<center>County: <SELECT NAME=county>
<OPTION VALUE=0>
<?php echo $options3?>
</SELECT>
<br>
<center>State: <input type="text" name="state" VALUE="<?php echo $state ?>">
<br>
<center><input type="submit" value="Submit" />
</form>
<?php
//display footer
include_once("footer.php");
?>
