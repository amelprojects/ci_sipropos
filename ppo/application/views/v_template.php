<?php

/* data session */
$user_id = $s_all['user_id'];
$user_name = $s_all['user_name'];
$user_fullname = $s_all['user_fullname'];
$user_email = $s_all['user_email'];
$instansi = $s_all['instansi'];
$user_last_login = $s_all['user_last_login'];
$user_last_activity = $s_all['user_last_activity'];
$user_date_created = $s_all['user_date_created'];
$user_role = $s_all['user_role'];
$user_role_name = $this->vf->getFieldById('role_name', 'roles', 'id', $s_all['user_role']);


?>

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
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.css'); ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/AdminLTE.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist/css/skins/_all-skins.min.css'); ?>">
    
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
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-green layout-top-nav">
    <div class="wrapper" style="background-color: #fff">
<!-- 
      <div class="container" style="background-color: #fff">
      <img src="<?php echo base_url(); ?>assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
 -->
      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="<?php echo base_url(); ?>home" class="navbar-brand"><b>SIPROPOS</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>home"><i class="fa fa-clipboard"></i>&nbsp;Home</a></li>
                <li><a href="<?php echo base_url(); ?>users/changepassword"><i class="fa fa-exchange"></i> Ganti Kata Sandi</a></li>

                <?php if ($user_role == -1) { ?> 
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Panel <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url(); ?>users"><i class="fa fa-users"></i> Daftar User</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>info"><i class="fa fa-info-circle"></i> Daftar Informasi</a></li>
                  </ul>
                </li>

                <?php } ?>

              </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li><a href="#"><i class="fa fa-question-circle"></i>&nbsp;Tutorial 1</a></li>
                <li><a href="<?php echo base_url();?>auth/logout">Keluar&nbsp;<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">

        <?php  if($isi){ $this->load->view($isi); } ?>

      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
          </div>
          <strong>Copyright &copy; 2018 .</strong> VF & AR.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/AdminLTE/plugins/jQueryUI/jquery-ui.min.js'); ?>"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/AdminLTE/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- PNotify -->
    <script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/AdminLTE/plugins/fastclick/fastclick.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE/dist/js/app.min.js'); ?>"></script>    
  
    <!-- ============================================================================================================ -->

    <?php  if($js_footer){ $this->load->view($js_footer); } ?>

    <script>
        //ul sidebar-menu 
        //-li treeview
        //--ul treeview-menu
        $(document).ready(function () {
            var url = window.location;
            // Will only work if string in href matches with location
            $('ul.treeview-menu a[href="' + url + '"]').parent().addClass('active');

            // Will also work for relative and absolute hrefs
            $('ul.treeview-menu a').filter(function () {
                return this.href == url;
            }).parent().addClass('active').parent().parent().addClass('active');
        });

    </script>    


  </body>
</html>
