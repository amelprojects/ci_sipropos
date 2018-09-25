<script type="text/javascript">

function submit(id)
{
    if(confirm('Setelah disubmit data tidak bisa diubah'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('project/stepfinal')?>/"+id,
            type: "POST",
            dataType: "JSON",
            beforeSend:function(msg){
                new PNotify({text: 'Proses ..... !', type: 'info', icon: 'fa fa-spinner fa-spin', styling: 'bootstrap3'});
            },
            success: function(data)
            {
                document.location.href='<?php echo base_url();?>home';
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                new PNotify({title: 'Project',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
            }
        });

    }
}

</script>

