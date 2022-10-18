$(function (){
    const list = $('#schedule-list');
    const requesitor = $('#requesitor');
    const day = $('#day');
    const time = $('#time');
    const office = $('#office');
    const date = $('#date');
    const attendee = $('#attendee'); 
    const requestType = $('#request');

    const filter = $('#filter');
    const urlParams = new URLSearchParams(window.location.search);
    const department = urlParams.get('department');

    let rowId;
    let id;

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="faculty-id"><span><strong>{{userInstitutional_id}}</strong></span></td>' +
                            '<td class="faculty-name">{{users.name}}</td>' +
                            '<td class="faculty-name">{{day}}</td>' +
                            '<td class="faculty-office">{{designated_office}}</td>' +
                            '<td class="faculty-time">{{vacant_time}}</td>' +
                            '<td><button class="triggerAppoint btn btn-sm btn-primary px-3" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm">Appoint</button></td>' +
                        '</tr>' 

    function appendVacant(details){
        list.prepend(Mustache.render(rowTemplate,details));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Added Events
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    list.delegate('tr','click', function(){
        rowId = $(this).data('id');
        let dataArry = [];
        $(this).children('td').each(function (i){
            dataArry.push($(this).text());
        });

        console.log(dataArry);

        id = dataArry[0];
        day.val(dataArry[2]) ;
        time.val(dataArry[4]) ;
        office.val(dataArry[3]) ;
    });
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Faculty Vacant List
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/schedules',
        success: function(vacant){
            console.log(vacant);
            $.each(vacant, function(i, vacant_details){
                if(department == vacant_details.designated_office){
                    appendVacant(vacant_details);
                }else if(department == ""){
                    appendVacant(vacant_details);
                }
                
            });
        }
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Adding new vacant
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $('#appoint').on('click', function () {
        let newAppointment = {
            vacant_id: rowId,
            requesitor_id: requesitor.val(),
            faculty_id: id,
            day: day.val(),
            time: time.val(),
            date: date.val(),
            request_type: requestType.val(),
            attendee_type: attendee.val()
        }
        
        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

        $.ajax({
            type: "POST",
            url: '/api/request',
            data: newAppointment,
            success: function (newVacant) {
                console.log(newVacant);
                requesitor.val(''),
                requesitor.val(''),
                day.val(''),
                time.val(''),
                date.val(''),
                requestType.val(''),
                attendee.val('')
            },
            error: function () {
                console.log(newVacant);
                alert("An error while saving data");
            },
        });
    });
});