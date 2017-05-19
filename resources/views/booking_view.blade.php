@extends('layout.menu_bar_staff')

@section('content')


<div class="">
    <div class="clearfix"></div>
    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form class="form-horizontal" style="padding-bottom:20px; padding-top:20px;" method="GET" >
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="col-md-4 xdisplay_inputx form-group has-feedback">
                                        <input type="text" name="filterDate" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <select id="filterSession" name="filterSession" class="form-control">
                                    <option value="">Waktu Kunjungan</option>
                                    <option value="pagi">Waktu Kunjungan Pagi (07.00-11.00)</option>
                                    <option value="sore">Waktu Kunjungan Sore (13.00-21.00)</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <select id="filterDokter" name="filterDokter" class="form-control">
                                    <option value="">Semua Dokter</option>
                                    
                                    <?php
                                    // $connection = mysqli_connect('localhost', 'root', '');
                                    // if (!$connection){
                                    //     die("Database Connection Failed" . mysqli_error($connection));
                                    // }
                                    // $select_db = mysqli_select_db($connection, 'db_mooble');
                                    // if (!$select_db){
                                    //     die("Database Selection Failed" . mysqli_error($connection));
                                    // }
                                    // $result = mysqli_query($connection,"SELECT doctor_id, name  FROM `doctor`");

                                    //$doctor="";
                                    if($doctor){
                                        foreach ($doctor as $filterDokter) {
                                            echo "<option value=" .$filterDokter->id. ">Dokter " .$filterDokter->name. "</option>";
                                        }
                                    }
                                    
                                    ?>
                                    
                                </select>
                            </div> 

                        </fieldset>
                        <br>
                        <div class="col-md-12 col-xs-12">
                            <button class="btn btn-default btn-block" type="submit">Lihat Booking</button>
                        </div>


                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="display: none;">ID booking</th>
                                <th>NIK</th>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Dokter</th>
                                <th>Sesi Checkup</th>
                                <th>Waktu Checkup</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php
                            // $connection = mysqli_connect('localhost', 'root', '');
                            // if (!$connection){
                            //     die("Database Connection Failed" . mysqli_error($connection));
                            // }
                            // $select_db = mysqli_select_db($connection, 'DB_mooble');
                            // if (!$select_db){
                            //     die("Database Selection Failed" . mysqli_error($connection));
                            // }

                            // if(isset($_POST) & !empty($_POST)){
                            //     $date = isset($_POST['filterDate']) ? $_POST['filterDate'] : '';
                            //     $session = isset($_POST['filterSession']) ? $_POST['filterSession'] : '';
                            //     $dokter = isset($_POST['filterDokter']) ? $_POST['filterDokter'] : '';
                            //     $addQuery = "";
                            //     if($session != ""){
                            //         $addQuery = " AND booking.request_appoint_session = '$session'";
                            //     }
                            //     if($dokter != ""){
                            //         $addQuery .= " AND doctor.doctor_id = '$dokter'";
                            //     }
                            //     list($bulan, $tanggal, $tahun) = explode("/", $date);
                            //     $dateString = $tahun. "-" .$bulan. "-" .$tanggal;
                            //     $dateHour = $dateString;
                            //     $result = mysqli_query($connection,"SELECT
                            //                                                           patient.NIK,
                            //                                                           patient.name,
                            //                                                           patient.address,
                            //                                                           patient.phone_number,
                            //                                                           doctor.name,
                            //                                                           booking.appointment_time,
                            //                                                           booking.request_appoint_session,
                            //                                                           booking.status,
                            //                                                           booking.booking_id
                            //                                                         FROM
                            //                                                           (
                            //                                                             (
                            //                                                               `booking`
                            //                                                             INNER JOIN
                            //                                                               patient ON booking.patient_id = patient.patient_id
                            //                                                             )
                            //                                                           INNER JOIN
                            //                                                             doctor ON booking.doctor_id = doctor.doctor_id
                            //                                                           )

                            //                                                           WHERE
                            //                                                           booking.request_appoint_date = '$dateHour' AND booking.status != 'decline' AND booking.status != 'process'" .$addQuery. "
                            //                                                         ORDER BY
                            //                                                           booking.booking_timestamp");


                            // }
                            // else{
                            //     $dateNow = date('Y-m-d');
                            //     $dateHour = $dateNow;
                            //     $result = mysqli_query($connection,"SELECT
                            //                                                           patient.NIK,
                            //                                                           patient.name,
                            //                                                           patient.address,
                            //                                                           patient.phone_number,
                            //                                                           doctor.name,
                            //                                                           booking.appointment_time,
                            //                                                           booking.request_appoint_session,
                            //                                                           booking.status,
                            //                                                           booking.booking_id
                            //                                                         FROM
                            //                                                           (
                            //                                                             (
                            //                                                               `booking`
                            //                                                             INNER JOIN
                            //                                                               patient ON booking.patient_id = patient.patient_id
                            //                                                             )
                            //                                                           INNER JOIN
                            //                                                             doctor ON booking.doctor_id = doctor.doctor_id
                            //                                                           )

                            //                                                           WHERE
                            //                                                           booking.request_appoint_date = '$dateHour' AND booking.status != 'decline' AND booking.status != 'process'
                            //                                                         ORDER BY
                            //                                                           booking.booking_timestamp");

                            // }
                            // $data="";
                            // $resultCount = mysqli_num_rows($result);
                            // if($resultCount != 0){
                            //     $count_row = 1;

                            //     // Fetch one and one row
                            //     while ($row= $result->fetch_row()){
                            //         $data .= "<tr id='row_".$count_row."'>
                            //                             <td id='bookingID' style='display: none;'>" .$row[8]. "</td>
                            //                             <td>" .$row[0]. "</td>
                            //                             <td>" .$row[1]. "</td>
                            //                             <td>" .$row[2]. "</td>
                            //                             <td>" .$row[3]. "</td>
                            //                             <td>" .$row[4]. "</td>
                            //                             <td>" .$row[6]. "</td>
                            //                             <td>" .$row[5]. "</td>
                            //                             <td>" .$row[7]. "</td>
                            //                             <td><input type='checkbox' data-row='row_".$count_row."' name='test' ";
                            //         if($row[7] == 'accept')
                            //         {
                            //             $data .= "class='flat statusBooking'> Pasien Sudah Dilayani
                            //                                 </td>
                            //                             </tr>"; 
                            //         }
                            //         elseif($row[7] == 'finish')
                            //         {
                            //             $data .= "class='flat statusBooking' checked='checked'> Pasien Sudah Dilayani
                            //                                 </td>
                            //                             </tr>"; 
                            //         }
                            //         $count_row ++;
                            //     }

                            //     echo $data;
                            // }
                            // elseif($resultCount == 0){
                            //     echo "<tr><td colspan='9' align='center' style= 'padding: 30px;'><h3 style= 'color:gray;'>Tidak ada booking pada tanggal ini</h3></td></tr>";
                            // }

                            $data="";
                            $resultCount = count($booking);
                            if($resultCount != 0){
                                $count_row = 1;

                                // Fetch one and one row
                                // while ($row= $result->fetch_row()){
                                foreach ($booking as $row) {
                                    $data .= "<tr id='row_".$count_row."'>
                                                        <td id='bookingID' style='display: none;'>" .$row->id. "</td>
                                                        <td>" .$row->patient->NIK. "</td>
                                                        <td>" .$row->patient->name. "</td>
                                                        <td>" .$row->patient->address. "</td>
                                                        <td>" .$row->patient->phone_number. "</td>
                                                        <td>" .$row->doctor->name. "</td>
                                                        <td>" .$row->request_session. "</td>
                                                        <td>" .$row->request_date. "</td>
                                                        <td>" .$row->status. "</td>
                                                        <td><input type='checkbox' data-row='row_".$count_row."' name='test' ";
                                    if($row->status == 'accept')
                                    {
                                        $data .= "class='flat statusBooking'> Pasien Sudah Dilayani
                                                            </td>
                                                        </tr>"; 
                                    }
                                    elseif($row->status == 'finish')
                                    {
                                        $data .= "class='flat statusBooking' checked='checked'> Pasien Sudah Dilayani
                                                            </td>
                                                        </tr>"; 
                                    }
                                    $count_row ++;
                                }

                                echo $data;
                            }
                            elseif($resultCount == 0){
                                echo "<tr><td colspan='9' align='center' style= 'padding: 30px;'><h3 style= 'color:gray;'>Tidak ada booking pada tanggal ini</h3></td></tr>";
                            }

                            ?>

                            <script text="text/javascript">
                                $(document).ready(function(){
                                    $('.statusBooking').on('ifChecked', function(){
                                        var rowID = $(this).attr('data-row');
                                        var booking_id=$(this).closest('#' + rowID).find('#bookingID').text();

                                        $.ajax({
                                            type: "POST",
                                            url: "{{ url('/booking/status') }}",
                                            data: {ID: booking_id, status: "finish", "_token":"{{ csrf_token() }}"},

                                        });

                                        $(document).ajaxStop(function(){
                                            window.location.reload();
                                        });
                                    });

                                    $('.statusBooking').on('ifUnchecked', function(){
                                        var rowID = $(this).attr('data-row');
                                        var booking_id=$(this).closest('#' + rowID).find('#bookingID').text();

                                        $.ajax({
                                            type: "POST",
                                            url: "{{ url('/booking/status') }}",
                                            data: {ID: booking_id, status: "accept", "_token":"{{ csrf_token() }}"},

                                        });

                                        $(document).ajaxStop(function(){
                                            window.location.reload();
                                        });
                                    });
                                });
                            </script>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection