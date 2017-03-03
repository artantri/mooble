<?php
require_once('connect.php');


$sql ="SELECT value,time FROM `report` where bodypart = 'kepala' ORDER BY time";

$result=mysqli_query($connection,$sql);

$cco="";
$mysqldate = "";
if($result){
    // Fetch one and one row
    while ($row= $result->fetch_row())
    {
        $phpdate = strtotime( $row[1] );
        $mysqldate .="new Date(";
        $mysqldate .= date( 'Y,m,d,H,i,s', $phpdate );
        $mysqldate .= ")";
   
        $cco .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
    }
    
 echo $cco;
}
?>

<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBackgroundColor);

            function drawBackgroundColor() {
                var data = new google.visualization.DataTable();
                data.addColumn('datetime', 'time');
                data.addColumn('number', 'Rate Sakit');

                data.addRows([
                    <?php echo $cco; ?>
                ]);

                var options = {
                    hAxis: {
                        title: 'Time'
                    },
                    vAxis: {
                        title: 'Rate Sakit'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="chart_div"></div>
    </body>
</html>