

$( function () {

    const list = $('#transaction-list');
    const totalTransactions =$('#totalTransactions');
    const pendingTransactions =$('#pendingTransactions');
    const acceptedTransactions =$('#acceptedTransactions');
    const declinedTransactions =$('#declinedTransactions');
    let pending = 0;
    let declined = 0;
    let accepted = 0;
    let total = 0;
    let rowId;
    const requesitor = $('#requesitor');

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="faculty-name">{{users.name}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="office">{{vacant_details.designated_office}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="status">{{status}}</td>' +
                            '<td class="delete">'+
                            '<button class="btn btn-sm btn-primary me-1">Edit</button>'+
                            '<button class="btn btn-sm btn-danger">Delete</button>'+
                            '</td>' +
                        '</tr>' 

    function appendTransactions(details){
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
                if(vacant_details.status == "pending"){
                    pending++;
                }else if (vacant_details.status == "Accepted"){
                    accepted++;
                }else if(vacant_details.status == "Declined"){
                    declined++;
                }

                appendTransactions(vacant_details);
                total++
            });
            totalTransactions.text(total);
            pendingTransactions.text(pending)
            acceptedTransactions.text(accepted);
            declinedTransactions.text(declined);
        }
    });

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

    // $('.delete').click(function(){
    //     const row = $(this).closest('tr');
    //     $.ajax({
    //         type: 'DELETE',
    //         url: '/admin/delete/'+$(this).data('id'),
    //         success: function(data){
    //             row.remove();
    //         }
    //     });
    // });
});