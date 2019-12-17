'use strict'

let rating = document.getElementById("StarRating");
let classification;
let houseID = document.getElementById("houseId").textContent;
getClassification();

async function getClassification(){
    let request = new XMLHttpRequest();
    request.onload = function classificationReceived() {
    classification = JSON.parse(this.responseText);
    classification = Math.ceil(Number(classification[0]));

    insertStars();
    
  }
  request.open("GET", "../api/getClassification.php?"+ encodeForAjax({houseId: houseID}), true);
  request.send();
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  }

function insertStars(){
    let tag;
    var i=0
    for( ; i<classification ; i++)//add full stars
    {
        tag= document.getElementById("StarRating" + i.toString());
        tag.innerHTML = '<i class="fas fa-star"></i>';
    }

    classification = 5 - classification; //get rest of stars

    for(i=0 ; i<classification ; i++)//create the rest of empty stars
    {
        tag= document.getElementById("StarRating" + (i+5-classification).toString());
        tag.innerHTML = '<i class="far fa-star"></i>';
    }
}