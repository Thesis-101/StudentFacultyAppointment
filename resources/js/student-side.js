$(function (){
    const list = $('#schedule-list');
    const facultyList = $('#faculty-list');
    const requesitor = $('#requesitor');
    const day = $('#day');
    const time = $('#time');
    const office = $('#office');
    const date = $('#date');
    const attendee = $('#attendee'); 
    const requestType = $('#request');

    const viewFacultyId = $('#facultyId');
    const viewFacultyName = $('#facultyName');
    const viewFacultyDepartment = $('#facultyDepartment');

    const totalCard = $('#totalTransactions');
    const pendingCard = $('#pendingTransactions');
    const acceptedCard = $('#acceptedTransactions');
    const declinedCard = $('#declinedTransactions');

    const filter = $('#filter');
    const urlParams = new URLSearchParams(window.location.search);
    const department = urlParams.get('department');

    let total = 0;
    let pending = 0;
    let accepted = 0;
    let declined = 0;

    let facultyVacant = [];

    let rowId;
    let id;

    let rowTemplate =   '<tr class="fragile"  data-id={{id}} id=row{{id}} >' +
                            '<td class="faculty-id" hidden><span><strong>{{userInstitutional_id}}</strong></span></td>' +
                            '<td class="faculty-name" hidden>{{users.name}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="faculty-office">{{designated_office}}</td>' +
                            '<td class="faculty-time">{{vacant_time}}</td>' +
                            '<td><button class="triggerAppoint btn btn-sm btn-primary px-3" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm">Appoint</button></td>' +
                        '</tr>' 
    
    let facultyRowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                                    '<td class="faculty-department" hidden>{{department}}</td>' +
                                    '<td class="faculty-id" hidden>{{userInstitution_id}}</td>'+
                                    '<td class="faculty-name"><span><strong>{{name}}</strong></span></td>' +
                                    '<td width="125px"><button class="view btn btn-sm btn-primary px-3" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#details">View Vacant</button></td>' +
                                '</tr>' 

    function appendVacant(details){
        list.prepend(Mustache.render(rowTemplate,details));
    }

    function appendFaculty(details){
        facultyList.prepend(Mustache.render(facultyRowTemplate,details));
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

    facultyList.delegate('.view', 'click', function(){
        let targetRow = $(this).closest('tr');
        $('.fragile').remove();
        $.each(facultyVacant, function(i, vacant_details){
            if(targetRow.find('td.faculty-id').text() == vacant_details.userInstitutional_id){
                appendVacant(vacant_details);
            }
        });
        viewFacultyId.html(targetRow.find('td.faculty-id').text());
        viewFacultyName.html(targetRow.find('td.faculty-name').text());
        viewFacultyDepartment.html(targetRow.find('td.faculty-department').text());
    });

    $.ajax({
        type: 'GET',
        url: '/api/schedules',
        success: function(vacant){
            console.log(vacant);
            $.each(vacant, function(i, vacant_details){
                facultyVacant.push(vacant_details);
            });
        }
    });
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Faculty
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/student/getFaculty',
        success: function(faculty){
            console.log(faculty);
            $.each(faculty, function(i, details){
                appendFaculty(details);
                console.log(details);
            });
        }
    });


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Get All Requests
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/request',
        success: function(faculty){
            console.log(faculty);
            $.each(faculty, function(i, appointment){
                total++;
                if(appointment.status == "Accepted"){
                    accepted++;
                }else if(appointment.status == "Declined"){
                    declined++;
                }else if(appointment.status == "pending"){
                    pending++;
                }
            });
            totalCard.text(total);
            pendingCard.text(pending);
            acceptedCard.text(accepted);
            declinedCard.text(declined);
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
                alert("Appointment Added");
                requesitor.val(''),
                requesitor.val(''),
                day.val(''),
                time.val(''),
                date.val(''),
                requestType.val(''),
                attendee.val('')
            },
            error: function () {
                alert("An error while saving data");
            },
        });
    });
});