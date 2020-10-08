let theme = localStorage.getItem("theme");
let htmlEl = document.querySelector("html");

if (theme) {
  htmlEl.dataset.theme = theme;
}

document.getElementById("theme-toggler").addEventListener("click", (e) => {
  e.preventDefault();

  e.target.classList.toggle("fa-sun");
  e.target.classList.toggle("fa-moon");

  htmlEl.dataset.theme = htmlEl.dataset.theme == "dark" ? "light" : "dark";

  localStorage.setItem("theme", htmlEl.dataset.theme);
});
