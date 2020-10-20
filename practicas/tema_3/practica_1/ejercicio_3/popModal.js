let showModalBtn = document.getElementById("show-modal-btn");
let modal = document.getElementById("add-word-modal");
let closeModalBtn = document.querySelector("#add-word-modal .modal-close");

showModalBtn.addEventListener("click", openModal);
closeModalBtn.addEventListener("click", closeModal);

function openModal() {
  modal.classList.add("is-active");
}

function closeModal() {
  modal.classList.remove("is-active");
}
