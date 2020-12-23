<?php # Script 3.4 - index.php
session_start();
$page_title = 'Welcome to this Site!';
include ('header.html');
?>
	<div id="navigation">
		<ul>
			
			<li><h4><a href="register.php">Register</a></h4></li>
		</ul>
	</div>
	<div id="content">


<br>


<?php

	require_once ('mysqli_connect.php'); // Connect to the db.	
	$errors = array(); // Initialize an error array.

if (isset($_POST['submitted1']))
{

	// Check for an email address:
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));

		$_SESSION['varname1'] = $e;

	// Check for the password:
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));

		$_SESSION['varname2'] = $p;
	
		// Check that they've entered the right email address/password combination:
		$q1 = "select email from user_info where email='$e' and pass='$p';";
		$r1 = @mysqli_query($dbc, $q1);
		$num1 = @mysqli_num_rows($r1);

		if ($num1 == 1) 
		{ // Match was made.
			?><script type="text/javascript">window.alert("You've logged in successfully!");</script><?php ;
		//====================================================
			//Redirection to user_information.php
		?><script type="text/javascript">location.href = 'user_information.php';</script><?php
		//====================================================
		
		}

		else 
		{ // Invalid email address/password combination.
			$errors[0] = 'Invalid email address and password combination';
		}
		
}

//=====================================================================================================================


if (isset($_POST['submitted2']))
{

	 // Check for an admin's email address:
		$e_a = mysqli_real_escape_string($dbc, trim($_POST['email_admin']));
		$_SESSION['email_admin'] = $e_a;

	// Check for the admin's password:
		$p_a = mysqli_real_escape_string($dbc, trim($_POST['pass_admin']));
		$_SESSION['pass_admin'] = $p_a;
	
		// Check that they've entered the right email address/password combination:
		$q2 = "select email_admin from admin_login where email_admin='$e_a' and pass_admin='$p_a';";
		$r2 = @mysqli_query($dbc, $q2);
		$num2 = @mysqli_num_rows($r2);

		if ($num2 == 1) 
		{ // Match was made.
			?><script type="text/javascript">window.alert("Welcome Admin");</script><?php ;
		//====================================================
			//Redirection to view_users.php
			?>$<script type="text/javascript">location.href = 'view_users.php';</script><?php
		//=====================================================
		}
		
		else
		{ // Invalid email address/password combination.
			$errors[1] = 'Clearance Level Omega required. You are not Authorized.';

		}

		
} // End of the main Submit conditional.

	mysqli_close($dbc); // Close the database connection.

?>





<h1 id="mainhead"><font color='white'>Login</h1>
<form action="index.php" method="post">
	<p><font color='white'>Email Address: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /></p><br>
	<p>Password: <input type="password" name="pass" size="10" maxlength="20" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" /><?php echo "<p class=error>$errors[0]</p>"?></p>
	<p><a href="change_password.php" name="link2"><font color='white'>Change Password</a></p>
	<p><input type="submit" name="submit1" value="SUBMIT" style="height:18px; width:80px"/></p>
	

	<input type="hidden" name="submitted1" value="TRUE" />
</form>



<br>
<br>
<br>
<br>
<br>
<br>
<br>



<h4>Admin Login</h4>
<form action="index.php" method="post">
	<p>Email Address: <input type="text" name="email_admin" size="20" maxlength="80" value="<?php if (isset($_POST['email_admin'])) echo $_POST['email_admin']; ?>"  /> </p><br>
	<p>Password: <input type="password" name="pass_admin" size="10" maxlength="20" value="<?php if (isset($_POST['pass_admin'])) echo $_POST['pass_admin']; ?>" /><?php echo "<p class=error>$errors[1]</p>"?></p>
	<p><input type="submit" name="submit2" value="SUBMIT" style="height:15px; width:80px"/></p>

	<input type="hidden" name="submitted2" value="TRUE" />
</form>





<?php
include ('footer.html');
?>
