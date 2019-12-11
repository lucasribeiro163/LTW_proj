'use strict'
function getCities(){
    let request = new XMLHttpRequest();
  request.addEventListener("load", citiesReceived);
  request.open("get", "../api/getCities.php", true);
  request.send();
}

function citiesReceived() {
    let cities = JSON.parse(this.responseText);
    let list = document.getElementById("suggestions");
    list.innerHTML = ""; // Clean current cities
  
    // Add new suggestions
    for (country in cities) {
      let item = document.createElement("li");
      item.innerHTML = cities[country].name;
      list.appendChild(item);
    }
  }

function getListReady(){
    ul = document.getElementById("myUL");
    var cityList = getCities();
    for(i = 0; i<cityList.length; i++)
    var li = document.createElement("li");
    li.appendChild(document.createTextNode("Four"));
    ul.appendChild(li);
}

function filterResults() {
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