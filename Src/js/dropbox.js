'use strict'

/* When the user is over the username
  shows the dropdown content */
function handleEventDrop(event) {
  let mydropdown = document.getElementById("myDropdown")
  mydropdown.classList.toggle("show");
  event.preventDefault()
}

//puts the dropdown visible when mouse is over
let dropdown = document.querySelector("#options p")
dropdown.addEventListener('mouseover', handleEventDrop) 

function handleEventUp(event) {
  let dropdown = document.getElementById("myDropdown")
  dropdown.classList.toggle("show"); 
  let dropdowns = dropdown.children
  for (let i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      openDropdown.classList.remove('show');
  }  
  event.preventDefault()
}

//puts the dropdown invisible when mouse is not over
let dropdown1 = document.querySelector("#options p")
dropdown1.addEventListener('click', handleEventUp) 
  