<?php
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    //Mengecek Kondisi Captcha Sudah terisi atau Belum
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $secret = '6Lcp4xEUAAAAAJeXgSE7-lGRxuJ6VNKp9Wld8cVE';
    $response = file_get_contents($url. '?secret=' .$secret. '&response=' .$_POST['g-recaptcha-response']. '&remoteip=' .$_SERVER['REMOTE_ADDR']);
    $data = json_decode($response);

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $numberHP = $_POST['numberHP'];

    //Untuk Mengecek supaya tidak ada UserName Yang Sama 
    $identical ="SELECT * FROM `pasien` where username = '$username'";
    $checkidentical = mysqli_query($connection, $identical);
    $count = mysqli_num_rows($checkidentical);


    if($count > 0){
        $fmsg = "Error! Username itu sudah digunakan";
    } else{
        //Untuk Mengecek Apakah Captcha Sudah Terisi, Jika sudah maka akan dimasukkan ke database
        if($data->success == true){
            $sql ="INSERT INTO `Pasien` (username, password, numberHP, name) VALUES ('$username', '$password', '$numberHP', '$name')";
            $result = mysqli_query($connection, $sql);

            //Jika sudah berhasil masuk ke database, akan pindah ke page Log In
            if($result){
                header("Location: login.php");
                exit();
            } else{
                $fmsg = "Error! Ada kesalahan pada pengisian";
            }
        } else{
            $fmsg = "Error! Captcha belum terisi";
        }
    }
}
?>




<!DOCTYPE html>
<html>
    <head>
        <title> USER REG</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

        <link rel="stylesheet" type="text/css" href="style.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Open+Sans">
    </head>

    <body> 
        <!--        Message untuk Alert dan Success Login atau Register-->
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"}> <?php echo $smsg; ?> </div>
        <?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"}> <?php echo $fmsg; ?> </div>
        <?php } ?>

        <div class="image_container">
            <img src="logoMooble.png" alt="logo" />
        </div>

        <!--        Form input Register-->
        <div class="container">
            <form class="form-signin" method="POST">
                <h2 class="form-signin-heading">REGISTER</h2>

                <label for="InputUsername" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required> 

                <label for="inputName" class="sr-only">Nama</label>
                <input type="text"  name="name" id="inputName" class="form-control" placeholder="Name" required autofocus>

                <label for="inputNumberHP" class="sr-only">Nomer HP</label>
                <input type="tel" name="numberHP" id="inputNumberHP" class="form-control" placeholder="NumberHP" required autofocus>

                <label for="inputPassword" class="sr-only">Kata Kunci</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">DAFTAR</button>
                <p class ="changeLogReg">Sudah Memiliki Akun? <a href="login.php">Log In Disini</a></p>
            </form>
        </div>

    </body>
</html>