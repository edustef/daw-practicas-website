let theme = localStorage.getItem("theme");
let htmlEl = document.querySelector("html");
let themeToggler = document.getElementById("theme-toggler");

if (theme) {
  htmlEl.dataset.theme = theme;
  if (theme == "dark") {
    themeToggler.childNodes[0].classList.remove("fa-moon");
    themeToggler.childNodes[0].classList.add("fa-sun");
  } else {
    themeToggler.classList.remove("fa-sun");
    themeToggler.classList.add("fa-moon");
  }
}

themeToggler.addEventListener("click", (e) => {
  e.target.childNodes[0].classList.toggle("fa-sun");
  e.target.childNodes[0].classList.toggle("fa-moon");

  htmlEl.dataset.theme = htmlEl.dataset.theme == "dark" ? "light" : "dark";

  localStorage.setItem("theme", htmlEl.dataset.theme);
});
