<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>


<script type="text/javascript">

var table;

$(document).ready(function() {


    //datatables
    table = $('#datatable-responsive').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('users/ajax_list')?>",
            "type": "POST",
            "data": function (data) {
                data.user_name = $('#user_name').val();
                data.user_email = $('#user_email').val();
                data.user_fullname = $('#user_fullname').val();
                data.instansi = $('#instansi').val();
                data.date_created = $('#date_created').val();
                data.s_role = $('#s_role').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });

    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });

});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function add_users()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah User Pengguna'); // Set Title to Bootstrap modal title
    $('[name="user_email"]').prop('disabled', false);
    $('#g_user_name').show();
    $('#g_user_email').show();
    $('#g_user_fullname').show();
    $('#g_instansi').show();
    $('#g_password1').show();
    $('#g_password2').hide();
    $('#g_id_role').show();

}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    // var url;

    if(save_method == 'add') {
        var url = "<?php echo site_url('users/ajax_add')?>";
    } else if (save_method == 'pass') {
        var url = "<?php echo site_url('users/ajax_pass')?>";
    } else {
        var url = "<?php echo site_url('users/ajax_update')?>";
    }

    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        beforeSend:function(data){
            new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
        },
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    // new PNotify({title: 'Users',text: data.error_string[i], styling: 'bootstrap3'});
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Users',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}


function edit_users(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('[name="user_email"]').prop('disabled', false);
    $('#g_user_name').hide();
    $('#g_user_email').show();
    $('#g_user_fullname').show();
    $('#g_instansi').show();
    $('#g_password1').hide();
    $('#g_password2').hide();
    $('#g_id_role').show();
    
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('users/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //alert(data.id_role);
            $('[name="id"]').val(data.id);
            $('[name="user_name"]').val(data.user_name);
            $('[name="user_email"]').val(data.user_email);
            $('[name="user_fullname"]').val(data.user_fullname);
            $('[name="instansi"]').val(data.instansi);

            $('select[name="id_role"] option:selected').prop('selected',false); // VF - dibersihkan dulu
            $('select[name="id_role"] option[value='+data.id_role+']').prop('selected', true);
            //$('[name="id_role"]').filter(":selected").val(data.id_role);
            //$("select#id_role option").filter(":selected").val(data.id_role);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Users'); // Set title to Bootstrap modal title

            reload_table();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Users',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
        }
    });
}

function change_pass(id, email)
{
    // alert (email)
    save_method = 'pass';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ganti Password User Pengguna'); // Set Title to Bootstrap modal title
    $('[name="id"]').val(id);
    $('[name="user_email_pass"]').val(email);
    // $('[name="user_email"]').prop('disabled', true);
    $('#g_user_name').hide();
    $('#g_user_email').hide();
    $('#g_user_fullname').hide();
    $('#g_instansi').hide();
    $('#g_password1').show();
    $('#g_password2').show();
    $('#g_id_role').hide();
    

}


function aktif_user(id, is_aktif)
{
    // ajax delete data to database
    $.ajax({
        url : "<?php echo site_url('users/ajax_aktif_user')?>/"+id+"/"+is_aktif,
        type: "POST",
        dataType: "JSON",
        beforeSend:function(msg){
            new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
        },
        success: function(data)
        {
            //if success reload ajax table
            $('#modal_form').modal('hide');
            reload_table();
            PNotify.removeAll();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Users',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
        }
    });

}


function delete_users(id, email)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('users/ajax_delete')?>/"+id+"/"+email,
            type: "POST",
            dataType: "JSON",
            beforeSend:function(msg){
                new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
            },
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                PNotify.removeAll();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                new PNotify({title: 'Users',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            }
        });

    }
}

function validateSpace(t){

    if(t.value.match(/\s/g)){

        new PNotify({title: 'Users',text: 'Maaf ! Spasi tidak diijinkan', styling: 'bootstrap3'});

        t.value=t.value.replace(/\s/g,'');

    }

}

</script>