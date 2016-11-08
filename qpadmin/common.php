<?PHP
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file houses common elements utilized throughout IKnew's php files.  Features such as color and urls for images, along with the maximum
//query search are set within this file.
//

//create a variable which will house the path to the images folder
$urlone = 'http://herbariumdb.eku.edu/images/';

//create a variable which will be the prefix for the images (example: eku__9010452821)
$urltwo = 'eku__';

//create a variable to retrieve family data for the browse collection function.
$urlthree = "http://localhost/";

//create a variable which will be used to build query strings via url
$urlq = 'http://herbariumdb.eku.edu/qpadmin/display.php?';

//create a variable to hold the college/university name
$university = 'Eastern Kentucky University';

//create a variable to store the maximum number of results to be displayable...note more results means slower searchs!
$maxsearch = 5000;

//Define your colors for the alternating rows and headers
//$color1 & $color2 are for alternating rows, whereas
//$color 3 is for the column headers
//
$color1 = "#99CCFF"; 
$color2 = "#88AAFF";
$color3 = "#CCFF99";

?>
