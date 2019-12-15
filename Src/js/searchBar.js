'use strict'
let countries;
async function getCountries(){
    let request = new XMLHttpRequest();
    request.onload = await function countriesReceived() {
    countries = JSON.parse(this.responseText);

    let ul = document.getElementById("myUL");
    let li = ul.getElementsByTagName("li");
    
    for(let i = 0; i< countries.length; i++)
    {
    let a = document.createElement("a");
    let li = document.createElement("li");
    a.textContent= countries[i];
    a.setAttribute('href', "../../Src/pages/main_page.php?country=" + countries[i]);
    li.appendChild(a);
    ul.appendChild(li);}

    let test = document.getElementsByTagName("li");
    console.log(test);
  }
  request.open("get", "../api/getCountries.php", true);
  request.send();
}

function getListReady(){
    let ul = document.getElementById("myUL");
    let li = ul.getElementsByTagName("li");
    if(li.length!=0)//check if it hasn't any elements
    return;
    getCountries();
}

function filterResults(){
    getListReady();
    let input, filter, ul, li, a, i, txtValue;
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

let input = document.getElementById("myInput");
input.addEventListener('keyup', filterResults) 
  