'use strict'

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function handleEventDrop(event) {
  let dropdown = document.getElementById("myDropdown")
  dropdown.classList.toggle("show");
  let dropdowns = dropdown.children
  for (let i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      console.log(openDropdown)
      openDropdown.classList.remove('show');
  }  
  event.preventDefault()
}

let dropdown = document.querySelector("#options p")
dropdown.addEventListener('click', handleEventDrop) 