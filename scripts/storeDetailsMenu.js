let detailsElems = document.querySelectorAll("details");
let navbarEl = document.getElementById("navbar");
let navbarScrollTop = sessionStorage.getItem("navbarScrollTop");

// Store the details open property in sessions so if it was opened before reloading or navigating to other page it will still be opened or closed
detailsElems.forEach((element) => {
  let isOpen = sessionStorage.getItem(element.id) == "true";
  if (isOpen) {
    element.open = isOpen;
  }

  element.addEventListener("toggle", (event) => {
    sessionStorage.setItem(event.target.id, event.target.open);
  });
});

// This registers the scroll position so if we reload or change the page the menu will be in the same position
navbarEl.addEventListener("scroll", (event) => {
  sessionStorage.setItem("navbarScrollTop", event.target.scrollTop);
});

// This must be placed after the details are expanded
// If we put it before the details get expanded the scroll doesn't exist and scrollTop always return 0
// Once the details get expanded the scroll apears therfore we can set the scrollTop to the last value before reload
if (navbarScrollTop) {
  navbarEl.scrollTop = navbarScrollTop;
}
