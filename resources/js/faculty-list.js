$(function(){
    const list = $('#faculty-list');
    let data = [];

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="facultyIdNumber">{{userInstitution_id}}</td>' +
                            '<td class="facultyName">{{name}}</td>' +
                            '<td class="facultyDepartment">{{department}}</td>' +
                            '<td class="facultyEmail">{{email}}</td>' +
                            '<td class="actionBTN">'+
                                '<button class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#personalDetails">Edit</button>'+
                                '<button class="btn btn-sm btn-danger">Delete</button>'+
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
                appendUser(details);
            });
            console.log(data);
        }
    });




});