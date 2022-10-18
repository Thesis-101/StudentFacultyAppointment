$(function (){
    const list = $('#appointment-list');
    const history = $('#history-list');
    let data = [];
    let rowId;

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-id"><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="request-type">{{request_type}}</td>' +
                            '<td class="attendee-type">{{attendee_type}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="status" hidden>{{status}}</td>'+
                            '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                            '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                            '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                            '<td>'+
                                '<button class="triggerAccept btn btn-sm btn-primary px-3" data-id="{{id}}" >Accept</button>' +
                                '<button class="triggerDecline btn btn-sm btn-danger px-3" data-id="{{id}}" >Decline</button>' +
                            '</td>'+
                        '</tr>' 

    function appendAppointment(details){
                list.prepend(Mustache.render(rowTemplate,details));
     }

     function appendHistory(details){
        history.prepend(Mustache.render(rowTemplate,details));
    }


    //  list.delegate('tr','click', function(){
    //     rowId = $(this).data('id');
    //     let dataArry = [];
    //     $(this).children('td').each(function (i){
    //         dataArry.push($(this).text());
    //     });

    //     const $timeArry = dataArry[1].split(' - ');

    //     console.log(dataArry);

    //     $day.val(dataArry[0]);
    //     $time1.val($timeArry[0]);
    //     $time2.val($timeArry[1]);
    //     $office.val(dataArry[2]);
    // });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Appoinment List
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/appointments',
        success: function(appointments){
            console.log(appointments);
            $.each(appointments, function(i, appointment){
                if((appointment.status == "Approved") ){
                    appendHistory(appointment);
                }
                else if(appointment.status == "Declined"){
                    appendHistory(appointment);
                }else{
                    appendAppointment(appointment);
                }
            });
        }
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Update Request Status
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    list.delegate('.triggerAccept', 'click', function (){

           rowId = $(this).data('id');
           const targetRow = $(this).closest('tr');

           let edited = { 
            student_id:     targetRow.find('td.student-id').text(),
            message:        'Appointment Accepted.',
            state:          'success',
            vacant_id:      targetRow.find('td.vacantId').text(),
            requesitor_id:  targetRow.find('td.requesitor').text(),
            faculty_id:     targetRow.find('td.facultyId').text(),
            request_type:   targetRow.find('td.request-type').text(),
            attendee_type:  targetRow.find('td.attendee-type').text(),
            day:            targetRow.find('td.day').text(),
            time:           targetRow.find('td.time').text(),
            date:           targetRow.find('td.date').text(),
            status:         'Approved'
        }

        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

        $.ajax({
            type: "PUT",
            url: "/api/appointments/"+rowId,
            data: edited,
            success: function (edited) {
                console.log(edited);
                alert("Appoinment Has Been Accepted.");
                targetRow.remove();
            },
            error: function () {
                console.log(edited);
                console.log(rowId);
                alert("An error while saving data");
            },
        });
    });


    list.delegate('.triggerDecline', 'click', function (){

        rowId = $(this).data('id');
        const targetRow = $(this).closest('tr');

        let edited = {
            student_id:     targetRow.find('td.student-id').text(),
            message:        'Appointment Declined.',
            state:          'danger', 
            vacant_id:      targetRow.find('td.vacantId').text(),
            requesitor_id:  targetRow.find('td.requesitor').text(),
            faculty_id:     targetRow.find('td.facultyId').text(),
            request_type:   targetRow.find('td.request-type').text(),
            attendee_type:  targetRow.find('td.attendee-type').text(),
            day:            targetRow.find('td.day').text(),
            time:           targetRow.find('td.time').text(),
            date:           targetRow.find('td.date').text(),
            status:         'Declined'
     }

     $.ajaxSetup({
         headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
         });

     $.ajax({
         type: "PUT",
         url: "/api/appointments/"+rowId,
         data: edited,
         success: function (edited) {
             console.log(edited);
             alert("Appoinment Has Been Declined.");
             targetRow.remove();
         },
         error: function () {
             console.log(edited);
             console.log(rowId);
             alert("An error while saving data");
         },
     });
 });
});
