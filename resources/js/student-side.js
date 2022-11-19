import flatpickr from "flatpickr";

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
    

    let total = 0;
    let pending = 0;
    let accepted = 0;
    let declined = 0;

    let facultyVacant = [];

    let requestDataToDisable = [];

    let rowId;
    let id;

    let rowTemplate =   '<tr class="fragile"  data-id={{id}} id=row{{id}}>' +
                            '<td class="faculty-id" hidden><span><strong>{{userInstitutional_id}}</strong></span></td>' +
                            '<td class="faculty-name" hidden>{{users.name}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="faculty-office">{{designated_office}}</td>' +
                            '<td class="faculty-time">{{vacant_time}}</td>' +
                            '<td><button class="triggerAppoint btn btn-sm btn-primary px-3" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm">Book</button></td>' +
                        '</tr>' 
    
    let facultyRowTemplate =   '<tr data-id={{id}} id=row{{id}}>' +
                                    '<td class="faculty-department" hidden>{{department}}</td>' +
                                    '<td class="faculty-id" hidden>{{userInstitution_id}}</td>'+
                                    '<td class="faculty-name"><span><strong>{{name}}</strong></span></td>' +
                                    '<td width="125px"><button class="view btn btn-sm btn-primary px-3" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#details">View Vacant</button></td>' +
                                '</tr>' 

    let rowTemplateDisabled =   '<tr class="fragile"  data-id={{id}} id=row{{id}}>' +
                                            '<td class="faculty-id" hidden><span><strong>{{userInstitutional_id}}</strong></span></td>' +
                                            '<td class="faculty-name" hidden>{{users.name}}</td>' +
                                            '<td class="day">{{day}}</td>' +
                                            '<td class="faculty-office">{{designated_office}}</td>' +
                                            '<td class="faculty-time">{{vacant_time}}</td>' +
                                            '<td><button class="triggerAppoint btn btn-sm btn-warning disabled px-3" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm">Not Available</button></td>' +
                                '</tr>' 

    function appendVacant(details){
        list.prepend(Mustache.render(rowTemplate,details));
    }

    function appendFaculty(details){
        facultyList.prepend(Mustache.render(facultyRowTemplate,details));
    }

    function appendDisabled(details){
        list.prepend(Mustache.render(rowTemplateDisabled,details));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Added Events
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    list.delegate('tr','click', function(){
        config.disable = [];
        fp.destroy();
        $.each(requestDataToDisable, function(i, dataDates){
            if(dataDates.status == "Completed"){
                return;
            }else if(dataDates.status == "Declined"){
                return;
            }else{
                config.disable.push(dataDates.date);
            }

        });
        rowId = $(this).data('id');
        actualDay = dayIdentifier[($(this).find('td.day').text())];
        configDay = dayIdentifier[($(this).find('td.day').text())];

        config.disable.push(function(date){
            return (date.getDay() != configDay);
        });

        fp = flatpickr('input[type=date]',config);
        
        let dataArry = [];
        $(this).children('td').each(function (i){
            dataArry.push($(this).text());
        });
        id = dataArry[0];
        day.val(dataArry[2]) ;
        time.val(dataArry[4]) ;
        office.val(dataArry[3]) ;
        console.log(config.disable.toString());
    });

    list.delegate('.triggerAppoint','click',function(){
        date.val('');
    });
    

    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Faculty Vacant List
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    facultyList.delegate('.view', 'click', function(){
        let targetRow = $(this).closest('tr');
        let dataSkip;
        
        $('.fragile').remove();
        $.each(facultyVacant, function(i, vacant_details){
            if(targetRow.find('td.faculty-id').text() == vacant_details.userInstitutional_id){
                appendVacant(vacant_details);
                // $.each(requestDataToDisable, function(element, dataToDisable){
                //     if(dataToDisable.vacant_id == vacant_details.id && dataToDisable.status == "pending"){
                //         appendDisabled(vacant_details);
                //         dataSkip = vacant_details.id;
                //         return;
                //     }
                //     // else if(dataToDisable.vacant_id == vacant_details.id && dataToDisable.status == "Accepted"){
                //     //     appendVacant(vacant_details);
                //     //     return;
                //     // }
                // });

                // if(vacant_details.id != dataSkip){
                //     appendVacant(vacant_details);
                // }
                
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
            $.each(faculty, function(i, details){
                appendFaculty(details);
            });
        }
    });
    console.log(facultyVacant);


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Get All Requests
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/request',
        success: function(faculty){
            $.each(faculty, function(i, appointment){
                total++;
                if(appointment.status == "Accepted"){
                    accepted++;
                }else if(appointment.status == "Declined"){
                    declined++;
                }else if(appointment.status == "pending"){
                    pending++;
                }else if(appointment.status == "Cancelled"){
                    declined++;
                }
            });
            totalCard.text(total);
            pendingCard.text(pending);
            acceptedCard.text(accepted);
            declinedCard.text(declined);
        }
    });


    $.ajax({
        type: 'GET',
        url: '/student/load-requests',
        success: function(faculty){
            $.each(faculty, function(i, appointment){
                requestDataToDisable.push(appointment);
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
                alert("Appointment Added");
                day.val('');
                time.val('');
                date.val('');
                requestType.val('');
                attendee.val('');
                location.reload(true);
            },
            error: function () {
                alert("An error while saving data");
            },
        });
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Date validation
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function reveal(){
        
    }
     
        //disable unwanted dates
    

    const validate = dateString => {
        const day = (new Date(dateString)).getDay();
        if (day != actualDay) {
          return false;
        }
        return true;
      }
      
      // Sets the value to '' in case of an invalid date
    document.querySelector('.appointmentDate').onchange = evt => {
        if (!validate(evt.target.value)) {
          evt.target.value = '';
          alert('Invalid Day/Date!');
        }
      }
    

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Button validation
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $('.btnWatcher').attr('disabled', true);

    function scanBtn(){
        if(date.val() == '' || requestType.val() == '' || attendee.val() == ''){
            $('.btnWatcher').attr('disabled', true);
        }else{
            $('.btnWatcher').attr('disabled', false);
        }
    }

    date.change(function(){
        scanBtn();
    });

    requestType.change(function(){
        scanBtn();
    });

    attendee.change(function(){
        scanBtn();
    });
});