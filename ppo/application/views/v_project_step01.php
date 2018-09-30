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
      Informasi Umum
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
      <form action="#" id="form" class="form-horizontal">
        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">

          <div class="form-group">
            <label for="project_title" class="col-sm-2 control-label">Judul Proyek</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_title" placeholder="Judul Proyek" value="<?php echo $project['title'];?>">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="project_title" class="col-sm-2 control-label">Kode Proyek</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_code" value="<?php echo $project['project_code'];?>" readonly>
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="project_type" class="col-sm-2 control-label">Tipe Proyek</label>
            <div class="col-sm-10">
              <select name="project_type" id="project_type" class="form-control">
                <option value="">Pilih Tipe Proyek</option>
                <option value="1" <?php echo $project['type']==1?"selected":""; ?> />Proyek Aktivitas</option>
                <option value="2" <?php echo $project['type']==2?"selected":""; ?> />Proyek Penelitian</option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>
          
          <div class="form-group">
            <label for="cooperation_area" class="col-sm-2 control-label">Area Kerjasama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cooperation_area" placeholder="Cooperation Area" value="<?php echo $project['cooperation_area']==""?"perdagangan":$project['cooperation_area'];?>" readonly>
              <span class="help-block"></span>
            </div>
          </div>
          
          <div class="form-group">
            <label for="relevance" class="col-sm-2 control-label">Relevansi</label>
            <div class="col-sm-10">
<!-- 
              <textarea class="form-control" name="relevance" rows="3" placeholder="Enter ..."><?php echo $project['relevance'];?>
              </textarea>
 -->
              <select name="relevance" id="relevance" class="form-control">
                  <option value=0>Pilih Relevansi</option>
                  <?php foreach($relevance as $list_relevance) { ?>
                      <option value="<?php echo $list_relevance['id']; ?>" <?php echo $project['relevance']==$list_relevance['id']?"selected":""; ?>>- <?php echo $list_relevance['relevance']; ?></option>
                  <?php } ?>
              </select>

              <span class="help-block"></span>
            </div>
          </div>

           <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Penanggung Jawab</h3>
            </div><!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                  <label for="ra_name" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_name" placeholder="Name" value="<?php echo $project['ra_name'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_title" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_title" placeholder="Title" value="<?php echo $project['ra_title'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_address" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_address" placeholder="Address" value="<?php echo $project['ra_address'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_phone" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_phone" placeholder="Phone" value="<?php echo $project['ra_phone'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_fax" class="col-sm-2 control-label">Fax</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_fax" placeholder="Fax" value="<?php echo $project['ra_fax'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="ra_email" placeholder="Email" value="<?php echo $project['ra_email'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div><!-- /.box-body -->
          </div><!-- /.box -->

           <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Personil Kontak</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="cp_name" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_name" placeholder="Name" value="<?php echo $project['cp_name'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_title" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_title" placeholder="Title" value="<?php echo $project['cp_title'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_address" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_address" placeholder="Address" value="<?php echo $project['cp_address'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_phone" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_phone" placeholder="Phone" value="<?php echo $project['cp_phone'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_fax" class="col-sm-2 control-label">Fax</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_fax" placeholder="Fax" value="<?php echo $project['cp_fax'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="cp_email" placeholder="Email" value="<?php echo $project['cp_email'];?>">
                    <span class="help-block"></span>
                  </div>
                </div>
              </div><!-- /.box-body -->
          </div><!-- /.box -->

          <div class="form-group">
            <label for="project_type" class="col-sm-2 control-label">Durasi (bulan)</label>
            <div class="col-sm-10">
              <select name="duration" id="duration" class="form-control">
                <option value="">Pilih Durasi</option>
                <option value="3" <?php echo $project['duration']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['duration']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['duration']==5?"selected":""; ?> />5</option>
                <option value="6" <?php echo $project['duration']==6?"selected":""; ?> />6</option>
                <option value="7" <?php echo $project['duration']==7?"selected":""; ?> />7</option>
              </select>
              <span class="help-block"></span>
            </div>
          </div>

        </div><!-- /.box-body -->

      </form>

            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Batal</button>
            </div>

    </div><!-- /.box -->



    <div class="box-footer">
      <button type="button" onclick="window.history.back();" class="btn btn-default">Halaman Sebelumnya</button>
      <a href="<?php echo base_url()."project/step02/".$project['id'];?>" title="Ke Step 2"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->
