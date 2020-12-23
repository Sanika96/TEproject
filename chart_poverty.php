<?php
session_start();

$page_title = 'Poverty Line Chart';
include ('header.html');


  require_once ('mysqli_connect.php'); // Connect to the db.  
  $errors = array(); // Initialize an error array.



//mysql percentage  quering and calculations
  $qry1 = "select count(*) from user_info where income >= 11520 group by uid;";
  $qry2 = "select count(*) from user_info where income < 11520 group by uid;";
 

  $result_1 = mysqli_query($dbc,$qry1);
  $result_2 = mysqli_query($dbc,$qry2);


  $num_1 = @mysqli_num_rows($result_1);
  $num_2 = @mysqli_num_rows($result_2);

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




    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["scatter"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Poverty Line', 'Population'],
          [ 11520	,      <?php echo $num_1 ?>],
          [ 11519,      <?php echo $num_2 ?>]
        ]);

        var options = {
          hAxis: {minValue: 0, maxValue: 20000},
          vAxis: {minValue: 0, maxValue: 15},
          chart: {title: 'Poverty Line (Above & Below)'},
          hAxis: {title: 'Poverty Mark'},
          vAxis: {title: 'Population'},
          chartArea: {width:'50%'},
          backgroundColor: '#fafafa',
          animation:{startup: true},
          titleTextStyle:{color: 'black',
                          bold: true},
          trendlines: {
            5: {
              type: 'linear',
              lineWidth:15,
              showR2: true,
             // visibleInLegend: true
            }
          }
        };

        var chartLinear = new google.charts.Scatter(document.getElementById('chartLinear'));
        chartLinear.draw(data, google.charts.Scatter.convertOptions(options));

        //options.trendlines[0].type = 'exponential';
        options.colors = ['#6F9654'];

      }
    </script>

  <body>
    <div id="chartLinear" style="height: 500px; width: 800px"></div>

  </body>
