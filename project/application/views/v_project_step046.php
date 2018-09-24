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
      Main Activities
      <small>Preparation audio, visual, and written promotional materials</small>
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
        <small>Please Specify at least <?php echo $project['ab_jumlah_media']; ?> promotional material</small>
      </div>

        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">


          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th>Add Promotional Material
                  <?php if (count($media)<$project['ab_jumlah_media']) { ?> 
                  <button class="btn btn-box-tool" href="#" onclick="add_media('<?php echo $project['id'];?>')" title="Tambah Promotional Material"><i class="fa fa-plus"></i></button>
                  <?php } ?>
                </th>
                <th>Title</th>
                <th>Description</th>
                <th>Promotional Materials</th>
                <th>Target Group</th>
                <th>Duration (days)</th>
              </tr>
              <?php foreach($media as $list_media) { ?>
              <tr>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_media('<?php echo $list_media['id'];?>')"><i class="glyphicon glyphicon-edit"></i></a> Edit
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_media('<?php echo $list_media['id'];?>')"><i class="glyphicon glyphicon-trash"></i></a> Hapus
                </td>
                <td><?php echo $list_media['title']; ?></td>
                <td><?php echo $list_media['description']; ?></td>
                <td><?php echo $list_media['promotional']; ?></td>
                <td><?php echo $list_media['target_group']; ?></td>
                <td><?php echo $list_media['duration']; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box-body -->

    </div><!-- /.box -->



    <div class="box-footer">
      <?php         
        if ($project['ab_jumlah_meeting'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step045/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else if ($project['ab_jumlah_seminar'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step044/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else if ($project['ab_jumlah_study_visit'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step043/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else if ($project['ab_jumlah_workshop'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step042/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else if ($project['ab_jumlah_training'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step041/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step04/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php } ?>

      <?php         
        if ($project['ab_jumlah_other_activities'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step047/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step05/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php } ?>

    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Publicity Meeting</h3>
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

                        <div class="form-group">
                            <label class="control-label">Promotional materials that will be produced</label>
                            <input name="promotional" placeholder="Promotional Material" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Potential Producers of Promotional Materials</label>
                            <input name="potential" placeholder="Potential" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Target Group</label>
                            <input name="target_group" placeholder="Target Group" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Ways and means of disseminating Promotional Material</label>
                            <input name="ways_mean" placeholder="Ways and mean" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Duration of Dissemination</label>
                            <input name="duration" placeholder="Duration of the training" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Indicate budget for Promotional Material</label>
                            <input name="budget" placeholder="budget" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

