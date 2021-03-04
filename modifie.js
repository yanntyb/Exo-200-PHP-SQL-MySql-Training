let row = document.getElementsByClassName("id");

for(let slot in row){
    console.log(row[slot]);
    try{
        let id =   parseInt(row[slot].getElementsByTagName("span")[0].innerHTML);
        let link = document.createElement("a");
        link.setAttribute("href", "./modif.php?id=" + id);
        link.innerHTML = "Modif";
        link.style.color = "black";
        row[slot].appendChild(link);
    }
    catch{}
}