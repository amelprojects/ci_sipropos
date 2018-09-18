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

    <div class="box box-default">
      <div class="box-header with-border">
        <small></small>
      </div>

        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">


          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th class="pull-right">Main Activities</th>
                <th style="width: 5px">Jumlah</th>
                <th>Action</th>
              </tr>
              <tr>
                <td class="pull-right">Training</td>
                <td>0</td>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partner('')"><i class="glyphicon glyphicon-plus"></i></a> Add
                  <a class="btn btn-xs btn-default" href="javascript:void(0)" title="Hapus" onclick="delete_partner('')"><i class="glyphicon glyphicon-eye-open"></i></a> View
                </td>
              </tr>
              <tr>
                <td class="pull-right">Workshop</td>
                <td>0</td>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partner('')"><i class="glyphicon glyphicon-plus"></i></a> Add
                  <a class="btn btn-xs btn-default" href="javascript:void(0)" title="Hapus" onclick="delete_partner('')"><i class="glyphicon glyphicon-eye-open"></i></a> View
                </td>
              </tr>
              <tr>
                <td class="pull-right">Study Visit</td>
                <td>0</td>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partner('')"><i class="glyphicon glyphicon-plus"></i></a> Add
                  <a class="btn btn-xs btn-default" href="javascript:void(0)" title="Hapus" onclick="delete_partner('')"><i class="glyphicon glyphicon-eye-open"></i></a> View
                </td>
              </tr>
              <tr>
                <td class="pull-right">Conference / Seminar</td>
                <td>0</td>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partner('')"><i class="glyphicon glyphicon-plus"></i></a> Add
                  <a class="btn btn-xs btn-default" href="javascript:void(0)" title="Hapus" onclick="delete_partner('')"><i class="glyphicon glyphicon-eye-open"></i></a> View
                </td>
              </tr>
              <tr>
                <td class="pull-right">Publicity Meeting</td>
                <td>0</td>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partner('')"><i class="glyphicon glyphicon-plus"></i></a> Add
                  <a class="btn btn-xs btn-default" href="javascript:void(0)" title="Hapus" onclick="delete_partner('')"><i class="glyphicon glyphicon-eye-open"></i></a> View
                </td>
              </tr>
              <tr>
                <td class="pull-right">Preparation of audio, visual and written promotional materials</td>
                <td>0</td>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partner('')"><i class="glyphicon glyphicon-plus"></i></a> Add
                  <a class="btn btn-xs btn-default" href="javascript:void(0)" title="Hapus" onclick="delete_partner('')"><i class="glyphicon glyphicon-eye-open"></i></a> View
                </td>
              </tr>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box-body -->

    </div><!-- /.box -->



    <div class="box-footer">
      <a href="<?php echo base_url()."project/step01/".$project['id'];?>" title="Ke Step 1"><button type="button" class="btn btn-default">Prev</button></a>
      <a href="<?php echo base_url()."project/step03/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Partners</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="" name="project_id"/> 
                    <div class="form-body">
                        <div class="form-group" id="country">
                            <label class="control-label col-md-3">Country</label>
                            <div class="col-md-9">
                                <input name="country" placeholder="Country Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group" id="reason">
                            <label class="control-label col-md-3">Reason</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="reason" rows="3" placeholder="Enter ..."></textarea>
                                <span class="help-block"></span>
                            </div>
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

