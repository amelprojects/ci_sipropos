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
      Basic Information
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
      <form action="#" id="form" class="form-horizontal">
        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">

          <div class="form-group">
            <label for="project_title" class="col-sm-2 control-label">Project Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="project_title" placeholder="Project Title" value="<?php echo $project['title'];?>">
              <span class="help-block"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="project_type" class="col-sm-2 control-label">Project Type</label>
            <div class="col-sm-10">
              <select name="project_type" id="project_type" class="form-control">
                <option value="">Pilih Tipe Project</option>
                <option value="1" <?php echo $project['type']==1?"selected":""; ?> />Activity Based Project</option>
                <option value="2" <?php echo $project['type']==2?"selected":""; ?> />Research Project</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="cooperation_area" class="col-sm-2 control-label">Cooperation Area</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cooperation_area" placeholder="Cooperation Area">
            </div>
          </div>
          
          <div class="form-group">
            <label for="relevance" class="col-sm-2 control-label">Relevance</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="relevance" rows="3" placeholder="Enter ..."></textarea>
            </div>
          </div>

           <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Responsible Authority</h3>
            </div><!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
                <div class="form-group">
                  <label for="ra_name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_title" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_address" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_address" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_phone" placeholder="Phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_fax" class="col-sm-2 control-label">Fax</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_fax" placeholder="Fax">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="ra_email" placeholder="Email">
                  </div>
                </div>
              </div><!-- /.box-body -->
          </div><!-- /.box -->

           <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Contact Person</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="cp_name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_name" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ra_title" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ra_title" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_address" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_address" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_phone" placeholder="Phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_fax" class="col-sm-2 control-label">Fax</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp_fax" placeholder="Fax">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cp_email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="cp_email" placeholder="Email">
                  </div>
                </div>
              </div><!-- /.box-body -->
          </div><!-- /.box -->

        </div><!-- /.box-body -->

      </form>

            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Cancel</button>
            </div>

    </div><!-- /.box -->



    <div class="box-footer">
      <button type="button" class="btn btn-default">Prev</button>
      <button type="button" class="btn btn-default pull-right">Next</button>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->
