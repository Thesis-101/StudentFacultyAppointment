$(function(){
    const list = $('#report-list')

    const filter = $('#filter');
    const status = $('#filterStatus');
    // const urlParams = new URLSearchParams(window.location.search);
    // const status = urlParams.get('filterStatus');

    let data = [];

    let rowTemplate =   '<tr data-id={{id}} id=row{{id}} >' +
                            '<td class="student-name">{{students.name}}</td>' +
                            '<td class="day">{{day}}</td>' +
                            '<td class="time">{{time}}</td>' +
                            '<td class="date">{{date}}</td>' +
                            '<td class="request-type">{{request_type}}</td>' +
                            '<td class="status">{{status}}</td>'+
                        '</tr>' 

    function appendAppointment(details){
                list.prepend(Mustache.render(rowTemplate,details));
            }

    

    $.ajax({
        type: 'GET',
        url: '/admin/allRequest',
        success: function(appointments){
            $.each(appointments, function(i, appointment){
                data.push(appointment)
            });
            console.log(data);
            console.log(status);
        }
    });

    $('#filter_form').submit(function(e){
        list.empty();
        e.preventDefault();
        $.each(data, function(i, details){
            if(details.status == status.val()){
                appendAppointment(details);
            }
            if(status.val() == "all"){
                appendAppointment(details);
            }
        });
       
    });


  $('#test').on('click',function (){
    var table = $(this).next().next('.toExport_tbl');
        console.log(table);
        if(table && table.length){
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Transaction_Reports_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                fileext: ".xls",
                exclude_img: false,
                exclude_links: false,
                exclude_inputs: false,
                preserveColors: false
            });
        }
  });



});