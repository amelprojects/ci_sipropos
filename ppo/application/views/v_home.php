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

<input type="hidden" name="user_role" value="<?=$user_role;?>">
<input type="hidden" name="user_id" value="<?=$user_id;?>">

<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Proyek
      <small>Buat Proyek</small>
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
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h3><?php echo $info['judul'];?></h4>
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
            <dt>Nama Pengguna : </dt>
            <dd><?php echo $user_name;?></dd>
            <dt>Nama Lengkap : </dt>
            <dd><?php echo $user_fullname;?></dd>
            <dt>Instansi : </dt>
            <dd><?php echo $instansi;?></dd>
          </dl>
        </div>
        <div class="col-md-5">
          <?php if ($user_role==2) { ?>
          <button type="button" onclick="location.href='project'" class="btn btn-lg btn-success">Buat Proyek</button>
        <?php } ?>
        </div>

      </div><!-- /.box-body -->
    </div><!-- /.box -->

        <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Daftar Pengguna</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" href="#" onclick="reload_table()" title="Reload Tabel"><i class="fa fa-refresh"></i></button>
                </div>

              </div><!-- /.box-header -->

              <div class="box-body">

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th>Judul</th>
                          <th>Kode Proyek</th>
                          <th>Tipe</th>
                          <th>Status</th>
                          <th>File</th>
                          <!--
                          <th>Login Terakhir</th>
                          -->
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>

              </div>
            </div>
          </div>    
        </div>


    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Dokumen</h3>
      </div>
      <div class="box-body">
        Dokumen
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
</div><!-- /.container -->


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Komentar</h3>
            </div>
            <div class="modal-body form" id="add_comment">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="" name="project_id"/> 
                    <input type="hidden" value="" name="user_role"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            <input name="title" placeholder="Title" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Komentar</label>
                            <textarea class="form-control" name="comment" rows="3" placeholder="Enter ..."></textarea>
                            <span class="help-block"></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-body">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Komentar</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="v_comment">
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>            
            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save_comment()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
