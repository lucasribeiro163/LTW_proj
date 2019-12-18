'use strict'
var countries;
var country = null, date1 = null, date2 = null, price = null
var found = 0
price = document.getElementById("price");

let input = document.getElementById("myInput");
input.addEventListener('keyup', filterResults); 

let picker = new Lightpick({ field: document.getElementById('datepicker') });

async function getCountries() {
    let request = new XMLHttpRequest();
    request.onload = await function countriesReceived() {
        countries = JSON.parse(this.responseText);

        let ul = document.getElementById("myUL");
        
        for (let i = 0; i < countries.length; i++) {
            let li = document.createElement("li");
            li.textContent = countries[i];
            li.addEventListener("click", function () {
                input.value = countries[i]
                found = 1
                filterResults()
            });
            ul.appendChild(li);
        }
    }
    request.open("get", "../api/getCountries.php", true);
    request.send();
}

function getListReady() {
    let ul = document.getElementById("myUL");
    let li = ul.getElementsByTagName("li");
    if (li.length != 0)//check if it hasn't any elements
        return;
    getCountries();
}

function filterResults() {
    getListReady();
    let filter, ul, li, a, i, txtValue
    let textInput = document.getElementById("myInput");
    filter = textInput.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");//todas as opcoes
    if(found == 0) {
    for (i = 0; i < li.length; i++) {
        a = li[i];
        txtValue = a.textContent || a.innerText;
        if (filter == "")
            li[i].style.display = "none";
        else
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }

    }
    } else {
        for (i = 0; i < li.length; i++) {
            li[i].style.display = "none";
        }
        country = input.value
    }

}

/*
* Picker
*/
function getResults() {
    if (picker.getStartDate() != null)
        date1 = picker.getStartDate().format("YYYY-MM-DD");
    if (picker.getEndDate() != null)
        date2 = picker.getEndDate().format("YYYY-MM-DD");

}

/*
* Final choice
*/
function submit() {
    getResults();  
    window.location = "../../Src/pages/main_page.php?country=" + country + "&date1=" + date1 + "&date2=" + date2 + "&price=" + price.value;
}
