<?php # Script 8.6 - view_users.php #2
// This script retrieves all the records from the users table.
session_start();



if (!(isset($_SESSION['email_admin']) && $_SESSION['email_admin'] != '')) {

header ("Location: index.php");
}

$page_title = 'View the Current Users';
include ('header.html');

?>
	<div id="navigation">
		<ul>
			<li><h4><a href="register.php">Register</a></h4></li>
			<li><h4><a  href="logout.php">Logout</a></h4></li>
			
			
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->



<?php
$_SESSION['email_admin'] = $e_a;
$_SESSION['pass_admin'] = $p_a;

// Page header:
echo "<h1>Registered Users</h1>";
require_once ('mysqli_connect.php'); // Connect to the db.


// Make the query:
$q = "select uid,fname,lname,email,pass from user_info;";		
$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<h3><p>There are currently $num registered users.</p></h3>";

//================

	//mysqli_free_result ($q); // Free up the resources.	

} else { // If no records were returned.

	echo '<h3><p class="error">There are currently no registered users.</p></h3>';

}



//=================================================================================================

					function totable($r)
				{

					echo "<br><br>";
				echo"<table border=10 cellpadding=5 cellspacing=15>";
				echo "<tr>";
				for($i = 0; $i < mysqli_num_fields($r); $i++) {
				    $field_info = mysqli_fetch_field($r);
				    echo "<th>{$field_info->name}</th>";
				}


				// Print the data
				while($row = mysqli_fetch_row($r)) {
				    echo "<tr>";
				    foreach($row as $_column) {
				        echo "<td>{$_column}</td>";
				    }

					#echo "<td><a href='delete.php' name='link1'><input type='submit' name='submit1' value='DELETE' style='height:20px; width:70px'/></a><br></td>";
					#echo "<td><b>VIEW FULL</b><br></td>";

				    echo "</tr>";
				}




				echo "</table>";

				}

		totable($r);
//==================================================================================================




mysqli_close($dbc); // Close the database connection.

include ('footer.html');
session_destroy();
?>
