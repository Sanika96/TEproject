<?php # Script 8.6 - view_users.php #2
// This script retrieves all the records from the users table.
session_start();

if (!(isset($_SESSION['varname1']) && $_SESSION['varname1'] != '')) {

header ("Location: index.php");
}

$page_title = 'Statistical Analysis';
include ('header.html');
?>
<div id="navigation">
		<ul>
			<li><h4><a href="user_information.php">View Information</a></h4></li>
			<li><h4><a  href="logout.php">Logout</a></h4></li>
			
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2   - header.html -->


<br><br>


<h1>Which chart would you like to study?</h1>
<br><br>

<ul>
	<li><h2><a href="chart_gender.php">Sex Ratio</a></h2></li><br>
	<li><h2><a href="chart_crime.php">Crime Statistics</a></h2></li><br>
	<li><h2><a href="chart_poverty.php">Poverty Line</a></h2></li><br>
	<li><h2><a href="chart_qualification.php">Educational Qualification Demo</a></h2></li><br>
	<li><h2><a href="chart_geo.php">Population Distribution</a></h2></li>

</ul>	

<br><br>


<?php
include ('footer.html');
?>
