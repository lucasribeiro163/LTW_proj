/**
 * Changes the white background color to black and the black letters to white on background change
 */
'use strict'

function handleEvent(event) {
  let x = document.body
  x.style.backgroundColor = x.style.backgroundColor == "black" ? "white" : "black"
  x.style.color = x.style.color == "white" ? "black" : "white"
  event.preventDefault()
}

let link = document.querySelector("footer > a")
link.addEventListener('click', handleEvent)