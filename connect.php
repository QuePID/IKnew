<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@mymail.eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file contains the necessary credentials to connect to the MySQL database
//

//mysql server ip:port
$dbhost = 'localhost:3306';

//mysql server username
$dbuser = '';

//mysql server password
$dbpass = '';

//mysql database name
$dbname = '';

//connection variables which will establish connection to MySQL database or return error
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Could not connect to mysql: ' . mysql_error());
$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Could not connect to mysqli: ' . mysqli_connect_errno());

mysql_select_db($dbname);
?>