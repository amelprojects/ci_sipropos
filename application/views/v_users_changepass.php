<?php
/**
 * 
 * User: VF
 * Date: 9/19/2016
 * Time: 8:47 AM
 */

/* data session */
$user_id = $s_all['user_id'];
$user_name = $s_all['user_name'];
$user_email = $s_all['user_email'];
$user_fullname = $s_all['user_fullname'];
$instansi = $s_all['instansi'];
$user_role = $s_all['user_role'];


?>

<div class="container">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ganti Kata Sandi
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active"><a href="#">Ganti Kata Sandi</a></li>
      <!-- <li class="active">Biodata</li> -->
    </ol>
  </section>

  <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Informasi Akun</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Email" readonly="" value="<?php echo $user_fullname; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Password" readonly="" value="<?php echo $user_email; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Kata Pengguna</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Password" readonly="" value="<?php echo $user_name; ?>">
                </div>
              </div>
            </div><!-- /.box-body -->
          </form>
        </div><!-- /.box -->

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Ganti Kata Sandi</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form action="#" id="form" class="form-horizontal">

          <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
          <input type="hidden" name="user_email" value="<?php echo $user_email;?>">

            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">Kata Sandi Lama</label>
                <div class="col-sm-9">
                    <input type="password" name="pass_0" class="form-control" onkeypress="return validateSpace(this);" placeholder="Kata Sandi Lama" value="">
                    <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Kata Sandi Baru</label>
                <div class="col-sm-9">
                    <input type="password" name="pass_1" class="form-control" onkeypress="return validateSpace(this);" placeholder="Kata Sandi Baru" value="">
                    <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Kata Sandi Baru</label>
                <div class="col-sm-9">
                    <input type="password" name="pass_2" class="form-control" onkeypress="return validateSpace(this);" placeholder="Tulis Ulang Kata Sandi Baru" value="">
                    <span class="help-block"></span>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="button" onclick="window.history.back()" class="btn btn-default">Batal</button>
                <button type="button" id="btn_save" onclick="save()" class="btn btn-info">Simpan</button>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->


  </section><!-- /.content -->
</div>