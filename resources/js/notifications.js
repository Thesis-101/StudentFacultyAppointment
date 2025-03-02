
$(function (){
    const list = $('#notification-list');
    const badge = $('.badge');
    let notificationStatus;
    let data = [];
    const notificationBtn = $('#notification');

    let rowTemplate =  '<tr  data-id={{id}}>' +
                            '<td>{{message}}</td>' +
                            '<td>{{date}}</td>' +
                            '<td class="bg-{{state}}">{{appointment}}</td>'+
                        '</tr>'
    
    // '<div data-id={{id}} class="row mb-0 notification-msg">'+
    //                         '<div class="col-md-12 bg-light pt-3">'+
    //                         '<h6 class="text-bg-{{state}} py-1 px-1">{{message}}</h6>' +
    //                             '<p>{{date}}</p>'+
    //                         '</div>'+
    //                     '</div>'
                       
    
    function addNotification(details){
             list.prepend(Mustache.render(rowTemplate,details));
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Display All Notifications
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        type: 'GET',
        url: '/api/notifications',
        success: function(notifications){
            $.each(notifications, function(i, notification){
                if(notification.state == null){
                    notification.appointment = "Pending";
                    addNotification(notification);
                }
                if(notification.state == "success"){
                    notification.appointment = "Accepted";
                    addNotification(notification);
                }
                if(notification.state == "danger"){
                    notification.appointment = "Declined";
                    addNotification(notification);
                }
                if(notification.status == "unread"){
                    data.push(i);
                }
                
                // show(vacant_details.vacant_id, vacant_details.vacant_time);
                // setItem(vacant_details.vacant_id)
            });
            if(data.length > 0){
                badge.text(data.length);
            }else{
                badge.remove();
            }
        }
    });

    
    
});