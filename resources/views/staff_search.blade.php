@extends('layout.menu_bar')

@section('content')

<div class="">
    <div class="page-title">
    </div>

    <div class="clearfix"></div>

     <div class="row">

                            <!--Search menu-->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="fa fa-search"></i> Cari Staff</h2>

                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link" onclick="change()"><i class="fa fa-chevron-up" >
                                                </i> <font size="2"><label id="labelHideShow" style="padding-left:5px;">Sembunyikan Filter</label></font></a>

                                            </li>

                                        </ul>


                                        <div class="clearfix"></div>
                                    </div>


                                    <div class="x_content">

                                        <form class="form-signin" method="POST">

                                            <div class="search_bottom" style="margin-bottom:20px;">
                                                <div class="form-group has-feedback">
                                                    <input type="text" name="nama"  class="form-control" id="nama" placeholder="Cari Bedasarkan Nama Staff">
                                                    <i class="glyphicon glyphicon-user form-control-feedback"></i>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <input type="text" name="idStaff"  class="form-control" id="idStaff" placeholder="Cari Bedasarkan Nomor ID Staff">
                                                    <i class="glyphicon glyphicon-credit-card form-control-feedback"></i>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <input type="text" name="telepon"  class="form-control" id="telepon" placeholder="Cari Bedasarkan Nomor Telepon">
                                                    <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                                                </div>

                                                <div>
                                                    <label>Status Staff</label><br>
                                                    <div class="radioChooser">
                                                        <input type="radio" name="status" value="aktif"> Sudah Registrasi<br>
                                                        <input type="radio" name="status" value="belum aktif"> Belum Registrasi<br> 
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-lg btn-default btn-block" type="submit">Filter</button>
                                        </form>






                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>



                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID Staff</th>
                                                    <th>Nama</th>
                                                    <th>No. Telepon</th>
                                                    <th width='150'>Status</th>
                                                    <th width='170'>Edit</th>
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

                                                // $staffName = isset($_POST['nama']) ? $_POST['nama'] : '';
                                                // $stafftelepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
                                                // $staffID = isset($_POST['idStaff']) ? $_POST['idStaff'] : '';
                                                // $staffStatus = isset($_POST['status']) ? $_POST['status'] : '';  

                                                // $coba = "";
                                                // $countOR = 0;


                                                // if($staffName == "" && $stafftelepon == "" && $staffID == "" && $staffStatus == ""){
                                                //     $result = mysqli_query($connection,"SELECT staff_id, name, username, contact, status FROM `staff` ORDER BY staff_id");
                                                // }
                                                // else{
                                                //     if($staffName != ""){
                                                //         if($countOR != 0){
                                                //             $coba .="AND ";
                                                //         }
                                                //         $coba .= "name = '" .$staffName. "' ";
                                                //         $countOR ++;
                                                //     }
                                                //     if($stafftelepon != ""){
                                                //         if($countOR != 0){
                                                //             $coba .="AND ";
                                                //         }
                                                //         $coba .= "contact = '" .$stafftelepon. "' ";
                                                //         $countOR ++;
                                                //     }
                                                //     if($staffID != ""){
                                                //         if($countOR != 0){
                                                //             $coba .="AND ";
                                                //         }
                                                //         $coba .= "staff_id = '" .$staffID. "' ";
                                                //         $countOR ++;
                                                //     }
                                                //     if($staffStatus != ""){
                                                //         if($countOR != 0){
                                                //             $coba .="AND ";
                                                //         }
                                                //         echo $staffStatus;
                                                //         if($staffStatus == "aktif"){
                                                //             $coba .= "username IS NOT NULL ";
                                                //         }
                                                //         elseif($staffStatus == "belum aktif"){
                                                //             $coba .= "username IS NULL ";
                                                //         }

                                                //         $countOR ++;
                                                //     }


                                                //     $command = "SELECT staff_id, name, username, contact, status FROM `staff` where " .$coba. " ORDER BY staff_id";
                                                //     $result = mysqli_query($connection, $command);
                                                // }


                                                // $data="";
                                                // if($result){
                                                //     $count_row = 1;

                                                //     // Fetch one and one row
                                                //     while ($row= $result->fetch_row()){

                                                //         if($row[4] == 0){
                                                //             $statusStaff = "<a type='button' class='btn btn-round btn-danger btn-xs' style='width:120px; color:white;'>Belum Registrasi</a>";
                                                //             $statusButton ="<i class='glyphicon glyphicon-ok-sign'></i> Daftarkan";

                                                //         }
                                                //         elseif($row[4] == 1){
                                                //             $statusStaff = "<a type='button' class='btn btn-round btn-success btn-xs' style='width:120px; color:white;'>Sudah Registrasi</a>";
                                                //             $statusButton ="<i class='glyphicon glyphicon-remove-sign'></i> Batalkan";
                                                //         }
                                                //         $data .= "<tr id='row_".$count_row."'>
                                                //         <td id='staffID'>" .$row[0]. "</td>
                                                //         <td id='staffName'>" .$row[1]. "</td>
                                                //         <td>" .$row[3]. "</td>
                                                //         <td id='staffStatus'>" .$statusStaff. "</td>
                                                //         <td>
                                                //             <a data-row='row_".$count_row."' class='btn btn-app deleteStaff'>
                                                //                 <i class='fa fa-trash'></i> Hapus
                                                //             </a>
                                                //             <a data-row='row_".$count_row."' class='btn btn-app statusStaff'>
                                                //                 ".$statusButton."
                                                //             </a>

                                                //         </td>
                                                //         </tr>";
                                                //         $count_row ++;

                                                //     }
                                                //     echo $data;
                                                // }

                                                ?>

                                               


                                                <script text="text/javascript">
                                                    $(document).ready(function(){
                                                        $('.deleteStaff').click( function(){
                                                            var rowID = $(this).attr('data-row');
                                                            var Staff_id=$(this).closest('#' + rowID).find('#staffID').text();
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "{{ url('/conncect/deleteStaff.php') }}",
                                                                data: {ID: Staff_id, con: "delete"},

                                                            });

                                                            $(document).ajaxStop(function(){
                                                                window.location.reload();
                                                            });
                                                        });
//                                                        
                                                        $('.statusStaff').click( function(){
                                                            var rowID = $(this).attr('data-row');
                                                            var Staff_id=$(this).closest('#' + rowID).find('#staffID').text();
                                                            var Staff_status=$(this).closest('#' + rowID).find('#staffStatus').text();
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "{{ url('/conncect/deleteStaff.php') }}",
                                                                data: {ID: Staff_id, con: "edit", Status: Staff_status },

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

<!-- /page content -->
