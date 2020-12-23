 <?php # Script 11.13 - loggedin.php #3

// The user is redirected here from login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
// Also validate the HTTP_USER_AGENT!
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) ) OR ($_SESSION['type']!='admin')) {	require_once ('login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit();	
}

$page_title = 'Logged In!';
include ('header.html');

// Print a customized message:
echo "<h1>SEARCH RECORDS HERE!</h1>";
?>

<form action="search.php" method="post">
<select id="select_field_db" name="table_field">
<option value="-1">Select field</option>
<option value="name">Name</option>
<option value="mother">Mother Name</option>
<option value="city">City</option>
<option value="district">District</option>
<option value="pincode">Postal code</option>
<option value="nationality">Nationality</option>
<option value="religion">Religion</option>
<option value="contact">Contact</option>
<option value="email">Email Address</option>
<option value="uname">Username</option>

</select>
Value: <input type="text" name="val" size="20" maxlength="80" value=""/>
<input type="submit" name="submit" value="Search" /></p>
<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); // Connect to the db.
	
	$errors = array(); // Initialize an error array.
	if(strcasecmp($_POST['table_field'],"-1")==0){
		$errors[]="Please select Field";
	}
		$f=$_POST['table_field'];
	
	if(empty($_POST['val'])){
		$errors[]="Please enter  Value";
	}
		$v=$_POST['val'];
	
	if (empty($errors)) { // If everything's OK.
	
		
		// Make the query:
		$q = "SELECT name,dob, uname FROM info where $f='$v' ORDER BY name ASC";
		$r = @mysqli_query ($dbc, $q);
		if($r){
		// Table header:
		echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
<tr>
	<td align="left"><b>Edit</b></td>
	<td align="left"><b>Delete</b></td>
	<td align="left"><b>Name</b></td>
	<td align="left"><b>dob</b></td>
	<td align="left"><b>username</b></td>
</tr>
';
		
		// Fetch and print all the records....
		
		$bg = '#eeeeee'; // Set the initial background color.
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		
			$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.
		
			echo '<tr bgcolor="' . $bg . '">
		<td align="left"><a href="edit_user.php?id=\'' . $row['uname'] . '\'">Edit</a></td>
		<td align="left"><a href="delete_user.php?id=\'' . $row['uname'] . '\'">Delete</a></td>
		<td align="left">' . $row['name'] . '</td>
		<td align="left">' . $row['dob'] . '</td>
		<td align="left">' . $row['uname'] . '</td>
	</tr>
	';
		
		} // End of WHILE loop.
		
		echo '</table>';
		mysqli_free_result ($r);
		mysqli_close($dbc);
		
			
				
		} else { // If it did not run OK.
				
			// Public message:
			echo 'Record not found!!!</br>';
				
			// Debugging message:
			echo  mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
	
		} // End of if ($r) IF.
	
		
	
		// Include the footer and quit the script:
		include ('footer.html');
		exit();
	
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
	
	} // End of if (empty($errors)) IF.
} 
include ('footer.html');
?>