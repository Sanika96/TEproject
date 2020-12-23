<?php
session_start();

$page_title = 'Educational Qualificational Chart';
include ('header.html');


  require_once ('mysqli_connect.php'); // Connect to the db.  
  $errors = array(); // Initialize an error array.



//mysql percentage  quering and calculations

  $qry1 = "select count(*) from user_info where qualification = 'SSC/Equivalent certified 10th' group by uid;";
  $qry2 = "select count(*) from user_info where qualification = 'HSC/Equivalent certified 12th' group by uid;";
  $qry3 = "select count(*) from user_info where qualification = 'Graduation/Equivalent certified Graduation' group by uid;";
  $qry4 = "select count(*) from user_info where qualification = 'Post-Graduation/Equivalent certified Post-Graduation' group by uid";
 
  
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
        data.addColumn('string', 'Educational Qualification');
        data.addColumn('number', 'Total');
        data.addRows([
          ['SSC/Equivalent 10th', <?php echo $num_1 ?>],
          ['HSC/Equivalent 12th', <?php echo $num_2 ?>],
          ['Graduation', <?php echo $num_3 ?>],
          ['Post-Graduation', <?php echo $num_4 ?>],
          ]);

        // Set chart options
        var options = {'title':'Educationa Qualification Demo',
                //'colors':['green','yellow'] 
                        'is3D':true,
                        'backgroundColor':'#fafafa',
                        'width':800,
                        'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
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