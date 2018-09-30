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
        Informasi
        <small>Daftar Informasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="#">Daftar Informasi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Informasi</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" href="#" onclick="window.history.back();" title="Kembali ke Halaman Semula"><i class="fa fa-backward"></i></button>
                  <button class="btn btn-box-tool" href="#" onclick="add_info()" title="Tambah Informasi"><i class="fa fa-plus"></i></button>
                  <button class="btn btn-box-tool" href="#" onclick="reload_table()" title="Reload Tabel"><i class="fa fa-refresh"></i></button>
              </div>

            </div><!-- /.box-header -->

            <div class="box-body">

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
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
                <h3 class="modal-title">Informasi Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group" id="g_judul">
                            <label class="control-label col-md-2">Judul</label>
                            <div class="col-md-10">
                                <input name="judul" placeholder="Judul" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="g_isi">
                            <label class="control-label col-md-2">Isi</label>
                            <div class="col-md-10">
                                <input name="isi" placeholder="Isi" class="form-control" type="text">
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
