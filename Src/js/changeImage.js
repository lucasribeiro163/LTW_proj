let imageInterval = setInterval(changeImage, 1000);

function changeImage() {    
    document.getElementById("defaultImage").src = document.getElementById("defaultImage").src 
    == "../images/houses/thumbs_small/default1.jpg" ? "../images/houses/thumbs_small/default.jpg" :
    "../images/houses/thumbs_small/default1.jpg";
}

function stopChangeImage() {
  clearInterval(imageInterval);
}