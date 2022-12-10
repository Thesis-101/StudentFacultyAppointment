$(function(){
    const picture = $('#profilePic').attr('src');

    //image preview
    $("#profile_img").change(function(){
        let reader = new FileReader();

        reader.onload = (e) => {
            $("#image_preview_container").attr('src', e.target.result);
            $('#profilePic').attr('src', e.target.result);
            $('#side-pic').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $("#undoUpdate").click(function(){
        $('#profilePic').attr('src', picture);
        $('#side-pic').attr('src', picture);
    });

    $("#profile_setup_frm").submit(function(e){

        e.preventDefault();
        var formData = new FormData(this);
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }  
        });

        $.ajax({
            type: "POST",
            url: this.action,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response.code == 400){
                    // alert(response.msg);
                    jQuery.noConflict();
                    $('#modal-alert-tag').text("Error");
                    $('#modal-alert-phrase').text(response.msg);
                    $('#alertModal').fadeIn();
                }else if (response.code == 200){
                    // alert(response.msg);
                    $('#userName').html($('#name').val());
                    $('#profileName').html($('#name').val());
                    $("#personalDetails").modal('hide');

                    jQuery.noConflict();
                    $('#modal-alert-tag').text("Success");
                    $('#modal-alert-phrase').text(response.msg);
                    $('#alertModal').fadeIn();
                }
            }
        });

    });

    $('#new_password_frm').submit(function(e){
        e.preventDefault();

        var formData = new FormData(this);
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }  
        });

        $.ajax({
            type: "POST",
            url: this.action,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response.code == 400){
                    // alert(response.msg);
                    jQuery.noConflict();
                    $('#modal-alert-tag').text("Error");
                    $('#modal-alert-phrase').text(response.msg);
                    $('#alertModal').fadeIn();

                    $('#oldPassword').val("");
                    $('#new_password').val("");
                    $('#new_password_confirmation').val("");
                }else if (response.code == 200){
                    // alert(response.msg);
                    $('#oldPassword').val("");
                    $('#new_password').val("");
                    $('#new_password_confirmation').val("");
                    $('#passwordChange').modal('hide');

                    jQuery.noConflict();
                    $('#modal-alert-tag').text("Success");
                    $('#modal-alert-phrase').text(response.msg);
                    $('#alertModal').fadeIn();
                }
            }
        });
    });
});