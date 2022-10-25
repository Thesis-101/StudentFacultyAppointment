$(function(){

    const list = $('#department-list');
    const dept = $('.department-selection');

    let rowTemplate =   '<option value="{{department}}" >{{department}}</option>' 

    function appendDepartment(details){
                            dept.append(Mustache.render(rowTemplate,details));
                        }

    
    $.ajax({
            type: 'GET',
            url: '/loadAll',
            success: function(response){
                $.each(response, function(i, response){
                    appendDepartment(response);
                });
                        
            }
    });

});