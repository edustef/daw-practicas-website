let navbar = document.getElementById("navbar");
let fakeNavbar = document.getElementById("fake-navbar");
let spacer = document.getElementById("spacer");
let toggleBtn = document.getElementById("toggle-navbar");

let isNavbarClosed = sessionStorage.getItem("isNavbarClosed");

// check if session value exists at all otherwise create it
if (isNavbarClosed == null) {
  sessionStorage.setItem("isNavbarClosed", false);
  isNavbarClosed = false;
} else {
  // if it exists check if the value is true or false
  isNavbarClosed = isNavbarClosed == "true";
}

// toggle the navbar based on session on first time visit
if (isNavbarClosed) {
  closeNavbar(toggleBtn.querySelector(".icon i"));
} else {
  openNavbar(toggleBtn.querySelector(".icon i"));
}

let mediaQuery = window.matchMedia("(min-width: 1024px)");
mediaQuery.addEventListener("change", (e) => {
  if (e.matches) {
    openNavbar(toggleBtn.querySelector(".icon svg"));
  } else {
    closeNavbar(toggleBtn.querySelector(".icon svg"));
  }
});

// toggle the navbar on button click
document.getElementById("toggle-navbar").addEventListener("click", () => {
  isNavbarClosed = sessionStorage.getItem("isNavbarClosed") == "true";
  if (isNavbarClosed) {
    openNavbar(toggleBtn.querySelector(".icon svg"));
  } else {
    closeNavbar(toggleBtn.querySelector(".icon svg"));
  }
  sessionStorage.setItem("isNavbarClosed", !isNavbarClosed);
});

function openNavbar(iconEl) {
  navbar.classList.remove("is-hidden");
  fakeNavbar.classList.remove("is-hidden");
  spacer.classList.add("is-hidden");
  iconEl.classList.add("fa-times");
  iconEl.classList.remove("fa-bars");
  sessionStorage.setItem("isNavbarClosed", false);
}

function closeNavbar(iconEl) {
  navbar.classList.add("is-hidden");
  fakeNavbar.classList.add("is-hidden");
  spacer.classList.remove("is-hidden");
  iconEl.classList.remove("fa-times");
  iconEl.classList.add("fa-bars");
  sessionStorage.setItem("isNavbarClosed", true);
}
