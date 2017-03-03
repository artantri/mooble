<?php
require_once('connect.php');


$sql ="SELECT value,time FROM `report` where bodypart = 'kepala' ORDER BY time";

$result=mysqli_query($connection,$sql);
$numOfRows = mysqli_num_rows($result); 

$timestamp="";
$mysqldate = "";
$i = 0;
if($result){
    // Fetch one and one row
    while ($row= $result->fetch_row())
    {
        if($i == 0){
            $awal = $row[1];
        } elseif($i == $numOfRows-1){
            $akhir = $row[1];
        }   
        $i ++;
        $phpdate = strtotime( $row[1] );
        $timestamp .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
    }
    //    echo $timestamp;
    $min = "new Date(" .date( 'Y, m-1, d, H, i, s', strtotime($awal)). ")";
    $max = "new Date(" .date( 'Y, m-1, d, H, i, s', strtotime($akhir)). ")";
    //    echo $min. "dan" .$max;
}

?>

<html>

    <head>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBackgroundColor);


            function drawBackgroundColor() {
                var MAX = <? echo $max; ?>;
                var MIN = <? echo $min; ?>;
                var options = {
                    width: 1000,
                    height: 240,
                    animation: {
                        duration: 1000,
                        easing: 'in'
                    },
                    hAxis: {viewWindow: {min: MIN, max: MAX}}
                };

                var chart = new google.visualization.LineChart(
                    document.getElementById('chart_div'));
                var data = new google.visualization.DataTable();
                data.addColumn('datetime', 'time');
                data.addColumn('number', 'Rate Sakit');
                data.addRows([
                    <?php echo $timestamp; ?>
                ]);
                
                
                


                var xTicks = [];
                for (var i = 0; i < data.getNumberOfRows(); i++) {
                    xTicks.push({
                        data.getValue(i, 0)
                    });
                }
                
                chart.draw(data, options);
                
                var prevButton = document.getElementById('b1');
                var nextButton = document.getElementById('b2');
                var changeZoomButton = document.getElementById('b3');
                function drawChart() {
                    Disabling the button while the chart is drawing.
                    prevButton.disabled = true;
                    nextButton.disabled = true;
                    changeZoomButton.disabled = true;
                    google.visualization.events.addListener(chart, 'ready',
                                                            function() {
                        prevButton.disabled = options.hAxis.viewWindow.min <= 0;
                        nextButton.disabled = options.hAxis.viewWindow.max >= MAX;
                        changeZoomButton.disabled = false;
                    });
                    chart.draw(data, options);
                }

                prevButton.onclick = function() {
//                    options.hAxis.viewWindow.min = xTicks[0];
//                    options.hAxis.viewWindow.max -= 5;
                    drawChart();
                }
                nextButton.onclick = function() {
//                    options.hAxis.viewWindow.min = xTicks[0];
//                    options.hAxis.viewWindow.max = xTicks[1];
                }
                var zoomed = false;
                changeZoomButton.onclick = function() {
                    if (zoomed) {
                        options.hAxis.viewWindow.min = new Date(2017, 01-1, 09, 09, 42, 19);
                        options.hAxis.viewWindow.max = new Date(2017, 01-1, 12, 11, 00, 00);
                    } else {
                        options.hAxis.viewWindow.min = new Date(2017, 01-1, 09, 09, 42, 19);
                        options.hAxis.viewWindow.max = MAX;
                    }
                    zoomed = !zoomed;
                    drawChart();
                }
                drawChart();
            }
        </script>
    </head>
    <body>
        <div id="chart_div" ></div>

        <button id="b1">Prev</button>
        <button id="b2">Next</button>
        <button id="b3">Zoom</button>

    </body>
</html>

