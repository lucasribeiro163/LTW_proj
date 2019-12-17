'use strict'
let countries;
let country=null , date1=null , date2=null , price=null;
price = document.getElementById("price");


let input = document.getElementById("myInput");
input.addEventListener('keyup', filterResults);


let picker = new Lightpick({ field: document.getElementById('datepicker') });

async function getCountries(){
    let request = new XMLHttpRequest();
    request.onload = await function countriesReceived() {
    countries = JSON.parse(this.responseText);

    let ul = document.getElementById("myUL");
    
    for(let i = 0; i< countries.length; i++)
    {
    let li = document.createElement("li");
    li.textContent = countries[i];
    li.addEventListener("click", function() {
        input.value = countries[i];
     });
    ul.appendChild(li);}
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

function filterResults(event){
    getListReady();
    let filter, ul, li, a, i, txtValue
    let textInput = document.getElementById("myInput");
    filter = textInput.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");//todas as opcoes
    for (i = 0; i < li.length; i++) {
        a = li[i];
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
    event.preventDefault()
}

/*
* Picker
*/
function getResults(event){
    if(picker.getStartDate()!=null)
    date1 = picker.getStartDate().format("YYYY-MM-DD");
    if(picker.getEndDate()!=null)
    date2 = picker.getEndDate().format("YYYY-MM-DD");
    event.preventDefault()
}

/*
* Final choice
*/
function submit(event){
    getResults(event);
    window.location="../../Src/pages/main_page.php?country="+country +"&date1=" + date1 + "&date2=" + date2 + "&price="+price.value;
    event.preventDefault()
}

//calender eventListing
let inputDates = document.getElementById("datapicker")
inputDates.addEventListener('click', getResults) 


let submitElement = document.getElementById("submit")
submitElement.addEventListener('click', submit) 
