let buttons = document.querySelectorAll("input[type=checkbox]");
let supp = document.getElementById("suppress");
let tabSupp = [];

for(let button of buttons){
    button.addEventListener("click", function(){
        let elem = button.nextElementSibling;
        let id = parseInt(elem.innerHTML);
        if(tabSupp.includes(id)){
            tabSupp.splice(tabSupp.indexOf(id), 1);
            elem.style.color = "black";
        }
        else{
            tabSupp.push(id);
            elem.style.color = "red";
        }
    })
}

supp.addEventListener("click", function(){
    let json = JSON.stringify({
        "id" : tabSupp
    });
    console.log(json);
    send(json);
})


function send(json){
    let request = new XMLHttpRequest()
    request.open("POST", "delete.php", true)
    request.setRequestHeader("Content-type", "application/json")
    request.send(json)
}