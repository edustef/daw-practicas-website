document.addEventListener('DOMContentLoaded', async () => {
  document.getElementById('new-game-btn').addEventListener(getPuzzledWord());
});

function newGame(e) {}

function getPuzzledWord() {
  let formData = new FormData();
  formData.append('action', 'getPuzzledWord');
  fetch('hangman/hangmanController.php', {
    method: 'POST',
    data: formData,
  });
  document.getElementById('puzzled-word').textContent = data;
}
