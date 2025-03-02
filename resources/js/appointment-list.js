import flatpickr from "flatpickr";


$(function (){
    const list = $('#appointment-list');
    const acceptedList = $('#accepted-list');
    const declinedList = $('#declined-list');
    const ongoingList = $('#ongoing-list');
    const completedList = $('#completed-list');

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
    const remarksID = $('#remarksID');
    

    const totalCard = $('#totalTransactions');
    const pendingCard = $('#pendingTransactions');
    const acceptedCard = $('#acceptedTransactions');
    const declinedCard = $('#declinedTransactions');

    let total = 0;
    let pending = 0;
    let accepted = 0;
    let declined = 0;

    const dayIdentifier = {
        sunday : 0,
        monday : 1,
        tuesday : 2,
        wednesday : 3,
        thursday : 4,
        friday : 5,
        saturday : 6
    }

    let config = {
        disable: [],
        minDate: "today"
    };

    let fp = flatpickr('input[type=date]',config);

    
    let actualDay;

    let configDay;
    

    let targetRow;

    let data = [];

    let rowId;

    let edited;

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                            '<td class="student-email" hidden>{{students.email}}</td>' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="student-department" hidden>{{students.department}}</td>' +
                            '<td class="request-type" hidden>{{request_type}}</td>' +
                            '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                            '<td class="remarksID" hidden>{{remarks.id}}</td>' +
                            '<td class="meetingOffice" hidden>{{vacant_details.designated_office}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="status" >{{status}}</td>'+
                            '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                            '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                            '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                            '<td class="rowBTN">'+
                                '<button class="triggerView mx-1 btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#details" data-id="{{id}}" >View</button>' +
                                // '<button class="triggerAccept mx-1 btn btn-sm btn-primary px-3" data-id="{{id}}" >Accept</button>' +
                                // '<button class="triggerChange mx-1  btn btn-sm btn-warning px-3" data-id="{{id}}"  data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm" >Reschedule</button>' +
                                // '<button class="triggerDecline mx-1  btn btn-sm btn-danger px-3" data-id="{{id}}" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#reasonForm">Decline</button>' +
                            '</td>'+
                        '</tr>'
    
    let ongoingTemplate =   '<tr data-id={{id}} id=row{{id}} class="bg-warning">' +
                                '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                                '<td class="student-email" hidden>{{students.email}}</td>' +
                                '<td class="student-name">{{students.name}}</td>' +
                                '<td class="student-department" hidden>{{students.department}}</td>' +
                                '<td class="request-type" hidden>{{request_type}}</td>' +
                                '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                                '<td class="remarksID" hidden>{{remarks.id}}</td>' +
                                '<td class="meetingOffice" hidden>{{vacant_details.designated_office}}</td>' +
                                '<td class="day">{{day}}</td>' +
                                '<td class="time">{{time}}</td>' +
                                '<td class="date">{{date}}</td>' +
                                '<td class="status" >{{status}}</td>'+
                                '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                                '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                                '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                                '<td class="rowBTN">'+
                                    '<button id="triggerEnd2" class="triggerView mx-1 btn btn-sm btn-danger px-3 " data-bs-toggle="modal" data-bs-target="#remarks" data-id="{{id}}" >End Session</button>' +
                                '</td>'+
                            '</tr>'
    let acceptedTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                                '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                                '<td class="student-email" hidden>{{students.email}}</td>' +
                                '<td class="student-name">{{students.name}}</td>' +
                                '<td class="student-department" hidden>{{students.department}}</td>' +
                                '<td class="request-type" hidden>{{request_type}}</td>' +
                                '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                                '<td class="remarksID" hidden>{{remarks.id}}</td>' +
                                '<td class="meetingOffice" hidden>{{vacant_details.designated_office}}</td>' +
                                '<td class="day">{{day}}</td>' +
                                '<td class="time">{{time}}</td>' +
                                '<td class="date">{{date}}</td>' +
                                '<td class="status" >{{status}}</td>'+
                                '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                                '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                                '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                                '<td class="rowBTN">'+
                                    '<button id="triggerStart" class="triggerView mx-1 btn btn-sm btn-primary px-3" data-bs-target="#details" data-id="{{id}}" disabled>Start Session</button>' +
                                '</td>'+
                            '</tr>'
    
    let declinedTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                            '<td class="student-email" hidden>{{students.email}}</td>' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="student-department" hidden>{{students.department}}</td>' +
                            '<td class="request-type" hidden>{{request_type}}</td>' +
                            '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                            '<td class="remarksID" hidden>{{remarks.id}}</td>' +
                            '<td class="meetingOffice" hidden>{{vacant_details.designated_office}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="status" >{{status}}</td>'+
                            '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                            '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                            '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                            '<td class="rowBTN">'+
                                '<button class="mx-1 btn btn-sm btn-danger px-3" data-bs-target="#details" data-id="{{id}}" disabled>Declined</button>' +
                            '</td>'+
                        '</tr>'
        
    let completedTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                        '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                        '<td class="student-email" hidden>{{students.email}}</td>' +
                        '<td class="student-name">{{students.name}}</td>' +
                        '<td class="student-department" hidden>{{students.department}}</td>' +
                        '<td class="request-type" hidden>{{request_type}}</td>' +
                        '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                        '<td class="remarksID" hidden>{{remarks.id}}</td>' +
                        '<td class="meetingOffice" hidden>{{vacant_details.designated_office}}</td>' +
                        '<td class="day">{{day}}</td>' +
                        '<td class="time">{{time}}</td>' +
                        '<td class="date">{{date}}</td>' +
                        '<td class="status" >{{status}}</td>'+
                        '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                        '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                        '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                        '<td class="rowBTN">'+
                            '<button class="mx-1 btn btn-sm btn-success px-3" data-bs-target="#details" data-id="{{id}}" disabled>Session Complete</button>' +
                        '</td>'+
                    '</tr>'

    function appendAppointment(details){
        list.append(Mustache.render(rowTemplate,details));
     }

    function appendOngoing(details){
        ongoingList.append(Mustache.render(ongoingTemplate,details));
    }

    function appendAccepted(details){
        acceptedList.append(Mustache.render(acceptedTemplate,details));
    }

    function appendDeclined(details){
        declinedList.append(Mustache.render(declinedTemplate,details));
    }

    function appendCompleted(details){
        completedList.append(Mustache.render(completedTemplate,details));
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Appoinment List
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    let studentData = [];
    $.ajax({
        type: 'GET',
        url: '/api/appointments',
        success: function(appointments){
            console.log(appointments);
            $.each(appointments, function(i, appointment){
                if(appointment.students != null){
                total++;
                if(appointment.status == "Accepted"){
                    appendAccepted(appointment);
                    data.push(appointment);
                    studentData.push(appointment);
                    accepted++;
                }else if(appointment.status == "Declined"){
                    appendDeclined(appointment)
                    declined++;
                }else if(appointment.status == "pending"){
                    studentData.push(appointment);
                    appendAppointment(appointment);
                    pending++;
                }else if(appointment.status == "Ongoing"){
                    studentData.push(appointment);
                    appendOngoing(appointment);
                }else if(appointment.status == "Completed"){
                    studentData.push(appointment);
                    appendCompleted(appointment);
                }
            }
            });
            totalCard.text(total);
            pendingCard.text(pending);
            acceptedCard.text(accepted);
            declinedCard.text(declined);
        }
    });
    console.log(studentData);
    console.log(data);

    ///////////////////////////////////////////////////////////////////////////
    /// Time Counter
    ///////////////////////////////////////////////////////////////////////////

    function checkOutData(){
        let firstTime;
        const today = new Date($.now());
        const timeToday = today.getHours()+':'+today.getMinutes();
        $.each(data, function(i, items){
            let row = items.id;
            const theButton = $('#row'+row);
            const requestDate = (new Date(items.date)).getDate();
            if(requestDate == today.getDate()){
                firstTime = items.time.split(' - ')[0];
                console.log(firstTime);
                if(timeToday >= firstTime){
                    theButton.find('button#triggerStart').attr('disabled',false);
                }
                // console.log(firstTime);
            }
        });
    }

    setInterval(checkOutData,1000);
    
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Update Request Status
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $('.triggerAccept').on('click', function(){

        edited.status = "Accepted";
        edited.message = 'Appointment is accepted. '+edited.date+' '+edited.day+' between '+edited.time;   
        edited.state = "success";
        edited.remarks = "None";

        console.log(edited.message);
        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            console.log(edited);
        $.ajax({
            type: "PUT",
            url: "/api/appointments/"+rowId,
            data: edited,
            success: function (edited) {
                targetRow.find('td.status').html('Accepted');
                // alert("Appoinment Has Been Accepted.");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Success");
                $('#modal-alert-phrase').text("Appoinment Has Been Accepted.");
                $('#alertModal').fadeIn();

                // targetRow.find().removeAttr('data-bs-toggle');
                // $('.triggerView').attr('id','triggerStart');
                // $('.triggerView').text('Start Session');

                // targetRow.find('td.rowBTN .triggerView').removeAttr('data-bs-toggle');
                // targetRow.find('td.rowBTN .triggerView').attr('id','triggerStart');
                // targetRow.find('td.rowBTN .triggerView').attr('disabled',true);
                // targetRow.find('td.rowBTN .triggerView').text('Start Session');
                targetRow.remove();

                accepted++;
                pending--;
                pendingCard.text(pending);
                acceptedCard.text(accepted);
            },
            error: function (message) {
                console.log(message);
                // alert("An error while saving data");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Error");
                $('#modal-alert-phrase').text("An error while saving data");
                $('#alertModal').fadeIn();
            },
        });
    });

    acceptedList.delegate('#triggerStart','click',function (){

        rowId = $(this).data('id');
        targetRow = $(this).closest('tr');
        

        edited = {
            student_id:     targetRow.find('td.student-id').text(),
            student_email:  targetRow.find('td.student-email').text(),
            message:        'Session Started.',
            state:          'warning', 
            vacant_id:      targetRow.find('td.vacantId').text(),
            requesitor_id:  targetRow.find('td.requesitor').text(),
            faculty_id:     targetRow.find('td.facultyId').text(),
            request_type:   targetRow.find('td.request-type').text(),
            office:         targetRow.find('td.meetingOffice').text(),
            attendee_type:  targetRow.find('td.attendee-type').text(),
            day:            targetRow.find('td.day').text(),
            time:           targetRow.find('td.time').text(),
            date:           targetRow.find('td.date').text(),
            status:         'Ongoing',
            remarks_id:     targetRow.find('td.remarksID').text(),
            remarks:        'None',
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
                // alert("You Started The Session.");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Success");
                $('#modal-alert-phrase').text("You Started The Session.");
                $('#alertModal').fadeIn();
                targetRow.remove();
                // targetRow.find('td.status').html('On-going');
                // targetRow.find('td.rowBTN .triggerView').attr('id','triggerEnd2');
                // targetRow.find('td.rowBTN .triggerView').attr('data-bs-toggle','modal');
                // targetRow.find('td.rowBTN .triggerView').text('End Session');
                // targetRow.find('td.rowBTN .triggerView').addClass('bg-danger');
                // targetRow.find('td.rowBTN .triggerView').attr('data-bs-target','#remarks');
                // targetRow.attr('class','bg-warning');
            },
            error: function () {
                console.log(rowId);
                // alert("An error while saving data");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Error");
                $('#modal-alert-phrase').text("An error while saving data");
                $('#alertModal').fadeIn();
            },
        });
    });

    ongoingList.delegate('#triggerEnd2','click',function(){
        rowId = $(this).data('id');
        targetRow = $(this).closest('tr');
        

        edited = {
            student_id:     targetRow.find('td.student-id').text(),
            student_email:  targetRow.find('td.student-email').text(),
            message:        'Session Started.',
            state:          'success', 
            vacant_id:      targetRow.find('td.vacantId').text(),
            requesitor_id:  targetRow.find('td.requesitor').text(),
            faculty_id:     targetRow.find('td.facultyId').text(),
            request_type:   targetRow.find('td.request-type').text(),
            office:         targetRow.find('td.meetingOffice').text(),
            attendee_type:  targetRow.find('td.attendee-type').text(),
            day:            targetRow.find('td.day').text(),
            time:           targetRow.find('td.time').text(),
            date:           targetRow.find('td.date').text(),
            remarks:        $('#remarksVal').val(),
            status:         'Completed',
            remarks_id:     targetRow.find('td.remarksID').text(),
        }

        console.log(edited)
    });

    $('#triggerEnd').on('click',function(){

        edited.remarks = $('#remarksVal').val();
        edited.status = 'Completed';
        edited.message = 'Session Has Successfully Ended. Check The Remarks for Clarification';
        edited.state = 'success';

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
                // alert("Session Successfully Ended.");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Success");
                $('#modal-alert-phrase').text("Session Successfully Ended");
                $('#alertModal').fadeIn();
                targetRow.remove();
            },
            error: function (data) {
                console.log(data);
                // alert("There was a problem ending the session.");
                jQuery.noConflict();
                $('#modal-alert-tag').text("Error");
                $('#modal-alert-phrase').text("There was a problem ending the session.");
                $('#alertModal').fadeIn();
            },
        });
    });
  
    
    list.delegate('.triggerView', 'click', function (){

        config.disable = [];
        fp.destroy();

        rowId = $(this).data('id');
        targetRow = $(this).closest('tr');
        console.log(targetRow.find('td.day').text());
        edited = {
            student_id:     targetRow.find('td.student-id').text(),
            student_email:  targetRow.find('td.student-email').text(),
            message:        'Appointment Declined.',
            state:          'danger', 
            vacant_id:      targetRow.find('td.vacantId').text(),
            requesitor_id:  targetRow.find('td.requesitor').text(),
            faculty_id:     targetRow.find('td.facultyId').text(),
            request_type:   targetRow.find('td.request-type').text(),
            office:         targetRow.find('td.meetingOffice').text(),
            attendee_type:  targetRow.find('td.attendee-type').text(),
            day:            targetRow.find('td.day').text(),
            time:           targetRow.find('td.time').text(),
            date:           targetRow.find('td.date').text(),
            status:         targetRow.find('td.status').text(),
            remarks_id:     targetRow.find('td.remarksID').text(),
        }

        viewName.html(targetRow.find('td.student-name').text());
        viewId.html(targetRow.find('td.student-id').text());
        viewDepartment.html(targetRow.find('td.student-department').text());
        viewPurpose.html('<strong>Purpose: </strong>'+ targetRow.find('td.request-type').text());
        viewAttendee.html('<strong>Attendee Type: </strong>'+ targetRow.find('td.attendee-type').text());

        actualDay = dayIdentifier[(targetRow.find('td.day').text())];
        configDay = dayIdentifier[(targetRow.find('td.day').text())];

        config.disable.push(function(date){
            return (date.getDay() != configDay);
        });
        console.log(configDay);
        fp = flatpickr('input[type=date]',config);


 });



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
        office:         targetRow.find('td.meetingOffice').text(),
        attendee_type:  targetRow.find('td.attendee-type').text(),
        day:            newDay.val(),
        time:           time1.val() +' - '+time2.val(),
        date:           date.val(),
        status:         'Accepted'
        }

    
});

