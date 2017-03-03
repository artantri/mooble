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
        <?php if($errors->has('g-recaptcha-response')){ ?><div class="alert alert-danger" role="alert"}> <?php echo $errors->first('g-recaptcha-response'); ?> </div>
        <?php } ?>

        <!-- @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
        
        <div class="image_container">
            <img src="logoMooble.png" alt="logo" />
        </div>

        <!--        Form input Register-->
        <div class="container">
            <form class="form-signin" method="POST" action="{{ url('/register') }}">
                <h2 class="form-signin-heading">REGISTER</h2>

                {{ csrf_field() }}

                <label for="InputUsername" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus> 

                @if ($errors->has('username'))
                    <strong>{{ $errors->first('username') }}</strong>       
                @endif

                <label for="inputName" class="sr-only">Nama</label>
                <input type="text"  name="name" id="inputName" class="form-control" placeholder="Name" required autofocus>
                
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="text"  name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>

                @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>       
                @endif
                <label for="inputNumberHP" class="sr-only">Nomer HP</label>
                <input type="tel" name="contact" id="inputNumberHP" class="form-control" placeholder="PhoneNumber" required autofocus>

                <label for="inputPassword" class="sr-only">Kata Kunci</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>       
                @endif
                <label for="password-confirm" class="sr-only">Kata Kunci</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">DAFTAR</button>
                <p class ="changeLogReg">Sudah Memiliki Akun? <a href="/login">Log In Disini</a></p>
            </form>
        </div>

    </body>
</html>