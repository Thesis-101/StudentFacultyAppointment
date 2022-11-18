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
                            '<td class="remarks">{{remarks.remarks}}</td>'+
                        '</tr>' 

    function appendAppointment(details){
                list.prepend(Mustache.render(rowTemplate,details));
            }

    

    $.ajax({
        type: 'GET',
        url: '/faculty/report-remarks',
        success: function(appointments){
            $.each(appointments, function(i, appointment){
                if(appointment.students != null){
                    data.push(appointment);
                }
            });
            console.log(data);
            console.log(status);
        }
    });


    


    function filterMonth(month){
        let filterMonth = (new Date(month)).getMonth();
        return filterMonth;
    }

    function filterYear(year){
        let filterYear = (new Date(year)).getFullYear();
        return filterYear;
    }

    function determineFilterMonth(month, year){
        const dataMonth = $('#dataMonth');
        const date = new Date(dataMonth.val());
        console.log(month);
        console.log(year);
        console.log((new Date(dataMonth.val()).getMonth()));
        console.log((new Date(dataMonth.val()).getFullYear()));
        if(month == date.getMonth() && year == date.getFullYear()){
            return true;
        }else if(dataMonth.val() == ''){
            return "empty";        
        }else{
            return false;
        }
        
    }
    
    $('#filter_form').submit(function(e){
        list.empty();
        e.preventDefault();
        $.each(data, function(i, details){
        
            
            if(details.status == status.val()){
                if(determineFilterMonth(filterMonth(details.date),filterYear(details.date)) == true){
                    appendAppointment(details);
                    
                }else if(determineFilterMonth(filterMonth(details.date),filterYear(details.date)) == "empty"){
                    appendAppointment(details);
                }else{
                    return;
                }
    
            }
            if(status.val() == "all"){
                if(determineFilterMonth(filterMonth(details.date),filterYear(details.date)) == true){
                    appendAppointment(details);
                    
                }else if(determineFilterMonth(filterMonth(details.date),filterYear(details.date)) == "empty"){
                    appendAppointment(details);
                }else{
                    return;
                }

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