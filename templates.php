<?php
//IKnew Herbarium Database Package
//Created by Robert R. Pace
//robert_pace3@eku.edu
//quepid@gmail.com
//
//This PHP/MySQL solution was created under direction of Dr. Ronald L. Jones from Eastern Kentucky University
//with the purpose to update the previous database (Index Kentuckiensis) to an online model with similar functionality
//
//This file deals with displaying a list of Excel templates and Mailmerge documents.
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
<br><br><br>
<center><a href="./templates/iknew_template.xlsx">Lite Template (No Taxon Lookups)</a></center>
<br>
<center><a href="./templates/iknew_template_with_taxon.xlsm">Complete Template with Taxon Lookups</a></center>
<br>
<center><a href="./templates/EKY_MailMerge.docx">IKnew MailMerge Form - Use this to print herbarium labels from the Excel Templates (must not have cell formulas in excel sheet</a></center><br>
<br><br><br>
<?php
//display footer
include_once("footer.php");
?>