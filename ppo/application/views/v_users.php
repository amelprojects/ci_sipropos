<?php
/**
 * User: VF
 * Date: 9/19/2016
 * Time: 8:47 AM
 */
?>

<div class="container">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Daftar User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="#">Daftar User</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengguna</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" href="#" onclick="window.history.back();" title="Kembali ke Halaman Semula"><i class="fa fa-backward"></i></button>
                  <button class="btn btn-box-tool" href="#" onclick="add_users()" title="Tambah User"><i class="fa fa-plus"></i></button>
                  <button class="btn btn-box-tool" href="#" onclick="reload_table()" title="Reload Tabel"><i class="fa fa-refresh"></i></button>
              </div>

            </div><!-- /.box-header -->

            <div class="box-body">

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Instansi</th>
                        <th>Tanggal Daftar</th>
                        <!--
                        <th>Login Terakhir</th>
                        -->
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
          </div>
        </div>    
      </div>

    </section>

</div>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Users Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="" name="user_email_pass"/> 
                    <div class="form-body">
                        <div class="form-group" id="g_user_name">
                            <label class="control-label col-md-3">Nama Pengguna</label>
                            <div class="col-md-9">
                                <input name="user_name" placeholder="Kata Pengguna (Min 6 Karakter)" onkeypress="return validateSpace(this);" class="form-control" type="text" minlength="6">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="g_user_email">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="user_email" placeholder="Email" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="g_user_fullname">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="user_fullname" placeholder="Nama Lengkap" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="g_instansi">
                            <label class="control-label col-md-3">Instansi</label>
                            <div class="col-md-9">
                                <input name="instansi" placeholder="Instansi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="g_password1">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input name="user_pass1" placeholder="Password" onkeypress="return validateSpace(this);" class="form-control" type="Password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group" id="g_password2">
                            <label class="control-label col-md-3">Re-type Password</label>
                            <div class="col-md-9">
                                <input name="user_pass2" placeholder="Password" onkeypress="return validateSpace(this);" class="form-control" type="Password">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group" id="g_id_role">
                            <label class="control-label col-md-3">Role</label>
                            <div class="col-md-9">
                                <select name="id_role" id="id_role" class="form-control">
                                    <option value="">Pilih Role</option>
                                    <?php foreach($roles as $list_roles) { ?>
                                        <option value="<?php echo $list_roles['id']; ?>"><?php echo ucfirst($list_roles['role_name']); ?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
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
