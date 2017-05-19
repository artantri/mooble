@extends('layout.menu_bar')


@section('PHP')

<?
session_start();

$idPasien = 1;

//$idPasien = $_GET['id'];
$_SESSION["idPasien"] = $idPasien;

$_SESSION["bagTubuh"] = isset($_POST['bagianTubuh']) ? $_POST['bagianTubuh'] : ''; 


require("connect/connect.php");


$command = "SELECT name, NIK, phone_number, email, address, birth_date, gender, weight, height, job, job_description FROM `patient` where patient_id = '$idPasien'";
$result = mysqli_query($connection, $command);
if($result){
    // Fetch one and one row
    $rowID= $result->fetch_row();

    $name = $rowID[0];
    $NIK = $rowID[1];
    $contact = $rowID[2];
    $email = $rowID[3];
    $address = $rowID[4];
    $dateBirth = $rowID[5];
    $gender = $rowID[6];
    $weight = $rowID[7];
    $height = $rowID[8];
    $job = $rowID[9];
    $job_desc = $rowID[10];

    # age
    $age = date_diff(date_create($dateBirth), date_create('today'))->y;

    if($gender == 'Perempuan'){
        $iconGender = "female";
        if($age < 1){
            $HRLimitLow = 118;
            $HRLimitHigh = 137;
        }
        elseif($age == 1){
            $HRLimitLow = 110;
            $HRLimitHigh = 125;
        }
        elseif($age < 4){
            $HRLimitLow = 98;
            $HRLimitHigh = 114;
        }
        elseif($age < 6){
            $HRLimitLow = 87;
            $HRLimitHigh = 104;
        }
        elseif($age < 9){
            $HRLimitLow = 79;
            $HRLimitHigh = 94;
        }
        elseif($age < 12){
            $HRLimitLow = 76;
            $HRLimitHigh = 91;
        }
        elseif($age < 16){
            $HRLimitLow = 70;
            $HRLimitHigh = 87;
        }
        elseif($age < 20){
            $HRLimitLow = 69;
            $HRLimitHigh = 85;
        }
        elseif($age < 40){
            $HRLimitLow = 66;
            $HRLimitHigh = 82;
        }
        elseif($age < 60){
            $HRLimitLow = 64;
            $HRLimitHigh = 79;
        }
        elseif($age < 80){
            $HRLimitLow = 64;
            $HRLimitHigh = 78;
        }
        else{
            $HRLimitLow = 64;
            $HRLimitHigh = 77;
        }
    }
    else{
        $iconGender = "male";
        if($age < 1){
            $HRLimitLow = 115;
            $HRLimitHigh = 137;
        }
        elseif($age == 1){
            $HRLimitLow = 107;
            $HRLimitHigh = 122;
        }
        elseif($age < 4){
            $HRLimitLow = 96;
            $HRLimitHigh = 112;
        }
        elseif($age < 6){
            $HRLimitLow = 84;
            $HRLimitHigh = 100;
        }
        elseif($age < 9){
            $HRLimitLow = 76;
            $HRLimitHigh = 92;
        }
        elseif($age < 12){
            $HRLimitLow = 70;
            $HRLimitHigh = 86;
        }
        elseif($age < 16){
            $HRLimitLow = 66;
            $HRLimitHigh = 83;
        }
        elseif($age < 20){
            $HRLimitLow = 61;
            $HRLimitHigh = 78;
        }
        elseif($age < 40){
            $HRLimitLow = 61;
            $HRLimitHigh = 76;
        }
        elseif($age < 60){
            $HRLimitLow = 61;
            $HRLimitHigh = 77;
        }
        elseif($age < 80){
            $HRLimitLow = 60;
            $HRLimitHigh = 75;
        }
        else{
            $HRLimitLow = 61;
            $HRLimitHigh = 78;
        }
    }

    if($age < 2){
        $tempLimitLow = 34.72;
        $tempLimitHigh = 27.28;
    }
    elseif($age < 11){
        $tempLimitLow = 35.89;
        $tempLimitHigh = 36.67;
    }
    elseif($age < 66){
        $tempLimitLow = 35.17;
        $tempLimitHigh = 36.89;
    }
    else{
        $tempLimitLow = 35.56;
        $tempLimitHigh = 36.33;
    }
    //    echo $tempLimitHigh . "dan " .$tempLimitLow;
    //    echo $HRLimitHigh . "dan " .$HRLimitLow;
}
?>
@endsection


