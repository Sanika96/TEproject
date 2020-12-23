<?php
session_start();

$page_title = 'Crime Stats Chart';
include ('header.html');


	require_once ('mysqli_connect.php'); // Connect to the db.	
	$errors = array(); // Initialize an error array.



//mysql percentage male/female quering and calculations
	$qry1 = "select count(*) from user_info where crime = 'Yes' group by uid;";
	$qry2 = "select count(*) from user_info where crime = 'No' group by uid;";
 

	$result_c = mysqli_query($dbc,$qry1);
	$result_n = mysqli_query($dbc,$qry2);


	$num_c = @mysqli_num_rows($result_c);
	$num_n = @mysqli_num_rows($result_n);

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

        var data = google.visualization.arrayToDataTable([

          ['Criminals', 'Non - Criminals'],
          ['Non-Criminals',      <?php echo $num_n ?>],
          ['Criminals',     <?php echo $num_c ?>]

        ]);


        // Set chart options
        var options = {'title':'Crime Stats',
        				//'colors':['green','yellow']	
			        	//'is3D':true,
			           	'backgroundColor':'#fafafa',
                  pieHole: 0.4,
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