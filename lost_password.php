<?php
session_start();

$page_title = 'Forgot Your Password?';
include ('header.html');
?>

  <div id="navigation">
    <ul>
      <li><h4><a href="register.php">Register</a></h4></li>
      <li><h4><a onclick="<?php session_destroy(); ?>" href="logout.php">Logout</a></h4></li>
      
    </ul>
  </div>
  <div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->


<?php
$email = $_SESSION['varname1'];



//if "email" variable is filled out, send email
  require_once ('mysqli_connect.php');

  $errors = array();

  $pass = "select pass from user_info where email='$email'; ";
  $fname = "select fname from user_info where email='$email'; ";
  $run = @mysqli_query($dbc, $pass);


  //Email information
  $recipient = $email;
      //$email = $_REQUEST['email'];
  $subject = "Lost Password from MESCOE Identity";
  $message = "Dear" . $fname . ",<br>This is your password: " . $pass . "<br>We recommend that you change your password.<br>Regards,<br>MESCOE Identity Team.";
  
  //send email
  mail($recipient, $subject, $message, "From: shahidkhan96@gnail.com" );
  
  //Email response
  echo "<br><br><h2>An email has been sent to your registered account (your username). Please check for your password. We recommend that you change your password later.</h2>";
 
mysqli_close($dbc);
  
  
  //if "email" variable is not filled out, display the form

?>


  
<?php
include ('footer.html');
?>
