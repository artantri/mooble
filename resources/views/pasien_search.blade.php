@extends('layout.menu_bar')

@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Search Pasien</h3>
        </div>


    </div>

    <div class="clearfix"></div>
    <!--                        <div class="clearfix"></div>-->


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" onclick="change()"><i class="fa fa-chevron-up" >
                            </i> <font size="2"><label id="labelHideShow" style="padding-left:5px;">Sembunyikan Filter</label></font></a>

                        </li>

                    </ul>

                    <form class="form-signin" method="POST">
                        <div class="search_top">
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" name="username"  class="form-control" id="username" placeholder="Cari Bedasarkan Username">
                                <i class="glyphicon glyphicon-search form-control-feedback"></i>
                            </div>

                        </div>
                    </form>


                    <div class="clearfix"></div>
                </div>


                <div class="x_content">

                    <form class="form-signin" method="POST">

                        <div class="search_bottom">
                            <div class="form-group has-feedback">
                                <input type="text" name="telepon"  class="form-control" id="telepon" placeholder="Cari Bedasarkan Nomor Telepon">
                                <i class="glyphicon glyphicon-earphone form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="NIK"  class="form-control" id="NIK" placeholder="Cari Bedasarkan NIK">
                                <i class="glyphicon glyphicon-credit-card form-control-feedback"></i>
                            </div>
                            <div>
                                <label>Jenis Kelamin</label><br>
                                <div class="radioChooser">
                                    <input type="radio" name="gender" value="laki-laki"> Laki-laki<br>
                                    <input type="radio" name="gender" value="perempuan"> Perempuan<br> 

                                </div>
                            </div>
                            <div>
                                <label>Golongan Darah</label><br>
                                <div class="radioChooser">
                                    <input type="radio" name="golDarah" value="O"> O<br>
                                    <input type="radio" name="golDarah" value="A"> A<br> 
                                    <input type="radio" name="golDarah" value="B"> B<br> 
                                    <input type="radio" name="golDarah" value="AB"> AB<br> 
                                    <br> 
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-lg btn-default btn-block" type="submit">Cari Pasien</button>
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
                                <th>ID Pasien</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>User Name</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Golongan Darah</th>
                                <th>Riwayat Kesehatan</th>
                            </tr>
                        </thead>

                        <tbody>

                            <!--                                fungsi untuk menampilkan tabel pasien -->
                            <?php
                            //                                require_once('connect.php');
                            //
                            //                                $username = isset($_POST['username']) ? $_POST['username'] : '';
                            //                                $telepon = isset($_POST['telepon']) ? $_POST['telepon'] : '';
                            //                                $NIK = isset($_POST['NIK']) ? $_POST['NIK'] : '';
                            //
                            //                                $gender = isset($_POST['gender']) ? $_POST['gender'] : '';  
                            //                                $golDarah = isset($_POST['golDarah']) ? $_POST['golDarah'] : '';
                            //                                $coba1= "username = '" .$username. "' OR phone_number = '".$telepon."' OR NIK = '".$NIK. "' OR gender = '" .$gender. "' OR blood_type = '" .$golDarah. "'";
                            //
                            //                                $coba = "";
                            //                                $countOR = 0;
                            //
                            //
                            //                                if($username == "" && $telepon == "" & $NIK == "" & $gender == "" & $golDarah == ""){
                            //                                    $result = mysqli_query($connection,"SELECT NIK, name, username, phone_number, address, gender, blood_type, patient_id FROM `patient` ORDER BY patient_id");}
                            //                                else{
                            //                                    if($username != ""){
                            //                                        if($countOR != 0){
                            //                                            $coba .="AND ";
                            //                                        }
                            //                                        $coba .= "username = '" .$username. "' ";
                            //                                        $countOR ++;
                            //                                    }
                            //                                    if($telepon != ""){
                            //                                        if($countOR != 0){
                            //                                            $coba .="AND ";
                            //                                        }
                            //                                        $coba .= "phone_number = '" .$telepon. "' ";
                            //                                        $countOR ++;
                            //                                    }
                            //                                    if($NIK != ""){
                            //                                        if($countOR != 0){
                            //                                            $coba .="AND ";
                            //                                        }
                            //                                        $coba .= "NIK = '" .$NIK. "' ";
                            //                                        $countOR ++;
                            //                                    }
                            //                                    if($gender != ""){
                            //                                        if($countOR != 0){
                            //                                            $coba .="AND ";
                            //                                        }
                            //                                        $coba .= "gender = '" .$gender. "' ";
                            //                                        $countOR ++;
                            //                                    }
                            //                                    if($golDarah != ""){
                            //                                        if($countOR != 0){
                            //                                            $coba .="AND ";
                            //                                        }
                            //                                        $coba .= "blood_type = '" .$golDarah. "' ";
                            //                                        $countOR ++;
                            //                                    }
                            //
                            //                                    $command = "SELECT NIK, name, username, phone_number, address, gender, blood_type, patient_id FROM `patient` where " .$coba. " ORDER BY patient_id";
                            //                                    $result = mysqli_query($connection, $command);
                            //                                }
                            //
                            //
                                                           $data="";
                                                           if($result){
                                                               $count_row = 1;
                            
                                                               // Fetch one and one row
                            
                                                               while ($row= $result->fetch_row()){
                                                                   $data .= "<tr id='row_".$count_row."'>
                                                                                   <td  id='pasienID'>" .$row[7]. "</td>
                                                                                   <td>" .$row[0]. "</td>
                                                                                   <td>" .$row[1]. "</td>
                                                                                   <td>" .$row[2]. "</td>
                                                                                   <td>" .$row[3]. "</td>
                                                                                   <td>" .$row[4]. "</td>
                                                                                   <td>" .$row[5]. "</td>
                                                                                   <td>" .$row[6]. "</td>
                                                                                   <td><a data-row='row_".$count_row."' class='btn btn-info btn-block pasienProfile'>
                                                                                           <i class='fa fa-archive'></i> Lihat Riwayat
                                                                                       </a>
                                                                                       </td>
                                                                                   </tr>"; 
                            
                            
                                                                   $count_row ++;
                                                               }
                            
                            
                                                               echo $data;
                                                           }

                            ?>

                            <script text="text/javascript">
                                $(document).ready(function(){
                                    $('.pasienProfile').click( function(){
                                        var rowID = $(this).attr('data-row');
                                        var pasien_id=$(this).closest('#' + rowID).find('#pasienID').text();
                                        window.location.href = 'pasienProfile2.php?id=' + pasien_id;
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
