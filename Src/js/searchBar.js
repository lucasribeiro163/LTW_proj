'use strict'
 var cities;
async function getCities(){
    let request = new XMLHttpRequest();
    request.onload = await function citiesReceived() {
    cities = JSON.parse(this.responseText);

    var ul = document.getElementById("myUL");
    var li = ul.getElementsByTagName("li");
    
    for(var i = 0; i<cities.length; i++)
    {
    var a = document.createElement("a");
    var li = document.createElement("li");
    a.textContent= cities[i];
    a.setAttribute('href', "../../Src/pages/main_page.php");
    li.appendChild(a);
    ul.appendChild(li);}

    var test = document.getElementsByTagName("li");
    console.log(test);
  }
  request.open("get", "../api/getCities.php", true);
  request.send();
}

function getListReady(){
    var ul = document.getElementById("myUL");
    var li = ul.getElementsByTagName("li");
    if(li.length!=0)//check if it hasn't any elements
    return;
    getCities();
}

function filterResults(){
    getListReady();
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");//todas as opcoes
    for (i = 0; i < li.length; i++) {
        a = li[i];
        console.log(a);
        txtValue = a.textContent || a.innerText;
        if(filter =="")
            li[i].style.display = "none";
        else
        if(txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
        
    }
}