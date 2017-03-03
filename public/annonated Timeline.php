<?php
require_once('connect.php');


$sql ="SELECT value,time,bodypart FROM `report` ORDER BY time";

$result=mysqli_query($connection,$sql);
$numOfRows = mysqli_num_rows($result); 

$timestamp="";

$timestampkaki="";

$i = 0;
if($result){
    // Fetch one and one row
    while ($row= $result->fetch_row())
    {
        if($row[2]=='kepala'){
            $phpdate = strtotime( $row[1] );
            $timestamp .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
        } elseif($row[2]=='kaki'){
            $phpdatekaki = strtotime( $row[1] );
            $timestampkaki .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdatekaki ). "), " .$row[0]. "], ";
        }
    }
}



?>


<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; 
                                                 charset=ISO-8859-1"> 
        <title>Turnkey Instrumentse</title> 

        <!--Load the AJAX API--> 
        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
        <script type="text/javascript"> 

            // Load the Visualization API and the controls package. 
            google.load('visualization', '1.0', {'packages':['controls']}); 

            // Set a callback to run when the Google Visualization API is loaded. 
            google.setOnLoadCallback(drawDashboard); 

            var slider; 
            // Callback that creates and populates a data table, 
            // instantiates a dashboard, a range slider and a pie chart, 
            // passes in the data and draws it. 
            function drawDashboard() {



                // Create our data table. 
                var data = google.visualization.arrayToDataTable([
                    ['TimeStamp', 'Value'],
                    <? echo $timestamp; ?>
                ]); 

                var chngButton = document.getElementById('b1');

                var change = false;
                chngButton.onclick = function(){
                    if(!change){
                        var data = google.visualization.arrayToDataTable([
                            ['TimeStamp', 'Value'],
                            <? echo $timestampkaki; ?>

                        ]);} else{
                            var data = google.visualization.arrayToDataTable([
                                ['TimeStamp', 'Value'],
                                <? echo $timestamp; ?>
                            ]); 
                        }
                    change = !change;
                    dashboard.bind(slider, pieChart); 

                    // Draw the dashboard. 
                    dashboard.draw(data); 
                }
                // Create a dashboard. 
                var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_div')); 

                // Create a range slider, passing some options 
                slider = new google.visualization.ControlWrapper({ 
                    controlType: 'ChartRangeFilter', 
                    containerId: 'filter_div', 
                    options: { 
                        filterColumnLabel: 'TimeStamp',
                        ui: {
                            'chartView': {
                                'columns': [0, 1]
                            },
                            minRangeSize: 86400000,
                            chartType: 'LineChart',
                            chartOptions: {
                                width: 1000,
                                height: 70,
                                hAxis: {
                                    //                                    format: 'hh:mm:ss',
                                    //                                    ticks: [
                                    //                                        new Date(2013, 10, 2, 12, 0),
                                    //                                        new Date(2013, 10, 2, 12, 10),
                                    //                                        new Date(2013, 10, 2, 12, 20),
                                    //                                        new Date(2013, 10, 2, 12, 30),
                                    //                                        new Date(2013, 10, 2, 12, 40),
                                    //                                        new Date(2013, 10, 2, 12, 50),
                                    //                                        new Date(2013, 10, 2, 13, 0),
                                    //                                        new Date(2013, 10, 2, 13, 10)
                                    //                                    ]
                                }
                            },
                            //                            chartView: {
                            //                                columns: [1, {
                            //                                    type: 'number',
                            //                                    calc: function () {return 0;}            
                            //                                }]
                            //                            }
                        }
                    } 
                }); 

                // Create a pie chart, passing some options 
                var pieChart = new google.visualization.ChartWrapper({ 
                    chartType: 'LineChart', 
                    containerId: 'chart_div', 
                    options: { 

                        width: 1000, 
                        height: 500, 
                        pieSliceText: 'Kepala', 
                        legend: 'right',


                        animation: {
                            duration: 800,
                            easing: 'in'
                        }


                    } 
                }); 



                // Establish dependencies, declaring that 'filter' drives 'pieChart', 
                // so that the pie chart will only display entries that are let through 
                // given the chosen slider range. 
                dashboard.bind(slider, pieChart); 

                // Draw the dashboard. 
                dashboard.draw(data); 
            } 






        </script> 
    </head> 
    <body> 
        <!--Div that will hold the dashboard--> 
        <div id="dashboard_div" style="overflow:auto;width: 1000px; height: 600px;"> 
            <!--Divs that will hold each control and chart--> 
            <div id="chart_div"></div> 
            <div id="filter_div"></div> 
        </div> 
        <button id="b1">Change</button>
    </body> 
</html>
