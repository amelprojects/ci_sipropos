<script type="text/javascript">

    function save()
    {
        $('#btn_save').text('Simpan...'); //change button text
        $('#btn_save').attr('disabled',true); //set button disable

        // ajax adding data to database
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : '<?php echo base_url();?>users/changepassword_action',
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
                PNotify.removeAll();

                if(data.status) //if success close modal and reload ajax table
                {
                    new PNotify({title: 'Ganti Kata Sandi', type: 'success', text: "Berhasil di simpan", styling: 'bootstrap3'});
                    document.location.reload();
                    
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        // $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        new PNotify({title: 'Ganti Kata Sandi',text: data.error_string[i], styling: 'bootstrap3'});
                        
                    }
                }
        
                //new PNotify({title: 'Profil',text: 'Informasi akun telah diupdate!', styling: 'bootstrap3'});
                $('#btn_save').text('Simpan'); //change button text
                $('#btn_save').attr('disabled',false); //set button enable 

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                new PNotify({title: 'Ganti Kata Sandi',type: 'error', text: "Ada kesalahan pada sistem kami", styling: 'bootstrap3'});
                $('#btn_save').text('Simpan'); //change button text
                $('#btn_save').attr('disabled',false); //set button enable

            }
        });
    }

    function validateSpace(t){

        if(t.value.match(/\s/g)){

            new PNotify({title: 'Users',text: 'Maaf ! Spasi tidak diijinkan', styling: 'bootstrap3'});

            t.value=t.value.replace(/\s/g,'');

        }

    }

</script>

