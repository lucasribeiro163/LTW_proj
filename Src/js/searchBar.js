'use strict'
function getCities(){
    let request = new XMLHttpRequest();
  request.addEventListener("load", citiesReceived);
  request.open("get", "../api/getCities.php", true);
  request.send();
  console.log(request.responseText)
}

function citiesReceived() {

    let cities = JSON.parse(this.responseText);
  
    // Add new cities
    for (city in cities) {
      let item = document.createElement("li");
      item.innerHTML = cities[city].name;
      list.appendChild(item);
    }
  }

function getListReady(){
    var ul = document.getElementById("myUL");
    var li = ul.getElementsByTagName("li");
    if(li && li.length)//check if it hasn't any elements
    return;
    var cityList = getCities();
    for(var i = 0; i<cityList.length; i++)
    var li = document.createElement("li");
    li.appendChild(document.createTextNode("Four"));
    ul.appendChild(li);
}

function filterResults() {
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