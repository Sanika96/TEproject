<?php # Script 8.6 - view_users.php #2
// This script retrieves all the records from the users table.
session_start();


if (!(isset($_SESSION['varname1']) && $_SESSION['varname1'] != '')) {

header ("Location: index.php");
}


$page_title = 'View your Information';
include ('header.html');
?>

<div id="navigation">
		<ul>
			<li><h4><a href="edit.php">Edit Profile</a></h4></li>
			<li><h4><a href="delete.php">Delete Profile</a></h4></li>
			<li><h4><a href="chart.php">Statistical Analysis</a></h4></li>
			<li><h4><a href="logout.php">Logout</a></h4></li>
			
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->





<?php

$e = $_SESSION['varname1'];
$p = $_SESSION['varname2'];
// Page header:
echo "<h1>Your Information</h1>";
require_once ('mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "select * from user_info where email='$e' and pass='$p';";	

$r = @mysqli_query ($dbc, $q); // Run the query.

$myrow = @mysqli_fetch_array ($r);
$code = substr($myrow["lname"],0,4);
$finalcode = "".$code.$myrow["byear"].$myrow["uid"];

echo "<br><br><h2>You have been assigned the UID: ".$finalcode."</h2>";

echo "<h3><br>";
echo "<b>Name: </b>".$myrow["fname"]." ".$myrow["lname"];
echo "<br><b>Birth Date: </b>".$myrow["bday"]." ".$myrow["bmonth"]." ".$myrow["byear"];
echo "<br><b>Email address: </b>".$myrow["email"];
echo "<br><b>Mobile Number: </b>".$myrow["mob"];
echo "<br><b>Gender: </b>".$myrow["gender"];
echo "<br><b>Marital Status: </b>".$myrow["marital"];
echo "<br><b>Address: </b>".$myrow["address"];
echo "<br><b>City: </b>".$myrow["city"];
echo "<br><b>State: </b>".$myrow["state"];
echo "<br><b>Pin Code: </b>".$myrow["pin"];
echo "<br><b>Nationality: </b>".$myrow["nationality"];
echo "<br><b>Blood Group: </b>".$myrow["bgrp"];	
echo "<br><b>Physical Disability: </b>".$myrow["phy"];
echo "<br><b>Insurance Number: </b>".$myrow["insure"];
echo "<br><b>Driving Licence Number: </b>".$myrow["licence"];
echo "<br><b>Vehicle Plate Number: </b>".$myrow["vnum"];
echo "<br><b>Qualifications: </b>".$myrow["qualification"];
echo "<br><b>Occupations: </b>".$myrow["occu"];
echo "<br><b>Annual Income: </b>".$myrow["income"];
echo "<br><b>Bank Name: </b>".$myrow["bkname"];
echo "<br><b>Account Number: </b>".$myrow["accNo"];
echo "<br><b>Criminal Record: </b>".$myrow["crime"];
echo "<br><b>Crime Details: </b>".$myrow["cdetails"];
echo "</h3>";



mysqli_close($dbc); // Close the database connection.



include ('footer.html');


?>


