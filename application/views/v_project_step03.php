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
      Project Essentials
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
        <h3 class="box-title">Form</h3>
      </div>

      <!-- form start -->
      <form action="#" id="form">
        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">

          <div class="form-group">
            <label>Overall Objectives</label>
            <textarea class="form-control" name="overall_objective" rows="3" placeholder="Enter ..."><?php echo $project['overall_objective'];?></textarea>
          </div>

          <div class="form-group">
            <label>Project Purpose</label>
            <textarea class="form-control" name="project_purpose" rows="3" placeholder="Enter ..."><?php echo $project['project_purpose'];?></textarea>
          </div>

          <div class="form-group">
            <label>Target Group</label>
            <textarea class="form-control" name="target_group" rows="3" placeholder="Enter ..."><?php echo $project['target_group'];?></textarea>
          </div>

          <div class="form-group">
            <label>Contribution to Multilateral Cooperation</label>
            <textarea class="form-control" name="contribution" rows="3" placeholder="Enter ..."><?php echo $project['contribution'];?></textarea>
          </div>

        </div><!-- /.box-body -->

      </form>

            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Cancel</button>
            </div>

    </div><!-- /.box -->



    <div class="box-footer">
      <a href="<?php echo base_url()."project/step02/".$project['id'];?>" title="Ke Step 2"><button type="button" class="btn btn-default">Prev</button></a>
      <a href="<?php echo base_url()."project/step04/".$project['id'];?>" title="Ke Step 4"><button type="button" class="btn btn-default pull-right">Next</button></a>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->