@section('headAdd')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>


<script>
    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        var options = {    
            chart: {
                renderTo: 'rateSakitChart_div',/*the Id of the div that the chart is rendered in*/             
                height:320,

            },    
            title: {    
                text: ''
            },
            events:{               /*IMPORTANT: HighCharts has the Events option which is an event listener */
                load: refreshChart() /*Load: Fires when the chart is finished loading.*/
            },                      /* Thus it will call the function refreshChart() upon completion of rendering the chart */
            tooltip: { 
                formatter: function() {
                    return '<b>' + Highcharts.dateFormat('%a, %e %b %Y %H:%M', new Date(this.x)) + '</b> <br/>Rate Sakit: ' + this.y;                               
                }
            },
            valueSuffix: '',
            xAxis: {
                type: 'datetime',  /*X Axis is of datetime type*/             
                dateTimeLabelFormats: {
                    hour:"%H:%M",
                    day:"%a, %e %b %Y",
                    month:"%b %Y",
                    year:"%Y"
                }                          
            },
            yAxis: {
                tickPositions: [0, 1, 2, 3, 4, 5],
                type: 'linear',
                title: {
                    text: 'Rate Sakit'
                },
            },
            rangeSelector: {
                enabled: true,
                buttons: [{
                    count: 1,
                    type: 'day',
                    text: '1D'
                }, {
                    count: 1,
                    type: 'week',
                    text: '1W'
                }, {
                    count: 1,
                    type: 'month',
                    text: '1M'
                }, {
                    type: 'all',
                    text: 'All'
                }],
                inputEnabled: false,
                selected: 0
            },    
            navigator: {
                enabled: true,
                selected: 1,
                series: { lineColor: '#5EC2A9'}
            },
            scrollbar: {
                enabled: true
            },
            exporting: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            series: [{
                lineWidth: 2,
                color: '#5EC2A9',
                name: 'Waktu'
            }]
        }

        $.getJSON("connect/data_rate_sakit.php", function(json) {    /*Get the array data in data.php using jquery getJSON function*/
            options.series[0].data = json;        /*assign the array variable to chart data object*/
            chart = new Highcharts.Chart(options); /*create a new chart*/
        });

        function refreshChart(){                 /*function is called every set interval to refresh(recreate the chart) with the new data from data.php*/
            setInterval(function(){
                $.getJSON("connect/data_rate_sakit.php", function(json) {
                    options.series[0].data = json;
                    chart = new Highcharts.Chart(options);
                });
            },60000);
        }
    });

    /*** Temp time chart ***/
    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        var options = {    
            chart: {
                renderTo: 'temperatureChart_div',/*the Id of the div that the chart is rendered in*/                 
                height:400,

            },    
            title: {    
                text: ''
            },
            events:{               /*IMPORTANT: HighCharts has the Events option which is an event listener */
                load: refreshChart() /*Load: Fires when the chart is finished loading.*/
            },                      /* Thus it will call the function refreshChart() upon completion of rendering the chart */
            tooltip: { 
                formatter: function() {
                    return '<b>' + Highcharts.dateFormat('%a, %e %b %Y %H:%M', new Date(this.x)) + '</b> <br/>Suhu Badan: ' + this.y + ' C';                               
                }
            },
            valueSuffix: ' C',
            xAxis: {
                type: 'datetime',  /*X Axis is of datetime type*/ 
                dateTimeLabelFormats: {
                    hour:"%H:%M",
                    day:"%a, %e %b %Y",
                    month:"%b %Y",
                    year:"%Y"
                }  
            },
            yAxis: {
                allowDecimals: true,
                type: 'linear',
                title: {
                    text: 'Temperature (C)'
                },
                tickPositions: [30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40],
                plotLines: [{
                    value: <? echo $tempLimitHigh; ?>,
                    color: 'red',
                    dashStyle: 'shortdash',
                    width: 1,
                    label: {
                    text: 'Batas Atas Suhu'
                }
                            }, {
                            value: <? echo $tempLimitLow; ?>,
                            color: 'green',
                            dashStyle: 'shortdash',
                            width: 1,
                            label: {
                            text: 'Batas Bawah Suhu'
                            }
                            }]
            },
            legend: {
                enabled: false
            },
            rangeSelector: {
                enabled: true,
                buttons: [{
                    count: 1,
                    type: 'day',
                    text: '1D'
                }, {
                    count: 1,
                    type: 'week',
                    text: '1W'
                }, {
                    count: 1,
                    type: 'month',
                    text: '1M'
                }, {
                    type: 'all',
                    text: 'All'
                }],
                inputEnabled: false
            },    
            navigator: {
                enabled: true,
                selected: 1
            },
            scrollbar: {
                enabled: true
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Waktu'
            }]
        }

        $.getJSON("connect/data_temperature.php", function(json) {    /*Get the array data in temp_line_chart.php using jquery getJSON function*/
            options.series[0].data = json;        /*assign the array variable to chart data object*/
            chart = new Highcharts.Chart(options); /*create a new chart*/
        });

        function refreshChart(){                 /*function is called every set interval to refresh(recreate the chart) with the new data from temp_line_chart.php*/
            setInterval(function(){
                $.getJSON("connect/data_temperature.php", function(json) {
                    options.series[0].data = json;
                    chart = new Highcharts.Chart(options);
                });
            },60000);
        }
    });

    /*** Health Rate time chart ***/
    $(document).ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        var options = {    
            chart: {
                renderTo: 'bloodPressureChart_div',/*the Id of the div that the chart is rendered in*/                 
                height:400,

            },    
            title: {    
                text: ''
            },
            events:{               /*IMPORTANT: HighCharts has the Events option which is an event listener */
                load: refreshChart() /*Load: Fires when the chart is finished loading.*/
            },                      /* Thus it will call the function refreshChart() upon completion of rendering the chart */
            tooltip: { 
                formatter: function() {
                    return '<b>' + Highcharts.dateFormat('%a, %e %b %Y %H:%M', new Date(this.x)) + '</b> <br/>Heart Rate: ' + this.y + ' Bpm';                               
                }
            },
            valueSuffix: ' ',
            xAxis: {
                type: 'datetime',  /*X Axis is of datetime type*/                                        
                dateTimeLabelFormats: {
                    hour:"%H:%M",
                    day:"%a, %e %b %Y",
                    month:"%b %Y",
                    year:"%Y"
                }  
            },
            yAxis: {
                type: 'linear',
                title: {
                    text: 'Detak Jantung (Beat per Minute)'
                },
                tickPositions: [0, 20, 40, 60, 80, 100],
                plotLines: [{
                    value: <? echo $HRLimitHigh; ?>,
                    color: 'red',
                    dashStyle: 'shortdash',
                    width: 1,
                    label: {
                    text: 'Batas Atas Heart Rate'
                }
                            }, {
                            value: <? echo $HRLimitLow; ?>,
                            color: 'green',
                            dashStyle: 'shortdash',
                            width: 1,
                            label: {
                            text: 'Batas Bawah Heart Rate'
                            }
                            }]
            },
            legend: {
                enabled: false
            },
            rangeSelector: {
                enabled: true,
                buttons: [{
                    count: 1,
                    type: 'day',
                    text: '1D'
                }, {
                    count: 1,
                    type: 'week',
                    text: '1W'
                }, {
                    count: 1,
                    type: 'month',
                    text: '1M'
                }, {
                    type: 'all',
                    text: 'All'
                }],
                inputEnabled: false
            },    
            navigator: {
                enabled: true,
                selected: 1
            },
            scrollbar: {
                enabled: true
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Waktu'
            }]
        }

        $.getJSON("connect/data_heart_rate.php", function(json) {    /*Get the array data in heartRate_line_chart.php using jquery getJSON function*/
            options.series[0].data = json;        /*assign the array variable to chart data object*/
            chart = new Highcharts.Chart(options); /*create a new chart*/
        });

        function refreshChart(){                 /*function is called every set interval to refresh(recreate the chart) with the new data from heartRate_line_chart.php*/
            setInterval(function(){
                $.getJSON("connect/data_heart_rate.php", function(json) {
                    options.series[0].data = json;
                    chart = new Highcharts.Chart(options);
                });
            },60000);
        }
    });

