<?php
session_start();

$page_title = 'Population Distribution Chart';
include ('header.html');


  require_once ('mysqli_connect.php'); // Connect to the db.  
  $errors = array(); // Initialize an error array.



  $qry1 = "select count(*) from user_info where city = 'Pune' group by uid;";
  $qry2 = "select count(*) from user_info where city = 'Mumbai' group by uid;";
  $qry3 = "select count(*) from user_info where city = 'Delhi' group by uid;";
  $qry4 = "select count(*) from user_info where city = 'Bangalore' group by uid;";
 
  
  $result_1 = mysqli_query($dbc,$qry1);
  $result_2 = mysqli_query($dbc,$qry2);
  $result_3 = mysqli_query($dbc,$qry3);
  $result_4 = mysqli_query($dbc,$qry4);


  $num_1 = @mysqli_num_rows($result_1);
  $num_2 = @mysqli_num_rows($result_2);
  $num_3 = @mysqli_num_rows($result_3);
  $num_4 = @mysqli_num_rows($result_4);


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
<h3>Population Distribution in India</h3>
<br>




    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

           function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['City',   'Population', 'Area'],
        ['Mumbai',    <?php echo $num_2 ?>, 603],
        ['Pune',     <?php echo $num_1 ?>, 700],
        ['Delhi',     <?php echo $num_3 ?>, 1484],
        ['Bangalore',     <?php echo $num_4 ?>, 741]
      ]);

      var options = {
        region: 'IN',
        displayMode: 'markers',
        colorAxis: {colors: ['orange', 'red']},
        enableRegionInteractivity: true,
        height: 460,
        width: 740,
        domain: 'IN',
        datalessRegionColor: '#dcdcdc',
        magnifyingGlass:{enable: true, zoomFactor: 15}
      };

    var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };

    </script>

  <body>
    <div id="chart_div" align="center"></div>
  </body>






<?php
  mysqli_close($dbc);

include ('footer.html');
?>
