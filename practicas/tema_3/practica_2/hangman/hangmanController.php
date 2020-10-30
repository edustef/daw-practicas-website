<?php
include('dictionary.php');

if (!isset($_SESSION['puzzleWord'])) {
  $_SESSION['puzzledWord'] = '';
}

if (!isset($_SESSION['word'])) {
  $randomWord = $dictionary[rand(0, count($dictionary) - 1)];
  $_SESSION['word'] = $randomWord;
}

if (isset($_POST['action'])) {
  $res = 'error';
  switch ($_POST['action']) {
    case 'getPuzzledWord':
      $_SESSION['puzzledWord'] = createPuzzledWord();
      $res = $_SESSION['puzzledword'];
      break;
    case 'checkLetterInPuzzledWord':
      if (strpos($_SESSION['puzzledWord'], $_POST['letter']) === false) {
        $_SESSION['puzzledWord'] = completeLetterInPuzzledWord($_SESSION['word'], $_SESSION['puzzledWord'], $_POST['letter']);
      }
      break;
  }

  echo $res;
}


function createPuzzledWord()
{
  $puzzledWord = $_SESSION['word'];
  // get the unique letters in word
  $letters = array_unique(explode('', $puzzledWord));
  // decide how many letter to remove
  $numOfLettersToRemove = rand(2, count($letters) - 3);

  // filter what letters to keep 
  for ($i = 0; $i < $numOfLettersToRemove; $i++) {
    unset($letters[rand(0, count($letters) - 1)]);
    $letters = array_values($letters);
  }

  // create the puzzeled word
  for ($i = 0; $i < count($puzzledWord) - 1; $i++) {
    if (!in_array($puzzledWord[$i], $letters))
      $puzzledWord[$i] = '_';
  }

  return $puzzledWord;
}

// if it doesnt exist in puzzled word but it exists in the actula word the letter is correct
function isLetterCorrect()
{
  return  strpos($_SESSION['puzzledWord'], $_POST['letter']) === false && strpos($_SESSION['word'], $_POST['letter']) !== false;
}

function completeLetterInPuzzledWord()
{
  for ($i = 0; $i < count($_SESSION['word']) - 1; $i++) {
  }
}
