'use strict'

let rating = document.getElementById("StarRating");

if(document.getElementById("houseId")){
  houseID = document.getElementById("houseId").textContent;
  getClassification();
}

let comments_array = [];
var counter = 0; 
let classification;


//*************Function section*************/
/*
*Ajax section
*/
async function getClassification(){
    let request = new XMLHttpRequest();
    request.onload = function classificationReceived() {
    let classification = JSON.parse(this.responseText);
    classification = Math.ceil(Number(classification[0]));

    insertStars(classification , "StarRating");
    
  }
  request.open("GET", "../api/getClassification.php?"+ encodeForAjax({houseId: houseID}), true);
  request.send();
}

async function getComments(){
  console.log(counter);
  var tempTag=document.getElementById("houseComments");

  if(counter%2==1){
    counter++;
    tempTag.style.display ='none';
    tempTag=document.getElementById("ShowComments");
    tempTag.innerHTML= "Show Comments";
    return;
  }
  else if(comments_array.length != 0) 
  {
    counter++;
    tempTag.style.display ='';
    tempTag=document.getElementById("ShowComments");
    tempTag.innerHTML = "Hide Comments";

    return;
  }
  tempTag=document.getElementById("ShowComments");
  tempTag.innerHTML= "Hide Comments";
  counter++;
  let request = new XMLHttpRequest();
  request.onload = function classificationReceived() {
  comments_array = JSON.parse(this.responseText);
    insertComments(comments_array);
}
request.open("GET", "../api/getComments.php?"+ encodeForAjax({houseId: houseID}), true);
request.send();
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  }

/*
*Useful Functions
*/
function insertStars(classification , name){
    let tag;
    var i=0

    if(classification == 0 || classification == null || classification == 'null')
    {
      for(var i=0 ; i<5 ; i++){
        tag= document.getElementById(name + i.toString());
        tag.innerHTML = '<i class="far fa-star"></i>';
      }
    }


    for( ; i<classification ; i++)//add full stars
    {
        tag= document.getElementById(name + i.toString());
        tag.innerHTML = '<i class="fas fa-star"></i>';
    }

    classification = 5 - classification; //get rest of stars

    for(i=0 ; i<classification ; i++)//create the rest of empty stars
    {
        tag= document.getElementById(name + (i+5-classification).toString());
        tag.innerHTML = '<i class="far fa-star"></i>';
    }
}

function insertComments(comments){
  let tag= document.getElementById("houseComments");
  
  if(comments.length==0) //if empty
  {
    tag.innerHTML = 'No comments available';
    return ;
  }

  for( var i=0 ; i < comments.length ; i++){

    //create list element
    var li=document.createElement('li');
    
    //get all atributes
    var username = comments[i][2]['username'];
    //var picture = comments[i][1]['picture']; on comments bc there is no other peoples picture
    var classification = comments[i][3]['classification'];

    //create img
    var _img=document.createElement('img');
    //if(picture == 0)
    _img.src="../images/person/thumbs_small/default.jpg";
    //else _img.src="../images/houses/thumbs_small/"+username+".jpg";
    li.appendChild(_img);//append image
    
    //create info div
    var div=document.createElement('div');
    div.setAttribute("id", "comment_article");

    var _description = document.createElement('p');
      _description.innerHTML = comments[i][0]['descricao'];
    var _username = document.createElement('h3');
      _username.innerHTML = username;

//criar 5 coisos de estrelas mas rip teem de ser difs
    var classificationSection = document.createElement('div');
    classificationSection.setAttribute("id", "comment_stars");

    for( var m=0 ; m<5; m++){//create 5 stars with unique ids
    var starRating=document.createElement('a');
    starRating.setAttribute("id",username + m);
    classificationSection.appendChild(starRating);
    }

    div.appendChild(classificationSection);
    div.appendChild(_username);
    div.appendChild(_description);

    li.appendChild(div);
    tag.appendChild(li);

    insertStars(classification , username);
  }
}
