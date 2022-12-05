$(function(){
    const list = $('#faculty-list');
    let data = [];

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="profileImg" hidden>{{profile_img}}</td>' +
                            '<td class="facultyIdNumber">{{userInstitution_id}}</td>' +
                            '<td class="facultyName">{{name}}</td>' +
                            '<td class="facultyDepartment">{{department}}</td>' +
                            '<td class="facultyEmail">{{email}}</td>' +
                            '<td class="actionBTN">'+
                                '<button class="profileEdit btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#personalDetails{{id}}">View Details</button>' +
                                '<button class="delete btn btn-sm btn-danger">Delete</button>' +
                            '</td>'+
                        '</tr>'

    function appendUser(details){
                            list.prepend(Mustache.render(rowTemplate,details));
                        }

    $.ajax({
        type: 'GET',
        url: '/admin/faculty',
        success: function(faculty){
            $.each(faculty, function(i, details){
                data.push(details);
                // appendUser(details);
            });
            console.log(data);
        }
    });

    // list.delegate('.profileEdit','click', function(){
    //     let targetRow = $(this).closest('tr');
    //     let userProfile = targetRow.find('td.profileImg').text();
    //     $('#image_preview_container').attr('src','{{asset("storage/images/"'+userProfile+')}}');
    // });


    $('.delete').click(function(){
        const row = $(this).closest('tr');

        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }  
            });

        $.ajax({
            type: 'DELETE',
            url: '/admin/delete/'+row.data('id'),
            success: function(data){
                row.remove();
                alert(data.message);
            }
        });
    });


    $("#user_setup_frm").submit(function(e){
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
                console.log(response);
                if (response.status == true){
                    alert(response.message);
                    location.reload();
                }else{
                    alert("Something went wrong");
                }
            }
        });

    });

    $("#restoreDefault").click(function(){
        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }  
            });

        $.ajax({
            type: 'POST',
            url: '/admin/restore-default/'+$("#userID").val(),
            data: {
                default_password : "defaultp@ssword"
            },
            success: function(data){
                alert(data.message);
            }
        });
    });


});