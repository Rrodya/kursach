
let box = document.querySelector('.box table');
let arr = [];
function setData(name){
    box.innerHTML = `<tr><td>${name}</td></tr>`
}

fetch('http://learn/index.php', {
    method: 'GET',
    mode: 'cors',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
})
.then(res => res.json())
.then(data => {
    let list = '';
    for(let key in data){
        list+='<div>';
        list+=data[key][key];
        list+='</div>';
        list+='<table><tr><th>id</th><th>name</th><th>ctg</th></tr>';

        for(let key1 in data[key]){
            list+='<tr><th>'+data[key][key1].id+'</th><th>'+data[key][key1].name+'</th><th>'+data[key][key1].category+'</th></tr>';
        }
        list+='</table>';
    }
    box.innerHTML=list;
});
