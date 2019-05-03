/*
https://developer.mozilla.org/en-US/docs/Web/Events
https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
*/

/*var b1 = document.getElementsByTagName("button")[0];

b1.addEventListener("mouseenter",function () {
    console.log("mouse entered !")
})*/


var button = document.getElementById("enter");
var input = document.getElementById("user-input");
var ul = document.getElementsByTagName("ul")[0];
var listItems = document.getElementsByTagName("li");
var items = document.getElementsByClassName("del");

function inputLength(){
    if(input.value.length > 0 )
        return true;
    return false;
}
function createListItem(){
    var li = document.createElement("li");
    var btn = document.createElement("button");
    li.append(document.createTextNode(input.value));
    btn.append(document.createTextNode("delete"));
    btn.classList.add("del");
    li.append(btn);
    ul.append(li);
    input.value = '';
    addDoneListener();
    addDeleteListener();
}
function addItemAfterClick(){
        if(inputLength()) {
            createListItem();
        }
}
function addItemAfterPress(e) {
    if(inputLength() && e.which === 13) {
        createListItem();
    }
}
function isDone(){
    this.classList.toggle("done");
}

function deleteitem(){
    this.parentElement.remove("del");
}

button.addEventListener("click",addItemAfterClick);
input.addEventListener("keypress",addItemAfterPress);

function addDoneListener()
{
    for (var i = 0; i < listItems.length; i++)
    {
        listItems[i].addEventListener("click", isDone);
    }
}

function addDeleteListener()
{
    for(var j=0;j<items.length;j++)
    {
        items[j].addEventListener("click",deleteitem);
    }
}

addDoneListener();
addDeleteListener();
