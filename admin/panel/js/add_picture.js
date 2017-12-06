let id = 1;
function add_picture() {
    let div = document.createElement("div");
    div.setAttribute("class", "new-pic");
    div.setAttribute("id", "div-pic-" + id);
    document.getElementById("pictures").appendChild(div);
    let input = document.createElement("input");
    input.setAttribute("type", "file");
    input.setAttribute("name", "pic"+id);
    input.setAttribute("id", "pic"+id);
    document.getElementById("div-pic-" + id).appendChild(input);
    id++;
    document.getElementById("number").value=id;  
}

document.getElementById('add_new_picture').addEventListener('click', add_picture);
