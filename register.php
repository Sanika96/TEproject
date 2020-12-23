<?php # Script 8.5 - register.php #2
session_start();


$page_title = 'Register';
include ('header.html');
?>

	<div id="navigation">
		<ul>
			<li><h4><a href="index.php">Login</a></h4></li>			

		</ul>
	</div>
	<div id="content">

<br>

<?php
// Check if the form has been submitted:
if (isset($_POST['submitted'])) 
{

	require_once ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	



//====================================================================

	// Check for a first name:
	if (empty($_POST['fname'])) {
		$errors[0] = 'You forgot to enter your First Name.';
	} else {
		$fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
	}

	// Check for a last name:
	if (empty($_POST['lname'])) {
		$errors[1] = 'You forgot to enter your Last Name.';
	} else {
		$lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));
	}

//======================================================================

	// Check for a day:
	if (strcmp($_POST['bday'],"-1")==0) {
		$errors[2] = 'You forgot to enter your Date of Birth.';
	} else {
		$bday = mysqli_real_escape_string($dbc, trim($_POST['bday']));
	}

	// Check for a month:
	if (strcmp($_POST['bmonth'],"-1")==0) {
		$errors[2] = 'You forgot to enter your Date of Birth.';
	} else {
		$bmonth = mysqli_real_escape_string($dbc, trim($_POST['bmonth']));
	}

	// Check for a year:
	if (strcmp($_POST['byear'],"-1")==0) {
		$errors[2] = 'You forgot to enter your Date of Birth.';
	} else {
		$byear = mysqli_real_escape_string($dbc, trim($_POST['byear']));
	}