</script>

@endsection

@section('content')

<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
            <div class="x_panel" style="padding:20px;">
                <div class="x_content">
                    <div class="col-md-1 col-sm-12 col-xs-12" style="margin-right:50px;">
                        <img class="profile_img" style="width: 100%; height:100%;" src="images/user.png" alt="Avatar" title="Change the avatar">

                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12" style=" border-right: 2px solid #D1D9DD;" >
                        <div style=" border-bottom: 2px solid #D1D9DD;">
                            <h2 class="name font-roboto" style="margin-bottom:0px; color:#546677;"><? echo $name; ?></h2>
                            <h6 class="NIK font-roboto-condensed" style="margin-top:2px; margin-bottom:5px; color: #90A4AE;">NIK <? echo $NIK; ?></h6>
                        </div>

                        <div class="col-md-12" style=" border-bottom: 2px solid #D1D9DD; width: 100%; " >
                            <div class="col-md-5 col-sm-12 col-xs-12" style=" padding-left: 3px;" >

                                <h6 style="margin-bottom:5px; color:#90A4AE;" class="font-roboto-condensed"><i class="fa fa-birthday-cake user-profile-icon" style="margin-bottom:0px;"></i>&nbsp;&nbsp;&nbsp;Umur</h6>

                                <h3 style="margin-top:2px; margin-bottom:2px; color:#546677;" class="age font-roboto"><? echo $age; ?> <small style="color:#546677;" class="font-roboto-condensed">Tahun</small></h3>

                                <h6 class="birthDate font-roboto-condensed" style="margin-top:5px; margin-bottom:2px; color:#90A4AE;">lahir <? echo $dateBirth; ?></h6>

                            </div>

                            <div class="col-md-7 col-sm-12 col-xs-12" style="border-left: 2px solid #D1D9DD;">
                                <div class="" style="width:100%">
                                    <div style="">
                                        <h6 style="margin-bottom:2px; color:#90A4AE;" class="font-roboto-condensed"><i class="fa fa-envelope user-profile-icon"></i>&nbsp;&nbsp;&nbsp;Email</h6>

                                        <h5  class="email font-roboto" style="margin-top:0px; color:#546677;"><? echo $email; ?></h5>
                                    </div>

                                    <div style="">
                                        <h6 style="margin-bottom:2px; color:#90A4AE;" class="font-roboto-condensed"><i class="fa fa-phone user-profile-icon"></i>&nbsp;&nbsp;&nbsp;Nomor Telepon</h6>

                                        <h5  class="contact font-roboto" style="margin-top:0px; color:#546677;"><? echo $contact; ?></h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="width: 100%;" >
                            <h6 style="margin-bottom:5px; color:#90A4AE;" class="font-roboto-condensed"><i class="fa fa-map-marker user-profile-icon" style="margin-bottom:0px;"></i>&nbsp;&nbsp;&nbsp;Alamat</h6>

                            <h5  class="address font-roboto" style="margin-top:0px; color:#546677;"><? echo $address; ?></h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12" style="border-bottom: 2px solid #D1D9DD;" >
                        <div class="col-md-1 col-sm-12 col-xs-12" style="width;:100%; margin-right:20px;">
                            <h1 style="color:#90A4AE; font-size:50px;" class="font-roboto-condensed"><i class="fa fa-<? echo $iconGender; ?> user-profile-icon"></i></h1>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12" style="width;:100%;">
                            <h5 style="margin-bottom:3px; margin-top:15px; color:#90A4AE;" class="font-roboto-condensed">Tinggi Badan</h5>
                            <h3 style="margin-top:0px; color: #546677;" class="height font-roboto-condensed"><? echo $height; ?> cm</h3>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12" style="width;:100%;">
                            <h5 style="margin-bottom:3px; margin-top:15px; color:#90A4AE;" class="font-roboto-condensed">Berat Badan</h5>
                            <h3 style="margin-top:0px; color: #546677;" class="weight font-roboto-condensed"><? echo $weight; ?> Kg</h3>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12" style="width;:100%;">
                            <h5 style="margin-bottom:3px; margin-top:15px; color:#90A4AE;" class="font-roboto-condensed">Jenis Kelamin</h5>
                            <h3 style="margin-top:0px; color: #546677;" class="gender font-roboto-condensed"><? echo $gender; ?></h3>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12" >
                        <div style="padding: 10px;">
                            <h6 style="margin-bottom:2px; color:#90A4AE;" class="font-roboto-condensed"><i class="fa fa-briefcase user-profile-icon"></i>&nbsp;&nbsp;&nbsp;Pekerjaan</h6>
                            <h3 style="margin-top:0px; margin-bottom:0px; color: #546677;" class="job font-roboto"><? echo $job; ?></h3>
                            <p style="margin-bottom:10px; margin-top:5px; color:#90A4AE; font-size:12px;" class="jobDesc font-roboto"><? echo $job_desc; ?></p>
                            <a class='btn btn-info btnPasienProf' style="float:right; border-radius: 30px; width: auto; margin-top:10px; " href='addDiagnose.php'>
                                <h5 style="margin-top:2px; margin-bottom:2px;" class="font-roboto"><i class="fa fa-edit user-profile-icon"></i>&nbsp;&nbsp;&nbsp;Tambah Diagnosis</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:white;">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs font-open-sans" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Informasi Kesehatan Pasien</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Sensor</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Riwayat Diagnosis</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="panel-title font-open-sans">Grafik Informasi Kesehatan Pasien</h4>
                                    </a>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body" style="background-color:white; ">
                                            <div id="chartTubuh" class="groupHealthReport c2">
                                                <div id="dashboard_div" style="width: 100%; height: 500px; overflow: auto;"> 
                                                    <div class="well" style="overflow: auto">
                                                        <label for="bagianTubuh" class="font-open-sans">Bagian Tubuh:</label>
                                                        <form class="form-horizontal font-open-sans"  method="POST">
                                                            <div class="col-md-4">
                                                                <select name="bagianTubuh" class="form-control" required>
                                                                    <option value="kepala">Kepala</option>
                                                                    <option value="kulit">Kulit</option>
                                                                    <option value="kaki">Kaki</option>
                                                                    <option value="hidung">Hidung</option>
                                                                    <option value="gigi">Gigi</option>
                                                                    <option value="lidah">Lidah</option>
                                                                    <option value="gusi">Gusi</option>
                                                                    <option value="telinga">Telinga</option>
                                                                    <option value="dagu">Dagu</option>
                                                                    <option value="leher">Leher</option>
                                                                    <option value="bahu">Bahu</option>
                                                                    <option value="tangan">Tangan</option>
                                                                    <option value="dada">Dada</option>
                                                                    <option value="perut">Perut</option>
                                                                    <option value="pinggang">Pinggang</option>
                                                                    <option value="mata">Mata</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <button id="graphPart" class="btn btn-lg btn-default btn-block" type="submit" style="height: 35px; font-size:13px; font-family: helvetica; font-weight: bold;">Lihat Grafik</button>
                                                            </div>

                                                        </form>
                                                    </div>

                                                    <!--chart rate sakit-->



                                                    <div class="media" style="border-bottom:2px solid #e8e8e8; padding-left:10px; ">

                                                        <i class="fa fa-line-chart user-profile-icon pull-left"></i>
                                                        <div class="media-body">
                                                            <h5 class="label_graph media-heading font-open-sans" id="GraphTitle">Grafik <? echo $_SESSION['bagTubuh']; ?></h5>
                                                        </div>
                                                    </div>

                                                    <div id="rateSakitChart_div" class="col-md-12" style="  margin-top:20px;"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h4 class="panel-title font-open-sans">Detail Informasi Kesehatan</h4>
                                    </a>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body" style="background-color:white;">
                                            <ul class="list-unstyled timeline">
                                                <? 
                                                require_once('connect/connect.php');



                                                $sql ="SELECT health_profile.pain_rate, health_profile.timestamp, body_part.name, health_profile.pain_description FROM ((`health_profile` 
                                                                    INNER JOIN body_part on health_profile.body_id = body_part.body_id)
                                                                    INNER JOIN patient on health_profile.patient_id = patient.patient_id)                                                  WHERE patient.patient_id = '$idPasien' ORDER BY health_profile.timestamp DESC";

                                                $result=mysqli_query($connection,$sql);
                                                $numOfRows = mysqli_num_rows($result);
                                                $i = 0;
                                                if($result){

                                                    while ($row= $result->fetch_row()){
                                                        $min = date( 'd F Y', strtotime($row[1]));

                                                        $dayMonth = date( 'd M', strtotime($row[1]));
                                                        $year = date( 'Y', strtotime($row[1]));

                                                        $jam = date( 'h:i', strtotime($row[1]));

                                                        switch ($row[2]){
                                                            case "kulit":
                                                                $image = "images/bodyParts/kulit.png";
                                                                break;

                                                            case "kepala":
                                                                $image = "images/bodyParts/kepala.png";
                                                                break;

                                                            case "mata":
                                                                $image = "images/bodyParts/mata.png";
                                                                break;

                                                            case "hidung":
                                                                $image = "images/bodyParts/hidung.png";
                                                                break;

                                                            case "gigi":
                                                                $image = "images/bodyParts/gigi.png";
                                                                break;

                                                            case "lidah":
                                                                $image = "images/bodyParts/lidah.png";
                                                                break;

                                                            case "gusi":
                                                                $image = "images/bodyParts/gusi.png";
                                                                break;

                                                            case "telinga":
                                                                $image = "images/bodyParts/telinga.png";
                                                                break;

                                                            case "dagu":
                                                                $image = "images/bodyParts/dagu.png";
                                                                break;

                                                            case "leher":
                                                                $image = "images/bodyParts/leher.png";
                                                                break;

                                                            case "bahu":
                                                                $image = "images/bodyParts/bahu.png";
                                                                break;

                                                            case "tangan":
                                                                $image = "images/bodyParts/tangan.png";
                                                                break;

                                                            case "dada":
                                                                $image = "images/bodyParts/dada.png";
                                                                break;

                                                            case "perut":
                                                                $image = "images/bodyParts/perut.png";
                                                                break;

                                                            case "pinggang":
                                                                $image = "images/bodyParts/pinggang.png";
                                                                break;

                                                            case "kaki":
                                                                $image = "images/bodyParts/kaki.png";
                                                                break;
                                                        }



                                                        if($i == 0){
                                                            echo "<li> <div class='block'>
                                                                    <div class='tags'>
                                                                        <a><h2 style='margin-bottom:0;' align='center'>" .$dayMonth. "</h2>

                                                                            <h3 style='margin:0;' align='center'>" .$year. "</h3>
                                                                        </a>
                                                                    </div>
                                                                    <div class='block_content'>
                                                                        <article class='media event'>
                                                                            <div class='media-left'>
                                                                                <img class='media-object' src='" .$image. "' style='width:60px;'>
                                                                            </div>

                                                                            <div class='media-body'>
                                                                                <a class='title'>" .$jam. "</a>
                                                                                <p>Pasien memiliki keluhan pada bagian <strong>" .$row[2]. "</strong> dengan rate sakit <strong>" .$row[0]."</strong></p>
                                                                                <p>Deskripsi keluhan pasien: " .$row[3]. "
                                                                            </div>
                                                                        </article>";
                                                            $temp = $min;
                                                        } elseif($temp == $min){
                                                            echo "<article class='media event'>
                                                                        <div class='media-left'>
                                                                            <img class='media-object' src='" .$image. "' style='width:60px;'>
                                                                        </div>

                                                                        <div class='media-body'>
                                                                            <a class='title'>" .$jam. "</a>
                                                                            <p>Pasien memiliki keluhan pada bagian <strong>" .$row[2]. "</strong> dengan rate sakit <strong>" .$row[0]."</strong></p>
                                                                        </div>
                                                                        </article>";
                                                            $temp = $min;
                                                        }   elseif($temp != $min){
                                                            echo " </div>
                                                                    </div>
                                                                    </li>

                                                                    <li> <div class='block'>
                                                                        <div class='tags'>
                                                                            <a><h2 style='margin-bottom:0;' align='center'>" .$dayMonth. "</h2>

                                                                                <h3 style='margin:0;' align='center'>" .$year. "</h3>
                                                                            </a>
                                                                        </div>
                                                                        <div class='block_content'>
                                                                            <article class='media event'>
                                                                                <div class='media-left'>
                                                                                    <img class='media-object' src='" .$image. "' style='width:60px;'>
                                                                                </div>

                                                                                <div class='media-body'>
                                                                                    <a class='title'>" .$jam. "</a>
                                                                                    <p>Pasien memiliki keluhan pada bagian <strong>" .$row[2]. "</strong> dengan rate sakit <strong>" .$row[0]."</strong></p>
                                                                                    <p>Deskripsi keluhan pasien: " .$row[3]. "
                                                                                </div>
                                                                            </article>";
                                                            $temp = $min;
                                                        }
                                                        $i ++;
                                                    }
                                                    echo "</div>
                                                                        </div>
                                                                    </li>";
                                                }

                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab"> 
                            <div class="col-md-12" style="overflow: auto;"> 


                                <div class="media" style="border-bottom:2px solid #e8e8e8; padding-left:10px;">

                                    <i class="fa fa-line-chart user-profile-icon pull-left"></i>
                                    <div class="media-body">
                                        <h5 class="label_graph media-heading font-open-sans" id="GraphTitle">Grafik Tekanan Darah</h5>
                                    </div>
                                </div>

                                <div id="bloodPressureChart_div" style=" margin-top: 10px; margin-bottom: 30px; width:100%; height: 100%;"></div>


                                <div class="media" style="border-bottom:2px solid #e8e8e8; padding-left:10px;">

                                    <i class="fa fa-line-chart user-profile-icon pull-left"></i>
                                    <div class="media-body">
                                        <h5 class="label_graph media-heading font-open-sans" id="GraphTitle">Grafik Suhu Tubuh</h5>
                                    </div>
                                </div>

                                <div id="temperatureChart_div" style=" margin-top: 10px; margin-bottom: 10px; width:100%; height: 100%;"></div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <ul class="list-unstyled timeline">

                                <? 
                                require('connect/connect.php');



                                $sql ="SELECT diagnose.diagnose_result, diagnose.date, diagnose.treatment FROM `diagnose` INNER JOIN patient ON diagnose.patient_id = patient.patient_id  WHERE patient.patient_id = '$idPasien' ORDER BY diagnose.date DESC";


                                $result=mysqli_query($connection,$sql);
                                $i = 0;
                                if($result){

                                    while ($row= $result->fetch_row()){
                                        $min = date( 'd F Y', strtotime($row[1]));
                                        $dayMonth = date( 'd M', strtotime($row[1]));
                                        $year = date( 'Y', strtotime($row[1]));

                                        echo "<li> <div class='block'>
                                                <div class='tags'>
                                                    <a><h2 style='margin-bottom:0;' align='center'>" .$dayMonth. "</h2>

                                                        <h3 style='margin:0;' align='center'>" .$year. "</h3>
                                                    </a>
                                                </div>
                                                <div class='block_content'>
                                                    <article class='media event'>
                                                        <div class='media-body'>
                                                            <h5 style='background-color: #F2F5F7; font-family: helvetica;
                                                            padding:10px; margin-bottom:5px;'>Hasil Diagnosis: </h5>
                                                            <p style='margin-left:50px; margin-bottom:20px;'>" .$row[0]."</p>
                                                            <h5 style='background-color: #F2F5F7; font-family: helvetica;
                                                            padding:10px; margin-bottom:5px;'>Treatment yang Diberikan: </h5>
                                                            <p style='margin-left:50px; margin-bottom:20px;'>" .$row[2]."</p>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </li>";

                                    }
                                }

                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>

</div>

@endsection
