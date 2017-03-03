<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'MOOBLE');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

//if(isset($_POST) & !empty($_POST)){
//    $username = $_POST['username'];
//    $result = mysqli_query($connection,"SELECT NIK, nama, username, phone_number, address FROM `patient` where username = '$username'");
//} else{
$result = mysqli_query($connection,"SELECT NIK, nama, username, phone_number, address, gender, blood_type FROM `patient` ORDER BY id");

$data="";
if($result){
    // Fetch one and one row
    while ($row= $result->fetch_row()){
        $data .= "['".$row[0]."', '" .$row[1]. "','" .$row[2]. "','" .$row[3]. "','" .$row[4]. "','" .$row[5]. "','" .$row[6]. "', '<input type=button value=coba />'], "; 
    }
    echo $data;
}

?>


<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load('visualization', '1', {packages:['controls'], callback: drawTable});
            function getSelectedRowNumber(table) {
                var selection = table.getChart().getSelection();
                var message = '';

                for (var i = 0; i < selection.length; i++) {
//                    var item = selection[i];
                    message = table.getDataTable().getValue(selection[i].row, 2);
//                    if (item.row != null && item.column != null) {
//                        message += '{row:' + item.row + ',column:' + item.column + '}';
//                    } else if (item.row != null) {
//                        message += '{row:' + item.row + '}';
//                    } else if (item.column != null) {
//                        message += '{column:' + item.column + '}';
//                    }
                }
                if (message == '') {
                    message = 'nothing';
                }
                return 'You selected ' + message; 
            }
            
            
            function drawTable() {
                var data = google.visualization.arrayToDataTable([
                    ['NIK', 'Nama', 'UserName', 'Phone Number', 'Address', 'gender', 'Gol Darah', 'Button'],
                    <? echo $data;?>
                ]);


                var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboard'));

                var namaFilter = new google.visualization.ControlWrapper({
                    controlType: 'StringFilter',
                    containerId: 'Nama_filter_div',
                    options: {
                        filterColumnIndex: 1
                    }
                });

                var NIKFilter = new google.visualization.ControlWrapper({
                    controlType: 'StringFilter',
                    containerId: 'NIK_filter_div',
                    options: {
                        filterColumnIndex: 0
                    }
                });
                
                var alamatFilter = new google.visualization.ControlWrapper({
                    controlType: 'StringFilter',
                    containerId: 'alamat_filter_div',
                    options: {
                        filterColumnIndex: 4
                    }
                });

                genderPicker = new google.visualization.ControlWrapper({
                    'controlType': 'CategoryFilter',
                    'containerId': 'gender_Picker_div',
                    'options': {
                        filterColumnIndex: 5,
                        'ui': {
                            'labelStacking': 'horizontal',
                            'allowTyping': false,
                            'allowMultiple': false
                        }
                    }
                });
                
                bloodPicker = new google.visualization.ControlWrapper({
                    'controlType': 'CategoryFilter',
                    'containerId': 'blood_Picker_div',
                    'options': {
                        filterColumnIndex: 6,
                        'ui': {
                            'caption':'Tampilkan Semuanya',
                            'labelStacking': 'horizontal',
                            'allowTyping': false,
                            'allowMultiple': false
                        }
                    }
                });

                var table = new google.visualization.ChartWrapper({
                    chartType: 'Table',
                    containerId: 'table_div',
                    cssClassNames: {tableRow: 'myClass'},
                    'options': {
                        allowHtml: true,
                        showRowNumber: true,
                        width: '100%',
                        height: '100%',
                        cssClassNames: {tableRow: 'myClass'}
                    }
                });



                // Create and draw the visualization.
                //                var table = new google.visualization.Table(document.getElementById('table_div'));
                //                table.draw(data, {
                //                    allowHtml: true,
                //                    showRowNumber: true,
                //                    width: '100%',
                //                    height: '100%',
                //                    cssClassNames: {tableRow: 'myClass'}
                //                });
                // this works for buttons
                $(document).on('click','input[type=button]',function() {
//                    alert($(this).html());
                    var a = getSelectedRowNumber(table);
                    alert(a);
                });


                dashboard.bind([namaFilter, NIKFilter, alamatFilter, genderPicker, bloodPicker], [table]);
                dashboard.draw(data);
                // this works for clicking on row uncomment to test it
//                $(document).on('click','tr.myClass',function() {
//                                             getSelectedRowNumber(table);
//                                             });




            }
        </script>
    </head>
    <body>
        <!--
<form class="form-signin" method="POST">
<input type="text" name="username"  class="form-control" id="username" placeholder="Search..">
<button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
</form>
-->\
        <div id="dashboard">
            <div id="Nama_filter_div"></div>
            <div id="NIK_filter_div"></div>
            <div id="alamat_filter_div"></div>
            <div id="gender_Picker_div"></div>
            <div id="blood_Picker_div"></div>
            <div id="table_div"></div>
        </div>

    </body>

</html>
