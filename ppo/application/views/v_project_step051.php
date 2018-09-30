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
      SDM
      <small>Kualifikasi Umum Pemimpin Proyek Penelitian</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Proyekt</li>
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
              <label class="control-label">Pendidikan</label>
              <input name="education_level" placeholder="Title" class="form-control" type="text" value="<?php echo $project["education_level"]; ?>">
              <span class="help-block"></span>
          </div>
          
          <div class="form-group">
              <label class="control-label">Bidang</label>
              <textarea class="form-control" name="major" rows="3" placeholder="Enter ..."><?php echo $project["education_level"]; ?></textarea>
              <span class="help-block"></span>
          </div>

          <div class="form-group">
              <label class="control-label">Publikasi</label>
              <textarea class="form-control" name="publication" rows="3" placeholder="Enter ..."><?php echo $project["education_level"]; ?></textarea>
              <span class="help-block"></span>
          </div>

          <div class="form-group">
              <label class="control-label">Pengalaman</label>
              <textarea class="form-control" name="experience" rows="3" placeholder="Enter ..."><?php echo $project["education_level"]; ?></textarea>
              <span class="help-block"></span>
          </div>

          <div class="form-group">
              <label class="control-label">Kualifikasi Lainnya</label>
              <textarea class="form-control" name="other_qualification" rows="3" placeholder="Enter ..."><?php echo $project["education_level"]; ?></textarea>
              <span class="help-block"></span>
          </div>

          <div class="form-group">
              <label class="control-label">Kemampuan Bahasa Inggris</label>
              <select name="english_skill" id="english_skill" class="form-control">
                  <option value="">Pilih</option>
                  <option value="1" <?php echo $project['english_skill']==1?"selected":""; ?>/>1 (terendah)</option>
                  <option value="2" <?php echo $project['english_skill']==2?"selected":""; ?>/>2</option>
                  <option value="3" <?php echo $project['english_skill']==3?"selected":""; ?>/>3</option>
                  <option value="4" <?php echo $project['english_skill']==4?"selected":""; ?>/>4</option>
                  <option value="5" <?php echo $project['english_skill']==5?"selected":""; ?>/>5 (tertinggi)</option>
              </select>
              <span class="help-block"></span>
          </div>

        </div><!-- /.box-body -->

      </form>

            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Batal</button>
            </div>

    </div><!-- /.box -->



    <div class="box-footer">
      <a href="<?php echo base_url()."project/step05/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <a href="<?php echo base_url()."project/step06/".$project['id'];?>" title="Ke Step 2"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->
