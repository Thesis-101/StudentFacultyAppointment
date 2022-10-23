$( function () {

    const list = $('#request-list');
    const appointmentList = $('#appointmentList');

    let rowId;
    const requesitor = $('#requesitor');

    let dashboardRowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                                    '<td class="faculty-name">{{users.name}}</td>' +
                                    '<td class="faculty-office">{{vacant_details.designated_office}}</td>' +
                                    '<td class="faculty-time">{{time}}</td>' +
                                    '<td class="faculty-name">{{date}}</td>' +
                                    '<td class="request-status">{{status}}</td>' +
                                '</tr>' 
            
    let pendingRowTemplate =   '<tr data-id={{id}} id=row{{id}} >'+
                                    '<td class="vacant-id" hidden>{{vacant_id}}</td>' +
                                    '<td class="requesitor-id" hidden>{{requesitor_id}}</td>' +
                                    '<td class="faculty-id" hidden>{{faculty_id}}</td>' +
                                    '<td class="request-type" hidden>{{request_type}}</td>' +
                                    '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                                    '<td class="day" hidden>{{day}}</td>' +
                                    '<td class="faculty-name">{{users.name}}</td>' +
                                    '<td class="faculty-office">{{vacant_details.designated_office}}</td>' +
                                    '<td class="faculty-time">{{time}}</td>' +
                                    '<td class="faculty-date">{{date}}</td>' +
                                    '<td class="request-status">{{status}}</td>' +
                                    '<td class="apiBtn">' +
                                        '<button data-id={{id}} class="cancel btn btn-sm btn-danger">Cancel</button>'+
                                    '</td>' +
                                '</tr>' 

    function appendVacant(details){
        list.prepend(Mustache.render(dashboardRowTemplate,details));
    }

    function appendPending(details){
        appointmentList.prepend(Mustache.render(pendingRowTemplate,details));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Added Events
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/request',
        success: function(vacant){
            console.log(vacant);
            $.each(vacant, function(i, vacant_details){
                if(vacant_details.status == "pending"){
                    appendPending(vacant_details);
                }
                appendVacant(vacant_details);
            });
        }
    });

    appointmentList.delegate('.cancel', 'click', function(){
        const row = $(this).closest('tr');
        let rowItem = $(this).data('id');

        let data = {
            vacant_id: row.find('td.vacant-id').text(),
            requesitor_id: row.find('td.requesitor-id').text(),
            faculty_id: row.find('td.faculty-id').text(),
            request_type: row.find('td.request-type').text(),
            attendee_type: row.find('td.attendee-type').text(),
            day: row.find('td.day').text(),
            time: row.find('td.faculty-time').text(),
            date: row.find('td.faculty-date').text(),
            status: "Cancelled"
        }

        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }  
            });

        $.ajax({
                    type: "PUT",
                    url: "/api/request/"+rowItem,
                    data: data,
                    success: function (data) {
                        row.find('td.request-status').html('Cancelled');
                        alert("Appointment Has Been Cancelled.");

                    },
                    error: function () {
                        alert("An error while saving data");
                    },
            });
    });


});