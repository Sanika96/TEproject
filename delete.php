<?php # Script 8.6 - view_users.php #2
// This script retrieves all the records from the users table.
session_start();

if (!(isset($_SESSION['varname1']) && $_SESSION['varname1'] != '')) {

header ("Location: index.php");

}


$page_title = 'Goodbye';
include ('header.html');
?>
<div id="navigation">
		<ul>
			<li><h4><a href="register.php">Register</a></h4></li>
			<li><h4><a href="index.php">Login</a></h4></li>
			
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->



<?php

$e = $_SESSION['varname1'];
$p = $_SESSION['varname2'];

require_once ('mysqli_connect.php'); // Connect to the db.

$q = "delete from user_info where email='$e' and pass='$p';";		
$r = @mysqli_query ($dbc, $q); // Run the query.


echo "<br><br><h2>You have successfully deleted your record. Thank you for using MESCOE Identity.</h2>";


mysqli_close($dbc); // Close the database connection.

include ('footer.html');
session_destroy();
?>


