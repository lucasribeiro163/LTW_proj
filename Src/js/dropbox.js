'use strict'

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.userDropdown')) {
    let dropdowns = document.getElementsByClassName("dropdown-content");
    for (let i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
/*
function handleEventDrop(event) {
  console.log(3)
  let dropdowns = document.getElementsb Byid("myDropdown");
  for (let i = 0; i < dropdowns.length; i++) {
    let openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
      openDropdown.classList.remove('show');
    }
  }

  event.preventDefault()
}

let dropdown = document.querySelector("#options p")
dropdown.addEventListener('click', handleEventDrop) */