rescheduleBTN.on('click', function (){

    edited.day = newDay.val();
    edited.message = 'Appointment is accepted but rescheduled to '+date.val()+' '+newDay.val()+' between '+time1.val() +' - '+time2.val();
    edited.time = time1.val() +' - '+time2.val();
    edited.date = date.val();
    edited.status = "Accepted";
    edited.state = "success";
    edited.remarks = "None";

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
                        // targetRow.find('td.status').html('Accepted');
                        // targetRow.find('td.day').html(edited.day);
                        // targetRow.find('td.date').html(edited.date);
                        // targetRow.find('td.time').html(edited.time);

                        // targetRow.find('td.rowBTN .triggerView').removeAttr('data-bs-toggle');
                        // targetRow.find('td.rowBTN .triggerView').attr('id','triggerStart');
                        // targetRow.find('td.rowBTN .triggerView').attr('disabled',true);
                        // targetRow.find('td.rowBTN .triggerView').text('Start Session');
                        
                        // alert("Appoinment Has Been Changed.");
                        jQuery.noConflict();
                        $('#modal-alert-tag').text("Success");
                        $('#modal-alert-phrase').text("Appointment Has Been Changed.");
                        $('#alertModal').fadeIn();
                        targetRow.remove();

                        pending--;
                        accepted++;
                        pendingCard.text(pending);
                        acceptedCard.text(accepted);
                    },
                    error: function () {
                        console.log(edited);
                        console.log(rowId);
                        // alert("An error while saving data");
                        jQuery.noConflict();
                        $('#modal-alert-tag').text("Error");
                        $('#modal-alert-phrase').text("An error while saving data");
                        $('#alertModal').fadeIn();
                    },
                });
    });


