$(function (){
    const department = $('#departmentVal');
    const list = $('#department-list');

    let row;

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="departmentName">{{department}}</td>' +
                            '<td class="actionBTN">'+
                                '<button class="edit btn btn-sm btn-primary me-1"  data-bs-toggle="modal" data-bs-target="#addDepartment">Edit</button>'+
                                '<button class="delete btn btn-sm btn-danger">Delete</button>'+
                            '</td>' +
                        '</tr>' 

    function appendDepartment(details){
                            list.prepend(Mustache.render(rowTemplate,details));
                        }

    $('#add').click(function(){
        $('.changingBTN').attr('id','save');
    });

    $('.apiBtn').delegate('#save','click', function() {
        let deptVal = {
            department: department.val()
        }

        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

        $.ajax({
            type: "POST",
            url: '/admin/department-setup',
            data: deptVal,
            success: function (response) {
                console.log(response);
                appendDepartment(response.data);
                // alert(response.message);
                jQuery.noConflict();
                $('#modal-alert-tag').text("Success");
                $('#modal-alert-phrase').text(response.data);
                $('#alertModal').fadeIn();
            },
            error: function () {
                console.log($response);
                // alert("An error while saving data");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Error");
                $('#modal-alert-phrase').text("An error while saving data");
                $('#alertModal').fadeIn();
            },
        });
    });


    $.ajax({
        type: 'GET',
        url: '/loadAll',
        success: function(response){
            $.each(response, function(i, response){
                appendDepartment(response)
            });
        }
    });

    list.delegate('.delete', 'click', function(){
        const row = $(this).closest('tr');

        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }  
            });

        $.ajax({
            type: 'DELETE',
            url: '/admin/deleteDepartment/'+row.data('id'),
            success: function(data){
                row.remove();
                // alert(data.message);
                jQuery.noConflict();
                $('#modal-alert-tag').text("Success");
                $('#modal-alert-phrase').text(data.message);
                $('#alertModal').fadeIn();
            }
        });
    });

    list.delegate('.edit','click', function(){
        let deptVal = {
            department: department.val()
        }

         row = $(this).closest('tr');
        $('.changingBTN').attr('id','sendEdit');

        department.val(row.find('td.departmentName').text());

        
    });


    $('.apiBtn').delegate('#sendEdit', 'click', function(){
        let deptVal = {
            department: department.val()
        }

        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }  
            });

        $.ajax({
            type: 'PUT',
            url: '/admin/update/'+row.data('id'),
            data: deptVal,
            success: function(data){
                row.find('td.departmentName').text(deptVal.department);
                // alert(data.message);
                jQuery.noConflict();
                $('#modal-alert-tag').text("Success");
                $('#modal-alert-phrase').text(data.message);
                $('#alertModal').fadeIn();
            }
        });
    });
});