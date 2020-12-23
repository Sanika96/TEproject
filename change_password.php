<?php # Script 8.7 - password.php
// This page lets a user change their password.

$page_title = 'Change Your Password';
include ('header.html');
?>
	<div id="navigation">
		<ul>
			<li><h4><a href="register.php">Register</a></h4></li>
			<li><h4><a  href="logout.php">Login</a></h4></li>
			
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->

<?php
// Check if the form has been submitted:
if (isset($_POST['submitted'])) 
{

	require_once ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[0] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	// Check for the current password:
	if (empty($_POST['pass'])) {
		$errors[1] = 'You forgot to enter your current password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}

	// Check for a new password and match 
	// against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[3] = 'Your new password did not match the confirmed password.';
		} else {
			$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[2] = 'You forgot to enter your new password.';
	}
	
	if (empty($errors)) 
	{ // If everything's OK.
	
		// Check that they've entered the right email address/password combination:
		$q = "select email from user_info where email='$e' and pass='$p'; ";
		$r = @mysqli_query($dbc, $q);
		$num = @mysqli_num_rows($r);
		if ($num == 1) 
		{ // Match was made.

			// Make the UPDATE query:
			$q = "update user_info set pass='$np' where email='$e';";		
			$r = @mysqli_query($dbc, $q);
			
			if (mysqli_affected_rows($dbc) == 1) 
			{ // If it ran OK.
			
				// Print a message.
				echo '<h1>Thank you!</h1>
				<p>Your password has been updated.</p><p><br /></p>';	
			
			} 
			else 
			{ // If it did not run OK.
			
				// Public message:
				echo '<h1>System Error</h1>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
				
				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
				
			}

			// Include the footer and quit the script (to not show the form).
			include ('footer.html'); 
			exit();
				
		} 
		else 
		{ // Invalid email address/password combination.
			echo '<h1>Error!</h1>
			<p class="error">Invalid email address and password combination</p>';
		}
		
	} 
	/*else 
	{ // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} */// End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.
		
} // End of the main Submit conditional.

?>
<h1>Change Your Password</h1>
<form action="change_password.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /><?php echo "<label class=error>$errors[0]</label>"?></p>
	<p>Current Password: <input type="password" name="pass" size="10" maxlength="20" /><?php echo "<label class=error>$errors[1]</label>"?></p>
	<p>New Password: <input type="password" name="pass1" size="10" maxlength="20" /><?php echo "<label class=error>$errors[2]</label>"?></p>
	<p>Confirm New Password: <input type="password" name="pass2" size="10" maxlength="20" /><?php echo "<label class=error>$errors[3]</label>"?></p><br>
	<p><input type="submit" name="submit" value="Change Password" style="height:17px; width:110px"/></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
<?php
include ('footer.html');
?>
