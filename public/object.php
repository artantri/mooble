<?php
require_once('connect.php');


$sql ="SELECT value,time,bodypart FROM `report` ORDER BY time";

$result=mysqli_query($connection,$sql);
$numOfRows = mysqli_num_rows($result); 
$i = 0;
$timeValue = array("kulit"=>"", 
                   "kepala"=>"", 
                   "mata"=>"", 
                   "hidung"=>"", 
                   "gigi"=>"", 
                   "lidah"=>"", 
                   "gusi"=>"", 
                   "telinga"=>"",
                   "dagu"=>"",
                   "leher"=>"",
                   "bahu"=>"",
                   "tangan"=>"",
                   "dada"=>"",
                   "perut"=>"",
                   "pinggang"=>"",
                   "kaki"=>"");

if($result){
    // Fetch one and one row
    while ($row= $result->fetch_row())
    {
        if($i == 0){
            $min = "new Date(" .date( 'Y, m-1, d, H, i, s', strtotime($row[1])). ")";
        } elseif($i == $numOfRows-1){
            $max = "new Date(" .date( 'Y, m-1, d, H, i, s', strtotime($row[1])). ")";
        }   
        $i ++;
        switch ($row[2]){
            case "kulit":
                $phpdate = strtotime( $row[1] );
                $timeValue['kulit'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "kepala":
                $phpdate = strtotime( $row[1] );
                $timeValue['kepala'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "mata":
                $phpdate = strtotime( $row[1] );
                $timeValue['mata'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "hidung":
                $phpdate = strtotime( $row[1] );
                $timeValue['hidung'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "gigi":
                $phpdate = strtotime( $row[1] );
                $timeValue['gigi'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "lidah":
                $phpdate = strtotime( $row[1] );
                $timeValue['lidah'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "gusi":
                $phpdate = strtotime( $row[1] );
                $timeValue['gusi'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "telinga":
                $phpdate = strtotime( $row[1] );
                $timeValue['telinga'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "dagu":
                $phpdate = strtotime( $row[1] );
                $timeValue['dagu'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "leher":
                $phpdate = strtotime( $row[1] );
                $timeValue['leher'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "bahu":
                $phpdate = strtotime( $row[1] );
                $timeValue['bahu'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "tangan":
                $phpdate = strtotime( $row[1] );
                $timeValue['tangan'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "dada":
                $phpdate = strtotime( $row[1] );
                $timeValue['dada'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "perut":
                $phpdate = strtotime( $row[1] );
                $timeValue['perut'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "pinggang":
                $phpdate = strtotime( $row[1] );
                $timeValue['pinggang'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

            case "kaki":
                $phpdate = strtotime( $row[1] );
                $timeValue['kaki'] .= "[new Date(" .date( 'Y, m-1, d, H, i, s', $phpdate ). "), " .$row[0]. "], ";
                break;

        }
    }
    //    echo "kepala " .$timeValue['kepala'];
    //    echo "kaki " .$timeValue['kaki'];
}
?>


<html> 
    <head> 

        <!--Load the AJAX API--> 
        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
        <script type="text/javascript"> 

            // Load the Visualization API and the controls package. 
            google.load('visualization', '1.0', {'packages':['controls', 'line']}); 

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
                    <? echo $timeValue['kepala']; ?>
                ]); 

                var kulit = document.getElementById('kulit');
                var kepala = document.getElementById('kepala');
                var mata = document.getElementById('mata');
                var hidung = document.getElementById('hidung');
                var gigi = document.getElementById('gigi');
                var lidah = document.getElementById('lidah');
                var gusi = document.getElementById('gusi');
                var telinga = document.getElementById('telinga');
                var dagu = document.getElementById('dagu');
                var leher = document.getElementById('leher');
                var bahu = document.getElementById('bahu');
                var tangan = document.getElementById('tangan');
                var dada = document.getElementById('dada');
                var perut = document.getElementById('perut');
                var pingggang = document.getElementById('pinggang');
                var kaki = document.getElementById('kaki');

                kulit.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['kulit']; ?>
                    ]);
                    dashboard.draw(data); 
                }                
                kepala.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['kepala']; ?>
                    ]);
                    dashboard.bind(slider, pieChart); 
                    dashboard.draw(data); 
                }
                mata.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['mata']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                hidung.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['hidung']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                gigi.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['gigi']; ?>
                    ]);
                    dashboard.draw(data); 
                }                
                lidah.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['lidah']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                gusi.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['gusi']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                telinga.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['telinga']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                dagu.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['dagu']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                leher.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['leher']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                bahu.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['bahu']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                tangan.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['tangan']; ?>
                    ]);
                    dashboard.bind(slider, pieChart); 
                    dashboard.draw(data); 
                }
                dada.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['dada']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                perut.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['perut']; ?>
                    ]);
                    dashboard.bind(slider, pieChart); 
                    dashboard.draw(data); 
                }
                pinggang.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['pinggang']; ?>
                    ]);
                    dashboard.draw(data); 
                }
                kaki.onclick = function(){
                    var data = google.visualization.arrayToDataTable([
                        ['TimeStamp', 'Value'],
                        <? echo $timeValue['kaki']; ?>
                    ]);
                    dashboard.bind(slider, pieChart); 
                    dashboard.draw(data); 
                }


                // Draw the dashboard. 

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
                                    format: 'dd:MM:yyyy'}

                            },
                        }
                    } 
                }); 

                var xTicks = [];
                for (var i = 0; i < data.getNumberOfRows(); i++) {
                    xTicks.push({
                        v: data.getValue(i, 0),
                        f: data.getFormattedValue(i, 0)
                    });
                }
                // Create a pie chart, passing some options 
                var pieChart = new google.visualization.ChartWrapper({ 
                    chartType: 'LineChart', 
                    containerId: 'chart_div', 
                    options: { 

                        viewWindowMode: 'pretty',
                        explorer: { 
                            actions: ['dragToZoom', 'rightClickToReset'], 
                            axis: 'horizontal'
                        },
                        hAxis: {
                            gridlines:
                            {
                                count: -1,
                                units:
                                {
                                    minutes:
                                    {
                                        format: [ "HH:mm" ]
                                    },
                                    hours:
                                    {
                                        format: [ "HH:mm" ]
                                    },
                                    days:
                                    {
                                        format: [ "dd MMM" ]
                                    }
                                },
                            },
                            minorGridlines:
                            {
                                count: -1,
                                units:
                                {
                                    hours:
                                    {
                                        format: [ "HH:mm" ]
                                    },
                                    minutes:
                                    {
                                        format: [ "HH:mm" ]
                                    }
                                }
                            }                        
                            //                            format: "dd MMM yyyy hh:mm"
                            //                            format: "HH:mm:ss"
                            //format:'MMM d, y'
                        },
                        vAxis: {
                            ticks: [0,1,2,3,4,5]},

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
        <div>
            <button id="kulit">Kulit</button>
            <button id="kepala">Kepala</button>
            <button id="mata">Mata</button>
            <button id="hidung">Hidung</button>
            <button id="gigi">Gigi</button>
            <button id="lidah">Lidah</button>
            <button id="gusi">Gusi</button>
            <button id="telinga">Telinga</button>
            <button id="dagu">Dagu</button>
            <button id="leher">Leher</button>
            <button id="bahu">Bahu</button>
            <button id="tangan">Tangan</button>
            <button id="dada">Dada</button>
            <button id="perut">Perut</button>
            <button id="pinggang">Pinggang</button>
            <button id="kaki">Kaki</button>
        </div>

    </body> 
</html>
