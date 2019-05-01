/*
https://developer.mozilla.org/en-US/docs/Web/Events
https://www.cambiaresearch.com/articles/15/javascript-char-codes-key-codes
*/

/*var b1 = document.getElementsByTagName("button")[0];
b1.addEventListener("mouseenter",function () {
    console.log("mouse entered !")
})*/


var button = document.getElementById ("enter");
var input = document.getElementById("user-input");
var ul = document.getElementsByTagName("ul")[0];
var listitems = document.getElementsByTagName("li");

function inputlength(){
    if (input.value.length > 0 )
        return true;
    return false;
}

function additemafterclick(){
    if(inputlength())
        createlist();
}

function additemafterpress(e){
    if(inputlength()  && e.charCode === 13)
        createlist();
}

function createlist() {
    var li = document.createElement("li");
    li.append(document.createTextNode(input.value));
    ul.append(li);
    input.value = '';
}

function isDone(){
    this.classList.toggle("done");
}

button.addEventListener("click",additemafterclick);
input.addEventListener("keypress",additemafterpress);

for(var i=0; i<listitems.length; i++)
    listitems[i].addEventListener("click",isDone);