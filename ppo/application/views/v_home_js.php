<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>


<script type="text/javascript">

var table;

var user_role = $('[name="user_role"]').val();
var user_id = $('[name="user_id"]').val();

$(document).ready(function() {

    // alert(role_id+' - '+user_id);

    //datatables
    table = $('#datatable-responsive').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('home/ajax_list')?>/"+user_role+"/"+user_id,
            "type": "POST",
            "data": function (data) {
                data.title = $('#title').val();
                data.project_code = $('#project_code').val();
                data.type = $('#type').val();
                data.status = $('#status').val();
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
                    // $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    new PNotify({title: 'Users',text: data.error_string[i], styling: 'bootstrap3'});
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

function delete_project(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('home/ajax_delete_project')?>/"+id,
            type: "POST",
            dataType: "JSON",
            beforeSend:function(msg){
                new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
            },
            success: function(data)
            {
                //if success reload ajax table
                document.location.reload();
                PNotify.removeAll();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                new PNotify({title: 'Project',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            }
        });

    }
}

function status_project(id, status)
{
    // ajax delete data to database
    $.ajax({
        url : "<?php echo site_url('home/ajax_status_project')?>/"+id+"/"+status,
        type: "POST",
        dataType: "JSON",
        beforeSend:function(msg){
            new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
        },
        success: function(data)
        {
            //if success reload ajax table
            reload_table();
            PNotify.removeAll();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Project',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
        }
    });

}

function add_comment(project_id)
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Comment'); // Set Title to Bootstrap modal title
    $('[name="project_id"]').val(project_id);
    comment_load(project_id);
}

function save_comment()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    // var url;

    if(save_method == 'add') {
        var url = "<?php echo site_url('home/ajax_add_comment')?>";
    } else {
        var url = "<?php echo site_url('home/ajax_edit_comment')?>";
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
                document.location.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    // new PNotify({title: 'Other Activities',text: data.error_string[i], styling: 'bootstrap3'});
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Comment',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function view_comment(project_id, user_role)
{
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('View Comment'); // Set Title to Bootstrap modal title
    $('[name="project_id"]').val(project_id);
    $('[name="user_role"]').val(user_role);
    $('#add_comment').hide();
    comment_load(project_id);

}

function comment_load(project_id) {

    // alert(project_id);

    $.ajax({
        type: "POST",
        url: "<?php echo site_url('');?>home/ajax_view_comment/"+project_id,
        // data: { id: id },
        beforeSend: function(xhr){
          new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
        },
        success: function(res){

          var obj = $.parseJSON(res);
          // alert(obj.status);
          var eTable="<table><tbody>"
          if (obj.status === true){
            // alert(obj.data);
            // notif_toast(obj.message, "", "success");

            $.each(obj.data,function(key, value)
            {
                eTable += "<tr>";
                eTable += "<td width='100'>Title</td>";
                eTable += "<td width='10'>:</td>";
                eTable += "<td>"+value.title+"</td>";
                eTable += "</tr>";
                eTable += "<tr>";
                eTable += "<td>Comment</td>";
                eTable += "<td>:</td>";
                eTable += "<td>"+value.comment+"</td>";
                eTable += "</tr>";
            });


          } else {
            eTable += "<tr>";
            eTable += "<td>No Comment Found</td>";
            eTable += "</tr>";
          }
          eTable +="</tbody></table>";
          $('#v_comment').html(eTable);            

        }
    });

}


</script>