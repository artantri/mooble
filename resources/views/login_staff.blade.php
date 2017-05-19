<!DOCTYPE html>
<html lang="en" style="height: 100%;">
    <head>
        <title>Dokter Login</title>

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

                @if (session()->has('success'))
                    show_stack_bar_bottom('success');      
                @endif

                @if ($errors->has('g-recaptcha-response'))
                    show_stack_bar_bottom('captchaError');      
                @elseif ($errors->has('status'))
                    show_stack_bar_bottom('statusError');      
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
                        case 'captchaError':
                            opts.title = "Oops";
                            opts.text = "Jangan lupa isi captcha dulu";
                            opts.type = "error";
                            break;
                        case 'passError':
                            opts.title = "Oops";
                            opts.text = "Password yang anda masukkan salah";
                            opts.type = "error";
                            break;
                        case 'statusError':
                            opts.title = "Oops";
                            opts.text = "Pendaftaran anda belum disetujui dokter";
                            opts.type = "error";
                            break;
                        case 'success':
                            opts.title = "Registrasi Berhasil";
                            opts.text = "Anda sudah terdaftar sebagai Staff pada MOOBLE, Silahkan tunggu sampai dokter menyetujui pendaftaran anda";
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
                <img src="{{ url('/images/logo_mooble_square.png') }}" style="height:90px;" alt="logo" />

                <h3 class="form-signin-heading font-roboto">Masuk sebagai</h3>
                <div id="person" class="btn-group btn-middle" data-toggle="buttons">
                    <button class="btn btn-choose btn-passive font-roboto" data-toggle-class="btn-succes" data-toggle-passive-class="btn-default" onclick="window.location='{{ url('/login') }}'">
                        Dokter
                    </button>
                    <label class="btn btn-choose btn-active font-roboto" data-toggle-class="btn-success" data-toggle-passive-class="btn-default" >
                        Staff
                    </label>
                </div>
            </div>
            <form method="POST" style="padding-top:10px;" action="{{ url('/staff_login') }}">

                {{ csrf_field() }}
                
                <input type="text" name="username" id="inputUsername" class="form-control font-roboto" placeholder="Username" required> 

                <input type="password" name="password" id="inputPassword" class="form-control font-roboto" placeholder="Password" required>

                <div class="g-recaptcha" data-sitekey="6Lcp4xEUAAAAADmadJTjAa2StrT85u8t2t1cX6EH"></div>

                <button class="btn btn-lg btn-primary btn-block font-roboto" type="submit">MASUK</button>
                <h6><p class ="changeLogReg font-roboto-condensed">Belum Memiliki Akun Staff? <a href="{{ url('/staff_register') }}">Register Disini</a></p></h6>
            </form>
        </div>


        <!-- Bootstrap -->
        <script src="{{ asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>