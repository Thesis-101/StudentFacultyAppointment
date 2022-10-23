$(function (){
    const history = $('#history-list');
    let data = [];
    let rowId;

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-id" hidden><span><strong>{{students.userInstitution_id}}</strong></span></td>' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="attendee-type" hidden>{{attendee_type}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="request-type">{{request_type}}</td>' +
                            '<td class="status">{{status}}</td>'+
                            '<td class="requesitor" hidden>{{requesitor_id}}</td>' +
                            '<td class="vacantId" hidden>{{vacant_id}}</td>' +
                            '<td class="facultyId" hidden>{{faculty_id}}</td>' +
                        '</tr>' 


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
                appendHistory(appointment);
            });
        }
    });

});
