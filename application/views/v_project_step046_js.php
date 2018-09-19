<script type="text/javascript">

function add_media(project_id)
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Promotional Material'); // Set Title to Bootstrap modal title
    $('[name="project_id"]').val(project_id);

}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    // var url;

    if(save_method == 'add') {
        var url = "<?php echo site_url('project/ajax_add_media')?>";
    } else {
        var url = "<?php echo site_url('project/ajax_edit_media')?>";
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
                    // $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    new PNotify({title: 'Promotional Material',text: data.error_string[i], styling: 'bootstrap3'});
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Promotional Material',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}


function edit_media(id)
{
    save_method = 'edit';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('project/ajax_get_media')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            //alert(data.id_role);
            $('[name="id"]').val(data.id);
            $('[name="title"]').val(data.title);
            $('[name="description"]').val(data.description);
            $('[name="promotional"]').val(data.promotional);
            $('[name="potential"]').val(data.potential);
            $('[name="target_group"]').val(data.target_group);
            $('[name="ways_mean"]').val(data.ways_mean);
            $('[name="duration"]').val(data.duration);
            $('[name="budget"]').val(data.budget);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Promotional Material'); // Set title to Bootstrap modal title

            // document.location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            new PNotify({title: 'Promotional Material',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
        }
    });
}

function delete_media(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('project/ajax_delete_media')?>/"+id,
            type: "POST",
            dataType: "JSON",
            beforeSend:function(msg){
                new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
            },
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                document.location.reload();
                PNotify.removeAll();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                new PNotify({title: 'Promotional Material',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            }
        });

    }
}

</script>

