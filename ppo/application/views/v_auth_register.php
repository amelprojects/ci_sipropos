<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kemendag">
    <meta name="author" content="verafirmansyah@gmail.com">

    <title><?php echo $title; ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/AdminLTE.min.css">

    <!-- PNotify -->
    <link href="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#" onclick="document.location.href='<?php echo base_url(); ?>'"><img src="<?php echo base_url()?>assets/images/logo_kemendag_225x225.jpg" style="width:100px"></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">SIPROPOS Sistem Penyusunan Proposal</p>
        <form action="#" id="form" method="post">

          <div class="form-group has-feedback">
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Kata Pengguna (min. 6 karakter)" value="" onkeypress="return validateSpace(this);">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="user_pass" name="user_pass" class="form-control" placeholder="Kata Sandi" value="">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Alamat Email" value="">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" id="user_fullname" name="user_fullname" class="form-control" placeholder="Nama Lengkap" value="">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" id="instansi" name="instansi" class="form-control" placeholder="Instansi" value="">
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>

          <div class="row">
            <div class="col-xs-4" style="font-size: 18pt;text-align: right;">
              <?=$captcha;?>
            </div>
            <div class="col-xs-3">
              <input class="form-control" type="text" name="captcha_code" id="captcha_code" required="required">
            </div>

            <div class="col-xs-5">
              <button type="button" id="btn_save" onclick="save()" class="btn btn-primary btn-block btn-flat">Daftar</button>
            </div><!-- /.col -->
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12" style="text-align: center;">
              <a href="<?=base_url('auth/forgot')?>" style="font-size: 10pt;">Lupa Sandi</a>
              &nbsp;|&nbsp;
              <a href="<?=base_url('auth')?>" style="font-size: 10pt;">Login</a>
            </div>
          </div>   
          <hr>
        </form>
        <footer>© 2018 | <small>Dit. Perundingan APEC dan Organisasi Internasional</small> Kemendag</footer>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/AdminLTE/bootstrap/js/bootstrap.min.js"></script>

    <!-- PNotify -->
    <script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.nonblock.js"></script>
    
    <script type="text/javascript">    
        
        function save() {
        //alert("hi")
            // var recaptcha_enable = $('#g_recaptcha_enable_login').val();

            // if (recaptcha_enable === '1') {
            //   var response = grecaptcha.getResponse();
            // } else {
            //   var response = "";
            // }

            var username = $('#user_name').val();
            var password = $('#user_pass').val();
            var email = $('#user_email').val();
            var fullname = $('#user_fullname').val();
            var instansi = $('#instansi').val();
            var captcha_code = $('#captcha_code').val();

            if (username === "") {
                new PNotify({title: 'Register Form',text: 'Nama pengguna tidak boleh kosong!', styling: 'bootstrap3'});
                $("#user_name").focus();

            } else if (!isGoodUsername(username)) {
                new PNotify({title: 'Register Form',text: 'Nama pengguna min. 6 karakter dan tidak boleh huruf kapital!', styling: 'bootstrap3'});
                $("#user_name").focus();

            } else if (password === "") {
                new PNotify({title: 'Register Form',text: 'Kata sandi tidak boleh kosong!', styling: 'bootstrap3'});
                $("#user_pass").focus();

            } else if (!isGoodPassword(password)) {
                new PNotify({title: 'Register Form',text: 'Kata sandi min. 6 karakter, 1 kapital dan 1 angka', styling: 'bootstrap3'});
                $("#user_pass").focus();

            } else if (email === "") {
                new PNotify({title: 'Register Form',text: 'Email tidak boleh kosong!', styling: 'bootstrap3'});
                $("#user_email").focus();

            } else if (!isValidEmail(email)) {
                new PNotify({title: 'Register Form',text: 'Email tidak Valid!', styling: 'bootstrap3'});
                $("#user_email").focus();

            } else if (fullname === "") {
                new PNotify({title: 'Register Form',text: 'Nama lengkap tidak boleh kosong!', styling: 'bootstrap3'});
                $("#user_fullname").focus();

            } else if (instansi === "") {
                new PNotify({title: 'Register Form',text: 'Instansi tidak boleh kosong!', styling: 'bootstrap3'});
                $("#instansi").focus();

            } else if (captcha_code === "") {
                new PNotify({title: 'Register Form',text: 'Pastikan anda bukan robot!', styling: 'bootstrap3'});
                $("#captcha_code").focus();

            } else {

                // if(recaptcha_enable === '1' && response.length === 0) {

                //     new PNotify({title: 'Form Login',text: 'Pastikan anda bukan robot!', styling: 'bootstrap3'});

                // } else {

                    $('#btn_save').text('Daftar...'); //change button text
                    $('#btn_save').attr('disabled',true); //set button disable 

                    $.ajax({
                      type:'POST',
                      url:'<?php echo base_url();?>auth/register_action',
                      data: "user_name="+username+"&user_pass="+password+"&user_email="+email+"&user_fullname="+fullname+"&instansi="+instansi+"&captcha_code="+captcha_code,
                      beforeSend:function(msg){
                        new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'}); 
                      },
                      success:function(msg){
                          // alert(msg);
                          PNotify.removeAll();

                          if (msg==99) {
                          //     //alert("Username and password is not valid");
                              new PNotify({title: 'Register Login',text: 'Pastikan anda bukan robot!', styling: 'bootstrap3'});
                              $("#captcha_code").focus();
                              // document.location.reload();
                          } else if (msg==1) {
                          //     //alert("Username and password is not valid");
                              new PNotify({title: 'Register Form',text: 'Kata pengguna telah terdaftar', styling: 'bootstrap3'});
                              $("#user_name").focus();
                              // document.location.reload();
                          } else if (msg==2) {
                              //alert("Username has not been approved");
                              new PNotify({title: 'Register Form',text: 'Email telah terdaftar!', styling: 'bootstrap3'});
                              $("#user_email").focus();
                              // document.location.reload();

                          } else {
                              new PNotify({title: 'Register Form', type: 'success', text: "BERHASIL - Akun akan dimoderasi oleh admin", styling: 'bootstrap3'});
                              // new PNotify({title: 'Form Login',text: 'Diharapkan agar mengganti kata sandi agar mudah diingat!', styling: 'bootstrap3'});
                              window.location.href = "<?php echo base_url();?>home";
                              //window.location.href = "<?php echo $this->agent->referrer();?>";
                          }
                          
                          $('#btn_save').text('Daftar'); //change button text
                          $('#btn_save').attr('disabled',false); //set button disable

                      },
                      error:function(msg){
                        //alert(msg);
                        new PNotify({title: 'Register Form',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
                        $('#btn_save').text('Daftar'); //change button text
                        $('#btn_save').attr('disabled',false); //set button enable
                      }
                    });                            

                // }

            }


        }

        function validateSpace(t){

            if(t.value.match(/\s/g)){

                new PNotify({title: 'Register Form',text: 'Spasi tidak diijinkan', styling: 'bootstrap3'});

                t.value=t.value.replace(/\s/g,'');

            }

        }

        function isGoodUsername(username) {
            var pattern = new RegExp(/([a-z]).{5,20}$/i);
            return pattern.test(username);
        }

        function showPass() {
            var x = document.getElementById("user_pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function isValidEmail(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }

        function isGoodPassword(password) {
            var pattern = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/i);
            return pattern.test(password);
        }
    </script>
    
  </body>
</html>
