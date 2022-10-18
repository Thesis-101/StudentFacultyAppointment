
export function show(id, time){
    const $id = $('#userInstitution_id');
    const $day = $('#day');
    const $time1 = $('#time1');
    const $time2 = $('#time2');
    const $office = $('#office');
    const $target = $('.target-bttn');

    let $time = time;
    const $timeArry = $time.split(' - ');
    console.log($timeArry);

    $target.attr("id","edit");
    $target.text("Save Update");
//     // const rowData = document.getElementById("data"+id);
//     // let oneRow = rowData.getElementsByTagName("td");
//     // let selectedTd = [];

//     // for (let i = 0; i<4; i++){
//     //     let a = oneRow[i].innerText;
//     //     selectedTd.push(a.toString());
//     // }

//     // facultyId.value = selectedTd[0]; 
//     // dayId.value = selectedTd[1]; 
//     // vacantId.value = selectedTd[2]
//     // officeId.value = selectedTd[3]; 


//     // console.log(selectedTd);
}

export function getId(id){
    let dataId = id;

    console.log(dataId);
}