//==========================================================================

	// Check for a email:
	if (empty($_POST['email'])) {
		$errors[3] = 'You forgot to enter your email id.';
	} else {
		$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

	// Check for a password:

	/*	
	if (empty($_POST['pass'])) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}*/


	if (!empty($_POST['pass'])) {
		if ($_POST['pass'] != $_POST['pass1']) {
			$errors[25] = 'The passwords you have entered do not match.';
		} else {
			$pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
		}

	} else {
		$errors[24] = 'You forgot to enter a password.';
	}

//==========================================================================

	// Check for an mobile:
	if (empty($_POST['mob'])) {
		$errors[4] = 'You forgot to enter your mobile number.';
	} else {
		$mob = mysqli_real_escape_string($dbc, trim($_POST['mob']));
	}

	//check for gender
	if(isset($_POST['gender']))
		$gender=$_POST['gender'];
	else 
		$errors[5]='You forgot to select gender';

	//check for marital status
	if(isset($_POST['marital']))
		$marital=$_POST['marital'];
	else 
		$errors[6]='You forgot to select marital status';


	// Check for an address:
	if (empty($_POST['address'])) {
		$errors[7] = 'You forgot to enter your address.';
	} else {
		$address = mysqli_real_escape_string($dbc, trim($_POST['address']));
	}

//=======================================================================

		// Check for a city:
	if (empty($_POST['city'])) {
		$errors[8] = 'You forgot to enter your city';
	} else {
		$city = mysqli_real_escape_string($dbc, trim($_POST['city']));
	}
	
		// Check for a state:
	if (empty($_POST['state'])) {
		$errors[9] = 'You forgot to enter your state';
	} else {
		$state = mysqli_real_escape_string($dbc, trim($_POST['state']));
	}
	
		// Check for a pin:
	if (empty($_POST['pin'])) {
		$errors[10] = 'You forgot to enter your pin';
	} else {
		$pin = mysqli_real_escape_string($dbc, trim($_POST['pin']));
	}

	// Check for a nationality:
	if (strcmp($_POST['nationality'],"-1")==0) {
		$errors[11] = 'You forgot to enter your nationality.';
	} else {
		$nationality = mysqli_real_escape_string($dbc, trim($_POST['nationality']));
	}

//================================================================================	

	// Check for a bgrp:
	if (strcmp($_POST['bgrp'],"-1")==0) {
		$errors[12] = 'You forgot to enter your blood group.';
	} else {
		$bgrp = mysqli_real_escape_string($dbc, trim($_POST['bgrp']));
	}

	//check for disability
	if(isset($_POST['phy']))
		$phy=$_POST['phy'];
	else 
		$errors[13]='Do you have any Physical Disability?';


	// Check for a health insurance:
	if (empty($_POST['insure'])) {
		$errors[14] = 'You forgot to enter your health insurance number.';
	} else {
		$insure = mysqli_real_escape_string($dbc, trim($_POST['insure']));
	} 
//==================================================================================

	// Check for a driving licence:
	if (empty($_POST['licence'])) {
		$errors[15] = 'You forgot to enter your vehicle licence number.';
	} else {
		$licence = mysqli_real_escape_string($dbc, trim($_POST['licence']));
	}	

	// Check for a number plate:
	if (empty($_POST['vnum'])) {
		$errors[16] = 'You forgot to enter your vehicle number plate.';
	} else {
		$vnum = mysqli_real_escape_string($dbc, trim($_POST['vnum']));
	}	

//==================================================================================

	// Check for a qualification:
	if (strcmp($_POST['qualification'],"-1")==0) {
		$errors[17] = 'You forgot to enter your qualification.';
	} else {
		$qualification = mysqli_real_escape_string($dbc, trim($_POST['qualification']));
	}

	//check for occupation
	if(isset($_POST['occu']))
		$occu=$_POST['occu'];
	else 
		$errors[18]='You forgot to enter your occupation.';

	// Check for a total income:
	if (empty($_POST['income'])) {
		$errors[19] = 'You forgot to enter your income.';
	} else {
		$income = mysqli_real_escape_string($dbc, trim($_POST['income']));
	}

	// Check for a bank name:
	if (strcmp($_POST['bkname'],"-1")==0) {
		$errors[20] = 'You forgot to enter your bank name.';
	} else {
		$bkname = mysqli_real_escape_string($dbc, trim($_POST['bkname']));
	}

	// Check for a account number:
	if (empty($_POST['accNo'])) {
		$errors[21] = 'You forgot to enter your account number.';
	} else {
		$accNo = mysqli_real_escape_string($dbc, trim($_POST['accNo']));
	}

//=================================================================================

	//check for criminal history
	if(isset($_POST['crime']))
		$crime=$_POST['crime'];
	else 
		$errors[22]='Do you have any Criminal History?';

	// Check for a crime details:
	if (empty($_POST['cdetails'])) {
		$errors[23] = 'You forgot to enter your crime details.';
	} else {
		$cdetails = mysqli_real_escape_string($dbc, trim($_POST['cdetails']));
	}


//====================================================================================


	
	if (empty($errors)) 
	{ // If everything's OK.
	
		// Register the user in the database...
		
			
		// Make the query:
		$q = "insert into user_info(fname,lname,bday,bmonth,byear,email,pass,mob,gender,marital,address,city,state,pin,nationality,bgrp,phy,insure,licence,vnum,qualification,occu,income,bkname,accNo,crime,cdetails) values('$fname','$lname','$bday','$bmonth','$byear','$email', '$pass', '$mob','$gender','$marital','$address','$city','$state','$pin','$nationality', '$bgrp', '$phy','$insure','$licence','$vnum','$qualification','$occu','$income','$bkname','$accNo','$crime','$cdetails');";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		
		if ($r) 
		{ // If it ran OK.
		
			// Print a message:
			?><script type="text/javascript">window.confirm("Thank You!");
						location.href("login.php");</script><?php ;
			/*
			//===================================================================
			//Redirection back to index.php
			?>$<script type="text/javascript">location.href = 'user_information.php';</script><?php
			//====================================================================
			*/
		//<p>You are now registered. In Chapter 11 you will actually be able to log in!</p><p><br /></p>';	
		
		} 
		else
		{ // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('footer.html'); 
		exit();
		
	} 
	/*else 
	{ // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		/*foreach ($errors as $msg) 
		{ // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} */// End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.




?>








<style>th, td {
    padding: 12px;
}</style>

<table>
<h1>Register</h1>
<br>
<form action="register.php" method="post">

<h1>Personal Details</h1>
	<tr><td>FIRST NAME:</td><td><input type="text" name="fname" size="15" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>" /><?php echo "<label class=error>$errors[0]</label>"?></td></tr>

	<tr><td>LAST NAME:</td><td><input type="text" name="lname" size="15" maxlength="30" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>" /><?php echo "<label class=error>$errors[1]</label>"?></td></tr>


	
	<tr><td>DATE OF BIRTH:</td><td> 
 <select name="bday" id="Birthday_Day" value="<?php if (isset($_POST['bday'])) echo $_POST['bday']; ?>" >
						<option value="-1">Day:</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						 
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						 
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						 
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						 
						<option value="31">31</option>
					</select>
	
					<select id="Birthday_Month" name="bmonth" value="<?php if (isset($_POST['bmonth'])) echo $_POST['bmonth']; ?>" >
						<option value="-1">Month:</option>
						<option value="January">Jan</option>
						<option value="February">Feb</option>
						<option value="March">Mar</option>
						<option value="April">Apr</option>
						<option value="May">May</option>
						<option value="June">Jun</option>
						<option value="July">Jul</option>
						<option value="August">Aug</option>
						<option value="September">Sep</option>
						<option value="October">Oct</option>
						<option value="November">Nov</option>
						<option value="December">Dec</option>
					</select>
						 
					<select name="byear" id="Birthday_Year" value="<?php if (isset($_POST['byear'])) echo $_POST['byear']; ?>" >
						 
						<option value="-1">Year:</option>
						<option value="2012">2012</option>
						<option value="2011">2011</option>
						<option value="2010">2010</option>
						<option value="2009">2009</option>
						<option value="2008">2008</option>
						<option value="2007">2007</option>
						<option value="2006">2006</option>
						<option value="2005">2005</option>
						<option value="2004">2004</option>
						<option value="2003">2003</option>
						<option value="2002">2002</option>
						<option value="2001">2001</option>
						<option value="2000">2000</option>
						 
						<option value="1999">1999</option>
						<option value="1998">1998</option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						 
						<option value="1989">1989</option>
						<option value="1988">1988</option>
						<option value="1987">1987</option>
						<option value="1986">1986</option>
						<option value="1985">1985</option>
						<option value="1984">1984</option>
				 		<option value="1983">1983</option>
						<option value="1982">1982</option>
						<option value="1981">1981</option>
						<option value="1980">1980</option>
					</select>
		<?php echo "<label class=error>$errors[2]</label>"?></td></tr>
						

	<tr><td>EMAIL ID:</td><td>  <input type="text" name="email" size="30" maxlength="100" placeholder="username@server.domain"value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><?php echo "<label class=error>$errors[3]</label>"?></tr></td>	

	<tr><td>PASSWORD:</td><td> <input type="password" name="pass" size="10" maxlength="30" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" /><?php echo "<label class=error>$errors[24]</label>"?></tr></td>
	
	<tr><td>CONFIRM PASSWORD:</td><td> <input type="password" name="pass1" size="10" maxlength="20" /><?php echo "<label class=error>$errors[25]</label>"?></tr></td>

	<tr><td>MOBILE NUMBER: </td><td>  <input type="text" name="mob" maxlength="10"  value="<?php if (isset($_POST['mob'])) echo $_POST['mob']; ?>" /><?php echo "<label class=error>$errors[4]</label>"?></tr></td>

	<tr><td>GENDER:</td><td>  Male <input type="radio" name="gender" value="Male" />
				Female <input type="radio" name="gender" value="Female" />   <?php echo "<label class=error>$errors[5]</label>"?></tr></td>	
	
	<tr><td>MARITAL STATUS: </td><td> Single <input type="radio" name="marital" value="Single" />
						Married <input type="radio" name="marital" value="Married" />   <?php echo "<label class=error>$errors[6]</label>"?></tr></td>
	

	<tr><td>ADDRESS: </td><td> <textarea name="address" rows="4" cols="30" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></textarea><?php echo "<label class=error>$errors[7]</label>"?> </tr></td>

	<tr><td>CITY: </td><td> <input type="text" name="city" size="15" maxlength="40" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>" /><?php echo "<label class=error>$errors[8]</label>"?></tr></td>

	<tr><td>STATE: </td><td> <input type="text" name="state" size="15" maxlength="40" value="<?php if (isset($_POST['state'])) echo $_POST['state']; ?>" /><?php echo "<label class=error>$errors[9]</label>"?> </tr></td>

	<tr><td>PINCODE: </td><td> <input type="text" name="pin" size="15" maxlength="6" value="<?php if (isset($_POST['pin'])) echo $_POST['pin']; ?>" /><?php echo "<label class=error>$errors[10]</label>"?> </tr></td>
	
	<tr><td>NATIONALITY:</td><td> <select name="nationality" value="<?php if (isset($_POST['nationality'])) echo $_POST['nationality']; ?>" >
							<option value="-1">-Select-</option>
							<option value="Indian">Indian</option>
							<option value="NRI">NRI</option>
							<option value="PIO">PIO</option>
							<option value="OCI">OCI</option>
							<option value="Other">Other</option>
					</select>
			<?php echo "<label class=error>$errors[11]</label>"?>
		</tr></td>

<br><br>
<h4><tr><td>Medical Records</h4>
<br>
<br>
	BLOOD GROUP: </td><td> <select name="bgrp" value="<?php if (isset($_POST['bgrp'])) echo $_POST['bgrp']; ?>" >
							<option value="-1">-Select-</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
					 </select>
			<?php echo "<label class=error>$errors[12]</label>"?>
	</tr></td>			 

	<tr><td>PHYSICALLY DISABLED: </td><td> Yes <input type="radio" name="phy" value="Yes" />
							 No <input type="radio" name="phy" value="No" />  		 <?php echo "<label class=error>$errors[13]</label>"?></tr></td>
						 

	<tr><td>MEDICAL INSURANCE No.: </td><td> <input type="text" name="insure" size="15" maxlength="30" value="<?php if (isset($_POST['insure'])) echo $_POST['insure']; ?>" /><?php echo "<label class=error>$errors[14]</label>"?></tr></td>

<br>
<h4><tr><td>Enter The Vehicle Records Below: </h4>
<br>
<br>	
<DRIVING LICENCE NUMBER:</td><td> <input type="text" name="licence" size="15" maxlength="30" value="<?php if (isset($_POST['licence'])) echo $_POST['licence']; ?>" /><?php echo "<label class=error>$errors[15]</label>"?></tr></td>

	<tr><td>VEHICLE NUMBER:</td><td> <input type="text" name="vnum" size="15" maxlength="30" value="<?php if (isset($_POST['vnum'])) echo $_POST['vnum']; ?>" /><?php echo "<label class=error>$errors[16]</label>"?></tr></td>

<br>
<h4><tr><td>Earning and Bank Details</h4>
<br>
<br>

	<tr><td>QUALIFICATION:</td><td> <select name="qualification" value="<?php if (isset($_POST['qualification'])) echo $_POST['qualification']; ?>" >
							<option value="-1">-Select-</option>
							<option value="SSC/Equivalent certified 10th">SCC/Equivalent certified 10th</option>
							<option value="HSC/Equivalent certified 12th">HSC/Equivalent certified 12th</option>
							<option value="Graduation/Equivalent certified Graduation">Graduation/Equivalent certified Graduation</option>
							<option value="Post-Graduation/Equivalent certified Post-Graduation">Post-Graduation/Equivalent certified Post-Graduation</option>
							<option value="Other">Other</option>
					  </select>
				<?php echo "<label class=error>$errors[17]</label>"?>
	</tr></td>				  

	<tr><td>OCCUPATION:</td><td>  Service <input type="radio" name="occu" value="Service" />
					Business <input type="radio" name="occu" value="Business" />
					Other <input type="radio" name="occu" value="Other" />
					None <input type="radio" name="occu" value="None" /> 		<?php echo "<label class=error>$errors[18]</label>"?> </tr></td>


	<tr><td>ANNUAL INCOME:</td><td>  <input type="text" name="income" size="15" maxlength="30" value="<?php if (isset($_POST['income'])) echo $_POST['income']; ?>" /><?php echo "<label class=error>$errors[19]</label>"?></tr></td>


	<tr><td>BANK NAME:</td><td> <select name="bkname" value="<?php if (isset($_POST['bkname'])) echo $_POST['bkname']; ?>" >
							<option value="-1">-Select-</option>
							<option value="State Bank of India">State Bank of India</option>
							<option value="HDFC">HDFC</option>
							<option value="ICICI">ICICI</option>
							<option value="Bank of Baroda">Bank of Baroda</option>
							<option value="Punjab National Bank">Punjab National Bank</option>
							<option value="Saraswat Bank">Saraswat Bank</option>
							<option value="Axis Bank">Axis Bank</option>
							<option value="Union Bank">Union Bank</option>
							<option value="Standard Charted Bank">Standard Charted Bank</option>
							<option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
							<option value="Bank of Maharashtra">Bank of Maharashtra</option>
							<option value="Other">Other</option>
				  </select>
			<?php echo "<label class=error>$errors[20]</label>"?>
	</tr></td>		  

	<tr><td>ACCOUNT NUMBER:</td><td>  <input type="text" name="accNo" size="15" maxlength="30" value="<?php if (isset($_POST['accNo'])) echo $_POST['accNo']; ?>" /><?php echo "<label class=error>$errors[21]</label>"?></tr></td>

<br>
<h4> <tr><td> Criminal Records (if any, type - if none)</h4>
	CRIMINAL HISTORY: </td><td> Yes <input type="radio" name="crime" value="Yes" />
					  	  No <input type="radio" name="crime" value="No" />   <?php echo "<label class=error>$errors[22]</label>"?> </tr></td>

	<tr><td> CRIME DETAILS: </td><td> <textarea name="cdetails" rows="4" cols="30" value="<?php if (isset($_POST['cdetails'])) echo $_POST['cdetails']; ?>"></textarea><?php echo "<label class=error>$errors[23]</label>"?>	</tr></td>
	<br>

 <p> <?php# include ('captcha.php');?> </p>	



</table>

	<h2><p><input type="submit" name="submit" value="Submit" style="height:25px; width:80px"/>
	<input type="reset" name="reset" value="Reset" style="height:25px; width:80px"/></p></h2>

	<input type="hidden" name="submitted" value="TRUE" />



<?php
include ('footer.html');
?>
