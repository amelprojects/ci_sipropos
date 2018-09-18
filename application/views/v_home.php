<?php

/* data session */
$user_id = $s_all['user_id'];
$user_name = $s_all['user_name'];
$user_fullname = $s_all['user_fullname'];
$user_email = $s_all['user_email'];
$user_last_login = $s_all['user_last_login'];
$user_last_activity = $s_all['user_last_activity'];
$user_date_created = $s_all['user_date_created'];
$user_role = $s_all['user_role'];
$user_role_name = $this->vf->getFieldById('role_name', 'roles', 'id', $s_all['user_role']);

?>

<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Projects
      <small>Create Project</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
<!-- 
      <li><a href="#">Layout</a></li>
      <li class="active">Top Navigation</li>
 -->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi</h3>
      </div>
      <div class="box-body">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h3><i class="icon fa fa-info"></i> <?php echo $info['judul'];?></h4>
          <h4><?php echo $info['isi']; ?></h2>
          <small><?php echo tgl_indo_time($info['date_created']); ?></small>
          </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Selamat Datang</h3>
      </div>
      <div class="box-body">
        
        <div class="col-md-7">
          <dl class="dl-horizontal">
            <dt>Username : </dt>
            <dd><?php echo $user_name;?></dd>
            <dt>Nama Lengkap : </dt>
            <dd><?php echo $user_fullname;?></dd>
          </dl>
        </div>
        <div class="col-md-5">
          <?php if ($user_role==2) { ?>
          <button type="button" onclick="location.href='project'" class="btn btn-lg btn-primary">Membuat Projects</button>
        <?php } ?>
        </div>

      </div><!-- /.box-body -->
    </div><!-- /.box -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Projects</h3>
      </div>
      <div class="box-body">
        The great content goes here
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Dokumentasi</h3>
      </div>
      <div class="box-body">
        The great content goes here
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
</div><!-- /.container -->
