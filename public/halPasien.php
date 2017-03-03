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
    while ($row= $result->fetch_row()){
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
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!--        Load google font-->
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Open+Sans">
        <!--        load jquery-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <!--        load css file-->
        <link rel="stylesheet" type="text/css" href="stylePasienProf.css">

        <!--Load the AJAX API--> 
        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
        <script type="text/javascript"> 

            // Load the Visualization API and the controls package. 
            google.load('visualization', '1.0', {'packages':['controls', 'line']}); 

            // Set a callback to run when the Google Visualization API is loaded. 
            google.setOnLoadCallback(drawDashboard); 

            var slider; 

            function drawDashboard() {
                // Create data table. 
                var data = google.visualization.arrayToDataTable([
                    ['TimeStamp', 'Value'],
                    <? echo $timeValue['kepala']; ?>
                ]); 

                /*Button to change graph*/
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

                /*Change graph based on button that clicked*/
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
                    dashboard.bind(slider, lineChart); 
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
                    dashboard.bind(slider, lineChart); 
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
                    dashboard.bind(slider, lineChart); 
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
                    dashboard.bind(slider, lineChart); 
                    dashboard.draw(data); 
                }


                // Create a dashboard. 
                var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_div')); 

                // Create slider, passing some options 
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
                            //                            chartType: 'LineChart',
                            chartOptions: {
                                height: 70,
                                colors: ['#00796B'],
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


                // Create line chart, 
                var lineChart = new google.visualization.ChartWrapper({ 
                    chartType: 'LineChart', 
                    containerId: 'chart_div', 
                    options: {
                        pointSize: 5,
                        colors: ['#00796B'],
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

                        //                        width: 1000, 
                        height: 500, 
                        pieSliceText: 'Kepala', 
                        legend: 'right',


                        animation: {
                            duration: 800,
                            easing: 'in'
                        }


                    } 
                }); 

                //Create toolTIP, STILL FAILED
                var options = {
                    tooltip: {isHtml: true},
                    legend: 'none'};


                dashboard.bind(slider, lineChart);  
                dashboard.draw(data); 
            }

        </script> 
    </head>
    
    
    <body>
        <!--Menu Bar-->
        <ul class="topnav">
            <li class="dropdown">
                <div class="menu">
                    <img src="menu.png" class="menubtn" onclick="openNav()">
                </div>
            </li>
        </ul>

        <!--Side Navigation-->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="pilihanMenu"  onmouseover="onHoverPasien();" onmouseout="offHoverPasien();">
                <img src="check-wht.png" id="menuImg" >
                <a href="#">Pasien</a>
            </div>
            <div class="pilihanMenu" onmouseover="onHoverStaff();" onmouseout="offHoverStaff();">
                <img src="staff-wht.png" id="menuImgStaff">
                <a href="#">Staff</a>
            </div>
            <div class="pilihanMenu" onmouseover="onHoverDokter();" onmouseout="offHoverDokter();">
                <img src="tool-wht.png" id="menuImgDokter">
                <a href="#">Dokter</a>
            </div>
            <!--
<div>
<a href="#">Contact
</a>
</div>
-->
        </div>

        <!--        Profil Pasien Bagian atas-->
        <div id="idPasien" class="pasienProfile">
            <!--            Id, Foto dan add Diagnose Button-->
            <div class="pasienFotoID">
                <div class="foto">
                    <img class="profImage-round" src="person.jpg" alt="Profile Image">
                </div>
                <div class="label-ID">
                    <label> ID:12345</label>
                </div>
                <div class="imageButton">
                    <button class="diagnoseButton" style="vertical-align:middle"><span>Hover </span></button>
                </div>
            </div>

            <!--            Informasi personal pasien-->
            <div class="personalInfo">
                <label class="labelpersonalInfo">Nama</label>
                <p class="Info">Larasati</p>
                <label class="labelpersonalInfo">No.Telepon</label>
                <p class="Info">0822-222-222</p>
                <label class="labelpersonalInfo">E-mail</label>
                <p class="Info">Larasati@mail.com</p>
                <label class="labelpersonalInfo">Alamat</label>
                <p class="Info">Jalan Lembur Jatir  ekhfjksnfdnf jsh g j sjknfdjsjf</p>
            </div>

            <!--            informasi kesehatan pasien-->
            <div class="healthInfo">
                <div class="healthInfoTop">
                    <div class="health">
                        <label class="labelhealthInfo">Tanggal Lahir</label>
                        <p class="Info">12 September 1998</p>
                    </div>
                    <div class="health">
                        <label class="labelhealthInfo">Jenis Kelamin</label>
                        <p class="Info">Perempuan</p>
                    </div>
                    <div class="health">
                        <label class="labelhealthInfo">Berat Badan</label>
                        <p class="Info">48 Kg</p>
                    </div>
                    <div class="health">
                        <label class="labelhealthInfo">Tinggi Badan</label>
                        <p class="Info">160 cm</p>
                    </div>
                </div>
                <div class="healthInfoBottom">
                    <div class="health">
                        <label class="labelhealthInfo">Pekerjaan</label>
                        <p class="Info">Developer</p>
                    </div>
                    <div class="health">
                        <label class="labelhealthInfo">Deskripsi</label>
                        <p class="Info">Froma A to B, tambahain deskripsi, aku juga kurang tahu, asal masukin aja haha</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="buttonNav">
            <button href="#" id="hReport" class="hReport">Health Report</button>
            <button href="#" id="diagnose" class="diagnose">Diagnose</button>
            <button href="#" id="sensor" class="sensor">Sensor</button>
        </div>
        <div id="reportPasien" class="healthReport">
            <div id="1" class="chartHealthInfo">
                <div class="chartViewChooser">

                    <label>Tampilkan Bedasarkan</label>

                    <select id="chartView">
                        <option value="1">Anggota Tubuh</option>
                        <option value="2">Tanggal</option>
                    </select>

                </div>

                <div id="chartTanggal" class="groupHealthReport c1">Still In Progress</div>
                <div id="chartTubuh" class="groupHealthReport c2">
                    <div id="dashboard_div" style="width: auto; height: 600px;"> 
                        <div class="btnAnggotaTubuh">
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
                        <!--Divs that will hold each control and chart--> 
                        <div class="chart">
                            <div id="chart_div"></div> 
                            <div id="filter_div"></div> 
                        </div>
                    </div>

                </div>

            </div>
            <div id="2" class="chartHealthInfo" style="display:none;">..2</div>
            <div id="3" class="chartHealthInfo" style="display:none;">..3</div>
        </div>

        <script>
            function onHoverPasien()
            {
                $("#menuImg").attr('src', 'check-grn.png');
            }

            function offHoverPasien()
            {
                $("#menuImg").attr('src', 'check-wht.png');
            }
            
            function onHoverDokter()
            {
                $("#menuImgDokter").attr('src', 'tool-grn.png');
            }

            function offHoverDokter()
            {
                $("#menuImgDokter").attr('src', 'tool-wht.png');
            }
            
            function onHoverStaff()
            {
                $("#menuImgStaff").attr('src', 'staff-grn.png');
            }

            function offHoverStaff()
            {
                $("#menuImgStaff").attr('src', 'staff-wht.png');
            }

        </script>
        
        
        <script type="text/javascript">
            $(function () {
                $('.groupHealthReport').hide();
                $('.c2').show();

                $('#chartView').on("change",function () {
                    $('.groupHealthReport').hide();
                    $('.c'+$(this).val()).show();
                }).val("1");
            });
        </script>

        <!--        Script untuk mengubah Warna tombol pada tab Health report, diagnose dan sensor report-->
        <script>
            var btnReport = document.getElementById("hReport");
            var btnDiagnose = document.getElementById("diagnose");
            var btnSensor = document.getElementById("sensor");

            btnReport.style.backgroundColor = "#00796B";
            btnDiagnose.style.backgroundColor = "#4DB6AC";
            btnSensor.style.backgroundColor = "#4DB6AC";


            btnDiagnose.addEventListener('click', function(event) {
                btnReport.style.backgroundColor = "#4DB6AC";
                btnDiagnose.style.backgroundColor = "#00796B";
                btnSensor.style.backgroundColor = "#4DB6AC";
            });

            btnReport.addEventListener('click', function(event) {
                btnReport.style.backgroundColor = "#00796B";
                btnDiagnose.style.backgroundColor = "#4DB6AC";
                btnSensor.style.backgroundColor = "#4DB6AC";
            });

            btnSensor.addEventListener('click', function(event) {
                btnReport.style.backgroundColor = "#4DB6AC";
                btnDiagnose.style.backgroundColor = "#4DB6AC";
                btnSensor.style.backgroundColor = "#00796B";
            });
        </script>


        <!--        Script untuk mengganti div tab report pasien berubah-->
        <script type="text/javascript">
            $('#hReport').on('click',function(){
                $('#1').show().siblings('div').hide();
            });

            $('#diagnose').on('click',function(){
                $('#2').show().siblings('div').hide();
            });

            $('#sensor').on('click',function(){
                $('#3').show().siblings('div').hide();
            });
        </script>



        <!--        script untuk menampilkan side navigation menu-->
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "150px";
//                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
//                document.body.style.backgroundColor = "#EEEEEE";
            }
        </script>

    </body>
</html> 
