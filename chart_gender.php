<?php
session_start();

$page_title = 'Sex Ratio Chart';
include ('header.html');


	require_once ('mysqli_connect.php'); // Connect to the db.	
	$errors = array(); // Initialize an error array.



//mysql percentage male/female quering and calculations
	$qry1 = "select count(*) from user_info where gender = 'Male' group by uid;";
	$qry2 = "select count(*) from user_info where gender = 'Female' group by uid;";
 

	$result_m = mysqli_query($dbc,$qry1);
	$result_f = mysqli_query($dbc,$qry2);


	$num_m = @mysqli_num_rows($result_m);
	$num_f = @mysqli_num_rows($result_f);

?>
<div id="navigation">
		<ul>
			<li><h4><a href="chart.php">Back</a></h4></li>
			<li><h4><a href="logout.php">Logout</a></h4></li>
			
		</ul>
	</div>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 3.2 - header.html -->


<br><br>




    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Gender');
        data.addColumn('number', 'Total');
        data.addRows([
          ['Male', <?php echo $num_m ?>],
          ['Female', <?php echo $num_f ?>],
          ]);

        // Set chart options
        var options = {'title':'Sex Ratio',
        				//'colors':['green','yellow']	
			        	'is3D':true,
			           	'backgroundColor':'#fafafa',
                       	'width':800,
                       	'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>








<?php
	mysqli_close($dbc);

include ('footer.html');
?>