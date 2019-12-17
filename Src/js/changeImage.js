'use strict'
/*if we have lists being display, change images default periodic */
if(document.getElementsByClassName("lists")){
  startPeriodicChange()
}

let imageInterval
function startPeriodicChange(){
  imageInterval = setInterval(changeImageSmall, 9000);
}

function changeNumber() {
  // Check to see if the number has been initialized
  if ( typeof changeNumber.counter == 'undefined' ) {
      // if it isn't initialized it set to 0, to set the new picture 1 (0 is the on before time to update ended)
      changeNumber.counter = 0;
  }
  //value can only by between 0 and 2
  return (++changeNumber.counter % 3);
}

function changeImageSmall() {  
    let defaultImages = document.getElementsByClassName("defaultImage")
    let random = changeNumber()
    for(let i = 0; i < defaultImages.length; i++) {
      defaultImages.item(i).src = defaultImages.item(i).src = '../images/houses/thumbs_small/default' + random + '.jpg'
    }
}

function stopChange(){
  clearInterval(imageInterval)
}


if(document.getElementsByClassName("Info") ){
  startPeriodicChangeList()
}

let ListInterval
function startPeriodicChangeList(){
  ListInterval = setInterval(changeImage, 9000);
}

function changeImage() {  
  let defaultImages = document.getElementsByClassName("defaultImageMedium")
  let random = changeNumber()
  for(let i = 0; i < defaultImages.length; i++) {
    defaultImages.item(i).src = defaultImages.item(i).src = '../images/houses/thumbs_medium/default' + random + '.jpg'
  }
}