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
      <small>Aktivitas Lainnya</small>
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
        <small>Pilih Minimal 2 Negara Mitra<?php echo $project['ab_jumlah_media']; ?>Aktivitas Lainnya</small>
      </div>

        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">


          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th>Tambah Aktivitas Lainnya
                  <?php if (count($other)<$project['ab_jumlah_other_activities']) { ?> 
                  <button class="btn btn-box-tool" href="#" onclick="add_other('<?php echo $project['id'];?>')" title="Tambah Other Activities"><i class="fa fa-plus"></i></button>
                  <?php } ?>
                </th>
                <th>Judul</th>
                <th>Desckripsi</th>
              </tr>
              <?php foreach($other as $list_other) { ?>
              <tr>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_other('<?php echo $list_other['id'];?>')"><i class="glyphicon glyphicon-edit"></i></a> Edit
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_other('<?php echo $list_other['id'];?>')"><i class="glyphicon glyphicon-trash"></i></a> Hapus
                </td>
                <td><?php echo $list_other['title']; ?></td>
                <td><?php echo $list_other['description']; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box-body -->

    </div><!-- /.box -->



    <div class="box-footer">
      <?php         
        if ($project['ab_jumlah_media'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step046/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_meeting'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step045/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_seminar'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step044/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_study_visit'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step043/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_workshop'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step042/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php         
        } else if ($project['ab_jumlah_training'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step041/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step04/".$project['id'];?>"><button type="button" class="btn btn-default">Halaman Sebelumnya</button></a>
      <?php } ?>

      <a href="<?php echo base_url()."project/step048/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Halaman Selanjutnya</button></a>

    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Aktivitas Lainnya</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="<?php echo $project['id'];?>" name="project_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Activity Title</label>
                            <input name="title" placeholder="Title" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Activity Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
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

