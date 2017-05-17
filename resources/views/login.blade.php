
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
        <?php if($errors->has('username')){ ?><div class="alert alert-danger" role="alert"}> <?php echo $errors->first('username'); ?> </div>
        <?php } ?>
        <?php if($errors->has('g-recaptcha-response')){ ?><div class="alert alert-danger" role="alert"}> <?php echo $errors->first('g-recaptcha-response'); ?> </div>
        <?php } ?>


        <div class="image_container">
            <img src="logoMooble.png" alt="logo" />
        </div>

        <!--        Form input Register-->
        <div class="container">
            <form class="form-signin" method="POST" action="{{ url('/login') }}">
                <h2 class="form-signin-heading">LOG IN</h2>

                {{ csrf_field() }}

                <!-- <label for="InputUsername" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required> 

                <label for="inputPassword" class="sr-only">Kata Kunci</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">MASUK</button>
                <p class ="changeLogReg">Belum Memiliki Akun? <a href="/register">Register Disini</a></p> -->

                <label for="InputUsername" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUsername" class="form-control font-roboto" placeholder="Username" required> 

                <label for="inputPassword" class="sr-only">Kata Kunci</label>
                <input type="password" name="password" id="inputPassword" class="form-control font-roboto" placeholder="Password" style="margin-top:10px;" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>

                <button class="btn btn-lg btn-primary btn-block font-roboto" style="margin-top:30px;" type="submit">MASUK</button>
                <h6><p class ="changeLogReg font-roboto-condensed">Belum Memiliki Akun? <a href="register.php">Register Disini</a></p></h6>
            </form>
        </div>

        <!--        Form input staff-->
        <!-- <div class="container">
            <form class="form-signin" method="POST" action="{{ url('/stafflogin') }}">
                <h2 class="form-signin-heading">LOG IN</h2>

                {{ csrf_field() }}

                <label for="InputUsername" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required> 

                <label for="inputPassword" class="sr-only">Kata Kunci</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">MASUK</button>
                <p class ="changeLogReg">Belum Memiliki Akun? <a href="/register">Register Disini</a></p>
            </form>
        </div> -->

    </body>
</html>