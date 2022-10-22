$(function (){
    const list = $('#appointment-list');
    const history = $('#history-list');
    const rescheduleBTN = $('#reschedule');
    const declineBTN = $('#decline');
    const newDay = $('#day');
    const time1 = $('#time1');
    const time2 = $('#time2');
    const date = $('#date');
    const reason = $('#reason');
    const viewName = $('#studentName');
    const viewId = $('#studentId');
    const viewDepartment = $('#studentDepartment');
    const viewPurpose = $('#purpose');
    const viewAttendee = $('#attendee');

    const totalCard = $('#totalTransactions');
    const pendingCard = $('#pendingTransactions');
    const acceptedCard = $('#acceptedTransactions');
    const declinedCard = $('#declinedTransactions');

    let total = 0;
    let pending = 0;
    let accepted = 0;
    let declined = 0;

    let targetRow;

    let data = [];

    let rowId;

    let edited;

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="student-department" hidden>{{students.department}}</td>' +
                            '<td class="request-type" hidden>{{request_type}}</td>' +
                            '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="status" >{{status}}</td>'+
                            '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                            '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                            '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                            '<td>'+
                                '<button class="triggerView mx-1 btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#details" data-id="{{id}}" >View</button>' +
                                // '<button class="triggerAccept mx-1 btn btn-sm btn-primary px-3" data-id="{{id}}" >Accept</button>' +
                                // '<button class="triggerChange mx-1  btn btn-sm btn-warning px-3" data-id="{{id}}"  data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm" >Reschedule</button>' +
                                // '<button class="triggerDecline mx-1  btn btn-sm btn-danger px-3" data-id="{{id}}" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#reasonForm">Decline</button>' +
                            '</td>'+
                        '</tr>' 

    function appendAppointment(details){
                list.prepend(Mustache.render(rowTemplate,details));
     }

     function appendHistory(details){
        history.prepend(Mustache.render(rowTemplate,details));
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Appoinment List
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/appointments',
        success: function(appointments){
            console.log(appointments);
            $.each(appointments, function(i, appointment){
                appendAppointment(appointment);
                total++;
                if(appointment.status == "Accepted"){
                    accepted++;
                }else if(appointment.status == "Declined"){
                    declined++;
                }
            });
            totalCard.text(total);
            pendingCard.text(pending);
            acceptedCard.text(accepted);
            declinedCard.text(declined);
        }
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Update Request Status
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    list.delegate('.triggerAccept', 'click', function (){

           rowId = $(this).data('id');
            targetRow = $(this).closest('tr');

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


    list.delegate('.triggerView', 'click', function (){

        rowId = $(this).data('id');
        targetRow = $(this).closest('tr');

        edited = {
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

        viewName.html(targetRow.find('td.student-name').text());
        viewId.html(targetRow.find('td.student-id').text());
        viewDepartment.html(targetRow.find('td.student-department').text());
        viewPurpose.html('<strong>Purpose: </strong>'+ targetRow.find('td.request-type').text());
        viewAttendee.html('<strong>Attendee Type: </strong>'+ targetRow.find('td.attendee-type').text());

    //     edited = {
    //         student_id:     targetRow.find('td.student-id').text(),
    //         message:        'Appointment Declined.',
    //         state:          'danger', 
    //         vacant_id:      targetRow.find('td.vacantId').text(),
    //         requesitor_id:  targetRow.find('td.requesitor').text(),
    //         faculty_id:     targetRow.find('td.facultyId').text(),
    //         request_type:   targetRow.find('td.request-type').text(),
    //         attendee_type:  targetRow.find('td.attendee-type').text(),
    //         day:            targetRow.find('td.day').text(),
    //         time:           targetRow.find('td.time').text(),
    //         date:           targetRow.find('td.date').text(),
    //         status:         'Declined'
    //  }
 });


    //  $.ajaxSetup({
    //      headers: {
    //                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //              }
    //      });

    //  $.ajax({
    //      type: "PUT",
    //      url: "/api/appointments/"+rowId,
    //      data: edited,
    //      success: function (edited) {
    //          console.log(edited);
    //          alert("Appoinment Has Been Declined.");
    //          targetRow.remove();
    //      },
    //      error: function () {
    //          console.log(edited);
    //          console.log(rowId);
    //          alert("An error while saving data");
    //      },
    //  });


 list.delegate('.triggerChange', 'click', function (){
        
        

        rowId = $(this).data('id');
        targetRow = $(this).closest('tr');

        edited = { 
        student_id:     targetRow.find('td.student-id').text(),
        message:        'Appointment is accepted but rescheduled to'+date.val()+' '+newDay.val()+' between '+time1.val() +' - '+time2.val(),
        state:          'success',
        vacant_id:      targetRow.find('td.vacantId').text(),
        requesitor_id:  targetRow.find('td.requesitor').text(),
        faculty_id:     targetRow.find('td.facultyId').text(),
        request_type:   targetRow.find('td.request-type').text(),
        attendee_type:  targetRow.find('td.attendee-type').text(),
        day:            newDay.val(),
        time:           time1.val() +' - '+time2.val(),
        date:           date.val(),
        status:         'Accepted'
        }

        
    
        // rescheduleBTN.on('click', function (){
        //     $.ajaxSetup({
        //             headers: {
        //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                     }  
        //             });

        //         $.ajax({
        //             type: "PUT",
        //             url: "/api/appointments/"+rowId,
        //             data: edited,
        //             success: function (edited) {
        //                 console.log(edited);
        //                 alert("Appoinment Has Been Changed.");
        //                 targetRow.remove();
        //             },
        //             error: function () {
        //                 console.log(edited);
        //                 console.log(rowId);
        //                 alert("An error while saving data");
        //             },
        //         });
        // });
    
});
rescheduleBTN.on('click', function (){
    // edited = { 
    //     student_id:     targetRow.find('td.student-id').text(),
    //     message:        'Appointment is accepted but rescheduled to'+date.val()+' '+newDay.val()+' between '+time1.val() +' - '+time2.val(),
    //     state:          'success',
    //     vacant_id:      targetRow.find('td.vacantId').text(),
    //     requesitor_id:  targetRow.find('td.requesitor').text(),
    //     faculty_id:     targetRow.find('td.facultyId').text(),
    //     request_type:   targetRow.find('td.request-type').text(),
    //     attendee_type:  targetRow.find('td.attendee-type').text(),
    //     day:            newDay.val(),
    //     time:           time1.val() +' - '+time2.val(),
    //     date:           date.val(),
    //     status:         'Accepted'
    //     }

    edited.day = newDay.val();
    edited.message = 'Appointment is accepted but rescheduled to '+date.val()+' '+newDay.val()+' between '+time1.val() +' - '+time2.val();
    edited.time = time1.val() +' - '+time2.val();
    edited.date = date.val();

    console.log(edited);
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
                        alert("Appoinment Has Been Changed.");
                        targetRow.remove();
                    },
                    error: function () {
                        console.log(edited);
                        console.log(rowId);
                        alert("An error while saving data");
                    },
                });
    });


declineBTN.on('click', function(){

    edited.message = 'Appointment declined: '+reason.val();

    console.log(edited);
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
             targetRow.find('td.status').html('Declined');
         },
         error: function () {
             console.log(edited);
             console.log(rowId);
             alert("An error while saving data");
         },
     });
});
});
