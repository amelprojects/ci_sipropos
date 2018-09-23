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
      Selection of Main Activities
      <small>Create Project</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Project</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Reminder</h3>
      </div>
      <div class="box-body">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h3><i class="icon fa fa-info"></i></h4>
          <h4>isinya</h2>
          </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- form start -->
    <form action="#" id="form" class="form-horizontal">
      <input type="hidden" value="<?php echo $project['id'];?>" name="id">

       <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Input Total per Main Activities</h3>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <div class="form-group">
            <label for="ab_jumlah_training" class="col-sm-8 control-label">Training</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_training" placeholder="Jumlah Training" value="<?php echo $project['ab_jumlah_training'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_workshop" class="col-sm-8 control-label">Workshop</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_workshop" placeholder="Jumlah Workshop" value="<?php echo $project['ab_jumlah_workshop'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_study_visit" class="col-sm-8 control-label">Study Visit</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_study_visit" placeholder="Jumlah Study Visit" value="<?php echo $project['ab_jumlah_study_visit'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_seminar" class="col-sm-8 control-label">Conference / Seminar</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_seminar" placeholder="Jumlah Conference / Seminar" value="<?php echo $project['ab_jumlah_seminar'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_meeting" class="col-sm-8 control-label">Publicity Meeting</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_meeting" placeholder="Jumlah Publicity Meeting" value="<?php echo $project['ab_jumlah_meeting'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_media" class="col-sm-8 control-label">Preparation of audio, visual and written promotional materials</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_media" placeholder="Jumlah Media" value="<?php echo $project['ab_jumlah_media'];?>">
            </div>
          </div>
          <div class="form-group">
            <label for="ab_jumlah_other_activities" class="col-sm-8 control-label">Other Activities</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="ab_jumlah_other_activities" placeholder="Jumlah Other Activities" value="<?php echo $project['ab_jumlah_other_activities'];?>">
            </div>
          </div>
        </div><!-- /.box-body -->

        <div class="modal-footer">
            <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Cancel</button>
        </div>


      </div><!-- /.box -->

    </form>

    <div class="box-footer">
      <a href="<?php echo base_url()."project/step03/".$project['id'];?>" title="Ke Step 1"><button type="button" class="btn btn-default">Prev</button></a>

      <?php 
        if ($project['ab_jumlah_training'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step041/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_workshop'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step042/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_study_visit'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step043/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_seminar'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step044/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_meeting'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step045/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_media'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step046/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step047/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php } ?>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

