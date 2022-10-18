$( function () {

    const list = $('#request-list');

    let rowId;
    const requesitor = $('#requesitor');

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="faculty-id"><span><strong>{{faculty_id}}</strong></span></td>' +
                            '<td class="faculty-name">{{users.name}}</td>' +
                            '<td class="faculty-office">{{vacant_details.designated_office}}</td>' +
                            '<td class="faculty-time">{{time}}</td>' +
                            '<td class="faculty-name">{{date}}</td>' +
                            '<td class="request-status">{{status}}</td>' +
                        '</tr>' 

    function appendVacant(details){
        list.prepend(Mustache.render(rowTemplate,details));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Added Events
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/request',
        success: function(vacant){
            
            $.each(vacant, function(i, vacant_details){
                console.log(vacant_details);
                appendVacant(vacant_details);
            });
        }
    });


});