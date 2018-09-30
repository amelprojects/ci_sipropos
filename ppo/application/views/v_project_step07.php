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

<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Finalisasi
      <small>Buat Proyek</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Proyek</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
      </div>

      <!-- form start -->
      <form action="#" id="form">
        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">

          <div class="form-group">

            <div class="col-lg-3 col-xs-6">
              &nbsp;
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>&nbsp;</h3>
                  <p>&nbsp;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-done-all"></i>
                </div>
                <a href="<?php echo base_url()."project/review/".$project['id'];?>" class="small-box-footer">Kaji Ulang Proyek <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>&nbsp;</h3>
                  <p>&nbsp;</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-upload"></i>
                </div>
                <!-- 
                <a href="<?php echo base_url()."project/stepfinal/".$project['id'];?>" class="small-box-footer">Submit Project <i class="fa fa-arrow-circle-right"></i></a>
                 -->
                <a href="#" onclick="submit('<?php echo $project['id'];?>')" class="small-box-footer">Masukan Proyek<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              &nbsp;
            </div><!-- ./col -->

          </div>

        </div><!-- /.box-body -->

      </form>

    </div><!-- /.box -->


    <div class="box-footer">
      <a href="<?php echo base_url()."project/step06/".$project['id'];?>" title="Ke Step 4"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>

    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->
