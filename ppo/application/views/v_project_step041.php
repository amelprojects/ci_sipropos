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
      Aktivitas Utama
      <small>Pelatihan</small>
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
        <small>Pilih Minimal 2 Negara Mitra<?php echo $project['ab_jumlah_training']; ?>Pelatihan</small>
      </div>

        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">


          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th>Tambah Pelatihan
                  <?php if (count($training)<$project['ab_jumlah_training']) { ?> 
                  <button class="btn btn-box-tool" href="#" onclick="add_training('<?php echo $project['id'];?>')" title="Tambah Training"><i class="fa fa-plus"></i></button>
                  <?php } ?>
                </th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Negara Partisipan</th>
                <th>Lokasi</th>
                <th>Durasi (hari)</th>
              </tr>
              <?php foreach($training as $list_training) { ?>
              <tr>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_training('<?php echo $list_training['id'];?>')"><i class="glyphicon glyphicon-edit"></i></a> Edit
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_training('<?php echo $list_training['id'];?>')"><i class="glyphicon glyphicon-trash"></i></a> Hapus
                </td>
                <td><?php echo $list_training['title']; ?></td>
                <td><?php echo $list_training['description']; ?></td>
                <td><?php echo $list_training['countries']; ?></td>
                <td><?php echo $list_training['location']; ?></td>
                <td><?php echo $list_training['duration']; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box-body -->

    </div><!-- /.box -->



    <div class="box-footer">
      <a href="<?php echo base_url()."project/step04/".$project['id'];?>" title="Ke Step 1"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php 
        if ($project['ab_jumlah_workshop'] > 0) {
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
        } else if ($project['ab_jumlah_other_activities'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step047/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step048/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>
      <?php } ?>

    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Pelatihan</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="<?php echo $project['id'];?>" name="project_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Judul Aktivitas</label>
                            <input name="title" placeholder="Judul Aktivitas" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Deskripsi Aktivitas</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Deskripsi Aktivitas"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Negara Partisipan</label>
                            <input name="countries" placeholder="Negara Partisipan" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jumlah Partisipan tiap Negara Mitra</label>
                            <input name="participant" placeholder="Jumlah Partisipan tiap Negara Mitra" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jumlah Total Partisipan</label>
                            <input name="participant_total" placeholder="Jumlah Total Partisipan" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jumlah Pelatih</label>
                            <input name="trainer" placeholder="Jumlah Pelatih" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Durasi Pelatihan (hari)</label>
                            <input name="duration" placeholder="Durasi Pelatihan (hari)" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Lokasi Pelatihan</label>
                            <input name="location" placeholder="Lokasi Pelatihan" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jumlah Hari Menginap</label>
                            <input name="days" placeholder="Jumlah Hari Menginap" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Jumlah Tiket Pesawat (PP)</label>
                            <input name="ticket" placeholder="Jumlah Tiket Pesawat (PP)" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Keterangan Tambahan</label>
                            <input name="detail" placeholder="Keterangan Tambahan" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Budget ($)</label>
                            <input name="budget" placeholder="Budget" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

