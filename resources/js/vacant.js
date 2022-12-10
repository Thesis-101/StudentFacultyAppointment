
$(function () {

    const $list = $('#vacant_list'); 
    const $id = $('#userInstitution_id');
    const $day = $('#day');
    const $time1 = $('#time1');
    const $time2 = $('#time2');
    const $office = $('#office');
    const $target = $('.target-bttn');

    let rowId;

    let rowTemplate = '<tr data-id={{id}} id=row{{id}}>'+
                        '<td class="day">{{day}}</td>'+
                        '<td class="time">{{vacant_time}}</td>'+
                        '<td class="office">{{designated_office}}</td>'+
                        '<td>'+ 
                            '<button class="triggerEdit btn btn-sm btn-primary px-3 me-1" data-id="{{id}}" data-bs-toggle="modal" data-bs-target="#addForm">Edit</button>'+
                            '<button data-id="{{id}}" class="triggerDelete btn btn-sm btn-danger px-3">Delete</button>'+
                        '</td>'+
                    '</tr>'

    function appendVacant(details){
        $list.prepend(Mustache.render(rowTemplate,details));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Added Events
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $($list).delegate('.triggerEdit', 'click', function (){
        $target.attr('id','edit');
        $target.text("Update");
    });

    $($list).delegate('tr','click', function(){
        rowId = $(this).data('id');
        let dataArry = [];
        $(this).children('td').each(function (i){
            dataArry.push($(this).text());
        });

        const $timeArry = dataArry[1].split(' - ');

        console.log(dataArry);

        $day.val(dataArry[0]);
        $time1.val($timeArry[0]);
        $time2.val($timeArry[1]);
        $office.val(dataArry[2]);
    });

    $('#add').on('click', function (){
        $day.val('');
        $time1.val('');
        $time2.val('');
        $office.val('');
        $target.attr("id","newVacant");
        $target.text("Save");
    });
    

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Vacant
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/vacant',
        success: function(vacant){
            $.each(vacant, function(i, vacant_details){
                appendVacant(vacant_details)
                // show(vacant_details.vacant_id, vacant_details.vacant_time);
                // setItem(vacant_details.vacant_id)
            });
        }
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Adding new vacant
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $('#apiBtn').delegate('#newVacant','click', function() {
        let $newVacant = { 
            userInstitutional_id: $id.val(),
            day: $day.val(),
            vacant_time: $time1.val() +' - '+$time2.val(),
            designated_office: $office.val(),
        }

        $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

        $.ajax({
            type: "POST",
            url: '/api/add-vacant',
            data: $newVacant,
            success: function (newVacant) {
                console.log(newVacant);
                appendVacant(newVacant.data);
                $day.val('');
                $time1.val('');
                $time2.val('');
                $office.val('');
            },
            error: function () {
                console.log($newVacant);
                // alert("An error while saving data");
                jQuery.noConflict();
                    $('#modal-alert-tag').text("Error");
                    $('#modal-alert-phrase').text("An error while saving data");
                    $('#alertModal').fadeIn();
            },
        });
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Edit Details
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $('#apiBtn').delegate('#edit','click', function (){
        let $edited = { 
            userInstitutional_id: $id.val(),
            day: $day.val(),
            vacant_time: $time1.val() +' - '+$time2.val(),
            designated_office: $office.val(),
        }

        let dataArry = [];
        const targetRow = $list.children('tr#row'+rowId);
        // .each(function() {
        //     dataArry.push(($(this).text()));
        // });

        // const $timeArry = dataArry[1].split(' - ');

        console.log($edited);
        console.log();

        $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'method': $('meta[name="_method"]').attr('content')
                    }
            });

        $.ajax({
            type: "PUT",
            url: "/api/vacant/"+rowId,
            data: $edited,
            success: function (edited) {
                console.log(edited);
                targetRow.find('td.day').html($edited.day);
                targetRow.find('td.time').html($edited.vacant_time);
                targetRow.find('td.office').html($edited.designated_office);
            },
            error: function () {
                console.log($edited);
                // alert("An error while saving data");
                jQuery.noConflict();
                    $('#modal-alert-tag').text("Error");
                    $('#modal-alert-phrase').text("An error while saving data");
                    $('#alertModal').fadeIn();
            },
        });
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Delete Data
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $($list).delegate('.triggerDelete', 'click', function (){
        const row = $(this).closest('tr');
        $.ajax({
            type: 'DELETE',
            url: '/api/vacant/'+$(this).data('id'),
            success: function(vacant){
                console.log(vacant);
                row.remove();
            }
        });
    });
    
    
});

