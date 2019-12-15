'use strict'

if(document.getElementsByClassName("lists")){
  startPeriodicChange()
}

let imageInterval
function startPeriodicChange(){
  imageInterval = setInterval(changeImage, 9000);
}

function changeNumber() {
  // Check to see if the number has been initialized
  if ( typeof changeNumber.counter == 'undefined' ) {
      // if it isn't initialized it set to 0, to set the new picture 1
      changeNumber.counter = 0;
  }

  // Do something stupid to indicate the value
  return (++changeNumber.counter % 2);
}

function changeImage() {  
    let defaultImages = document.getElementsByClassName("defaultImage")
    let random = changeNumber()
    for(let i = 0; i < defaultImages.length; i++) {
      console.log(defaultImages.item(i).src)
      defaultImages.item(i).src = defaultImages.item(i).src = '../images/houses/thumbs_small/default' + random + '.jpg'
    }
}

function stopChange(){
  clearInterval(imageInterval)
}


if(document.getElementById("Info") ){
  startPeriodicChangeList()
}

let ListInterval
function startPeriodicChangeList(){
  ListInterval = setInterval(changeImage, 9000);
}

function changeImage() {  
  let defaultImages = document.getElementsByClassName("defaultImage")
  let random = changeNumber()
  for(let i = 0; i < defaultImages.length; i++) {
    console.log(defaultImages.item(i).src)
    defaultImages.item(i).src = defaultImages.item(i).src = '../images/houses/thumbs_medium/default' + random + '.jpg'
  }
}