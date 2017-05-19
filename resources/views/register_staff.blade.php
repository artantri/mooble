<!DOCTYPE html>
<html lang="en" style="height: 100%;">
    <head>
        <title>Staff Register</title>

        <link href="{{ asset('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

        <!--        custom css -->
        <link rel="stylesheet" type="text/css" href="{{ url('/css/homestyle.css') }}">

        <!--        font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300|Roboto|Roboto+Condensed" rel="stylesheet">


        <script src='https://www.google.com/recaptcha/api.js'></script>


        <!--        notify -->
        <script src="{{ asset('jquery/jquery-3.1.1.min.js') }}"></script>

        <!-- PNotify -->
        <script type="text/javascript" src="{{ asset('pnotify/pnotify.custom.min.js') }}"></script>
        <link href="{{ asset('pnotify/pnotify.custom.min.css') }}" media="all" rel="stylesheet" type="text/css" />


        <script type="text/javascript">
            $(function(){
                PNotify.prototype.options.styling = "bootstrap3";
                var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
                //show_stack_bar_bottom('passError');
                //"show_stack_bar_bottom('captchaError');

                @if($errors->has('g-recaptcha-response'))
                    show_stack_bar_bottom('captchaError');      
                @elseif (count($errors))
                    show_stack_bar_bottom('validationError');
                @endif

                function show_stack_bar_bottom(type) {
                    var opts = {
                        title: "Over Here",
                        text: "Check me out. I'm in a different stack.",
                        addclass: "stack-bar-bottom",
                        cornerclass: "",
                        width: "30%", 
                        stack: stack_bar_bottom,

                    };
                    switch (type) {
                        case 'normalError':
                            opts.title = "Oops";
                            opts.text = "Ada kesalahan pada pengisian";
                            opts.type = "error";
                            break;
                        case 'captchaError':
                            opts.title = "Oops";
                            opts.text = "Jangan lupa isi captcha dulu";
                            opts.type = "error";
                            break;
                        case 'usernameError':
                            opts.title = "Oops";
                            opts.text = "Username sudah digunakan";
                            opts.type = "error";
                            break;
                        case 'success':
                            opts.title = "Registrasi Berhasil";
                            opts.text = "Anda sudah terdaftar sebagai dokter pada MOOBLE";
                            opts.type = "success";
                            break;
                        case 'validationError':
                            opts.title = "Oops";
                            opts.text = "{{ $errors->first() }}";
                            opts.type = "error";
                            break;
                    }
                    new PNotify(opts);
                }
            });
        </script>

    </head>

    <body> 


        <!--        Form input Register-->
        <div class="container form-signin">
            <div class="image_container">
                <h3 class="form-signin-heading font-roboto">Daftar sebagai</h3>
                <div id="person" class="btn-group btn-middle" data-toggle="buttons">
                    <button class="btn btn-choose btn-passive font-roboto" data-toggle-class="btn-succes" data-toggle-passive-class="btn-default" onclick="window.location='{{ url('/register') }}'">
                        Dokter
                    </button>
                    <label class="btn btn-choose btn-active font-roboto" data-toggle-class="btn-success" data-toggle-passive-class="btn-default" >
                        Staff
                    </label>
                </div>
            </div>
            <form method="POST" style="padding-top:10px;" action="{{ url('/staff_register') }}">

                {{ csrf_field() }}
                <label for="inputUsername" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUsername" class="form-control font-roboto" placeholder="Username" required> 

                <label for="inputName" class="sr-only">Name</label>
                <input type="text" name="name" id="inputName" class="form-control font-roboto" placeholder="Nama" required> 

                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email"  name="email" id="inputEmail" class="form-control font-roboto" placeholder="Email" required>

                <label for="inputContact" class="sr-only">Contact</label>
                <input type="text" name="contact" id="inputContact" class="form-control font-roboto" placeholder="Nomor Telepon" required> 

                <label for="inputPassword" class="sr-only">Kata Kunci</label>
                <input type="password" name="password" id="inputPassword" class="form-control font-roboto" placeholder="Kata Kunci" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>


                <button class="btn btn-lg btn-primary btn-block font-roboto" type="submit">DAFTAR</button>
                <h6><p class ="changeLogReg font-roboto-condensed">Sudah Memiliki Akun? <a href="{{ url('/staff_login') }}">Masuk Disini</a></p></h6>
            </form>
        </div>


        <!-- Bootstrap -->
        <script src="{{ asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>