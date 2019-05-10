// Select DOM Items
// querySelector takes a parameter of a class or id, and stores that in the variable
const menuBtn = document.querySelector(".menu-btn");
const menu = document.querySelector(".menu");
const menuBranding = document.querySelector(".menu-branding");
const menuNav = document.querySelector(".menu-nav");
// there is more than one nav item, so querySelectorAll is used.
const navItems = document.querySelectorAll(".nav-item");

// Set Initial State Of Menu
let showMenu = false;

// Add a listener to the button, addEventListener takes a type of event, and a function that runs when that event is triggered.
menuBtn.addEventListener("click", toggleMenu);

function toggleMenu() {
  if (!showMenu) {
    // you can add classes to DOM elements. classList is the array of classes that that object has, and you can use the add method to add a class.
    menuBtn.classList.add("close");
    menu.classList.add("show");
    menuNav.classList.add("show");
    menuBranding.classList.add("show");
    // used querySelectorAll, so need to loop through, as there is more than one item
    navItems.forEach(item => item.classList.add("show"));

    showMenu = true;
  } else {
    menuBtn.classList.remove("close");
    menu.classList.remove("show");
    menuNav.classList.remove("show");
    menuBranding.classList.remove("show");
    // used querySelectorAll, so need to loop through, as there is more than one item
    navItems.forEach(item => item.classList.remove("show"));

    showMenu = false;
  }
}