declineBTN.on('click', function(){

    edited.message = 'Appointment declined: '+reason.val();
    edited.status = "Declined";
    edited.state = "danger";
    edited.remarks = reason.val();

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
             targetRow.find('td.status').html('Declined');
            //  alert("Appoinment Has Been Declined.");
             jQuery.noConflict();
             $('#modal-alert-tag').text("Success");
             $('#modal-alert-phrase').text("Appointment Has Been Declined.");
             $('#alertModal').fadeIn();
             declined++;
             pending--;
             targetRow.remove();
             pendingCard.text(pending);
             declinedCard.text(declined);
         },
         error: function () {
             console.log(rowId);
            //  alert("An error while saving data");
            jQuery.noConflict();
            $('#modal-alert-tag').text("Error");
            $('#modal-alert-phrase').text("An error while saving data");
            $('#alertModal').fadeIn();
         },
     });
});

newDay.on('change',function(){
    config.disable = [];
    fp.destroy();

    actualDay = dayIdentifier[($(this).val())];
    configDay = dayIdentifier[($(this).val())];

    config.disable.push(function(date){
        return (date.getDay() != configDay);
    });
    fp = flatpickr('input[type=date]',config);
    console.log('day changed to '+$(this).val());
});

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Filter Student Names
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    const facultyDataName = $('#student-name-value');
    $('#filter-student').submit(function(e){
        e.preventDefault();
        list.empty();

        $.each(studentData, function(i, student){
            if(student.students.name.toLowerCase().includes(facultyDataName.val().toLowerCase())){
                if(student.status == "Accepted"){
                    appendAccepted(student);
                }else if(student.status == "pending"){
                    appendAppointment(student);
                }else if(student.status == "Ongoing"){
                    appendOngoing(student);
                }
                
                console.log(true);
            }
            if(facultyDataName.val() == null){
                if(student.status == "Accepted"){
                    appendAccepted(student);
                }else if(student.status == "pending"){
                    appendAppointment(student);
                }else if(student.status == "Ongoing"){
                    appendOngoing(student);
                }
            }
        });

    });
});
