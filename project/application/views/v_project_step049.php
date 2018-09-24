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
      <small>Human Resource for Trainer</small>
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
        <small>.....</small>
      </div>

        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">


          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th>Add HR for Trainer
                  <button class="btn btn-box-tool" href="#" onclick="add_hr_trainer('<?php echo $project['id'];?>')" title="Tambah"><i class="fa fa-plus"></i></button>
                </th>
                <th>Trainer</th>
                <th>Education</th>
                <th>Experience</th>
                <th>Publication</th>
                <th>Field</th>
                <th>Engslish Skill</th>
              </tr>
              <?php foreach($hr_trainer as $list_hr_trainer) { ?>
              <tr>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_hr_trainer('<?php echo $list_hr_trainer['id'];?>')"><i class="glyphicon glyphicon-edit"></i></a> Edit
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_hr_trainer('<?php echo $list_hr_trainer['id'];?>')"><i class="glyphicon glyphicon-trash"></i></a> Hapus
                </td>
                <td><?php echo $list_hr_trainer['trainer']; ?></td>
                <td><?php echo $list_hr_trainer['education_level']; ?></td>
                <td><?php echo $list_hr_trainer['experience']; ?></td>
                <td><?php echo $list_hr_trainer['publication']; ?></td>
                <td><?php echo $list_hr_trainer['major']; ?></td>
                <td><?php echo $list_hr_trainer['english_skill']; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box-body -->

    </div><!-- /.box -->



    <div class="box-footer">
      <a href="<?php echo base_url()."project/step048/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>

      <a href="<?php echo base_url()."project/step06/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>

    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Human Resource for Trainer</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="<?php echo $project['id'];?>" name="project_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Trainer</label>
                            <input name="trainer" placeholder="Trainer Name" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Education Level</label>
                            <input name="education_level" placeholder="Title" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Major/Concentration/Field</label>
                            <textarea class="form-control" name="major" rows="3" placeholder="Enter ..."></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Publication</label>
                            <textarea class="form-control" name="publication" rows="3" placeholder="Enter ..."></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Practical experience in related field</label>
                            <textarea class="form-control" name="experience" rows="3" placeholder="Enter ..."></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Other Qualification</label>
                            <textarea class="form-control" name="other_qualification" rows="3" placeholder="Enter ..."></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Engslish Skill</label>
                            <select name="english_skill" id="english_skill" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1"/>1 (lowest)</option>
                                <option value="2"/>2</option>
                                <option value="3"/>3</option>
                                <option value="4"/>4</option>
                                <option value="5"/>5 (highest)</option>
                            </select>
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

