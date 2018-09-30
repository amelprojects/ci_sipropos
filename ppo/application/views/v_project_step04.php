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
      Pilihan Aktivitas Utama
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
        <h3 class="box-title">Pengingat</h3>
      </div>
      <div class="box-body">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h3><i class="icon fa fa-info"></i></h4>
          <h4>Isi</h2>
          </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- form start -->
    <form action="#" id="form" class="form-horizontal">
      <input type="hidden" value="<?php echo $project['id'];?>" name="id">

       <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Total Masukan Aktivitas Utama</h3>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <div class="form-group">
            <label for="ab_jumlah_training" class="col-sm-8 control-label">Pelatihan</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_training" placeholder="Jumlah Training" value="<?php echo $project['ab_jumlah_training'];?>">
 -->
              <select name="ab_jumlah_training" id="ab_jumlah_training" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_training']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_training']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_training']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_training']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_training']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_training']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_workshop" class="col-sm-8 control-label">Workshop</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_workshop" placeholder="Jumlah Workshop" value="<?php echo $project['ab_jumlah_workshop'];?>">
 -->
              <select name="ab_jumlah_workshop" id="ab_jumlah_workshop" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_workshop']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_workshop']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_workshop']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_workshop']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_workshop']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_workshop']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_study_visit" class="col-sm-8 control-label">Studi Banding</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_study_visit" placeholder="Jumlah Study Visit" value="<?php echo $project['ab_jumlah_study_visit'];?>">
 -->
              <select name="ab_jumlah_study_visit" id="ab_jumlah_study_visit" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_study_visit']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_study_visit']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_study_visit']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_study_visit']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_study_visit']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_study_visit']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_seminar" class="col-sm-8 control-label">Seminar</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_seminar" placeholder="Jumlah Conference / Seminar" value="<?php echo $project['ab_jumlah_seminar'];?>">
 -->              
              <select name="ab_jumlah_seminar" id="ab_jumlah_seminar" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_seminar']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_seminar']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_seminar']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_seminar']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_seminar']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_seminar']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_meeting" class="col-sm-8 control-label">Rapat Publik</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_meeting" placeholder="Jumlah Publicity Meeting" value="<?php echo $project['ab_jumlah_meeting'];?>">
 -->
              <select name="ab_jumlah_meeting" id="ab_jumlah_meeting" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_meeting']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_meeting']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_meeting']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_meeting']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_meeting']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_meeting']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_media" class="col-sm-8 control-label">Persiapan Material Promosi Audio, Video dan Tulis</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_media" placeholder="Jumlah Media" value="<?php echo $project['ab_jumlah_media'];?>">
 -->
               <select name="ab_jumlah_media" id="ab_jumlah_media" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_media']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_media']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_media']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_media']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_media']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_media']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_other_activities" class="col-sm-8 control-label">Aktivitas Lainnya</label>
            <div class="col-sm-4">
<!-- 
              <input type="text" class="form-control" name="ab_jumlah_other_activities" placeholder="Jumlah Other Activities" value="<?php echo $project['ab_jumlah_other_activities'];?>">
 -->
               <select name="ab_jumlah_other_activities" id="ab_jumlah_other_activities" class="form-control">
                <option value="">Pilih</option>
                <option value="0" <?php echo $project['ab_jumlah_other_activities']==0?"selected":""; ?> />0</option>
                <option value="1" <?php echo $project['ab_jumlah_other_activities']==1?"selected":""; ?> />1</option>
                <option value="2" <?php echo $project['ab_jumlah_other_activities']==2?"selected":""; ?> />2</option>
                <option value="3" <?php echo $project['ab_jumlah_other_activities']==3?"selected":""; ?> />3</option>
                <option value="4" <?php echo $project['ab_jumlah_other_activities']==4?"selected":""; ?> />4</option>
                <option value="5" <?php echo $project['ab_jumlah_other_activities']==5?"selected":""; ?> />5</option>
              </select>

            </div>
          </div>
        </div><!-- /.box-body -->

        <div class="modal-footer">
            <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Batal</button>
        </div>


      </div><!-- /.box -->

    </form>

    <div class="box-footer">
      <a href="<?php echo base_url()."project/step03/".$project['id'];?>" title="Ke Step 1"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>

      <?php 
        if ($project['ab_jumlah_training'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step041/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_workshop'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step042/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_study_visit'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step043/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_seminar'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step044/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_meeting'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step045/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_media'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step046/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step047/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php } ?>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

