<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'MOOBLE');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}


$result = mysqli_query($connection,"SELECT NIK, nama, address, email, phone_number FROM `patient` ORDER BY id");

$data="";

if($result){
    // Fetch one and one row
    while ($row= $result->fetch_row()){
        $data .= "[".$row[0].",'" .$row[1]. "', '" .$row[2]. "', " .$row[4]. "], "; 
    }
    echo $data;
}



mysqli_close($connection);
?>



<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['table']});
            google.charts.setOnLoadCallback(drawTable);

            function drawTable() {
                var data = new google.visualization.arrayToDataTable([
                    ['Name', 'Height', 'Smokes','test'],
                    <? echo $data; ?>
                ]);

                var table = new google.visualization.Table(document.getElementById('table_div'));

                table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
            }
        </script>
    </head>
    <body>
        <div id="table_div"></div>
    </body>
</html>