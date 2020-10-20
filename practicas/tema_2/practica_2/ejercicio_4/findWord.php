<?php

/**
 * returns an array where index[0] => language(english or spanish) and index[1] => the word translated
 * if the word is not found it will return null;
 */
function findWord($randomWord, $word_list_en, $word_list_es)
{
  include_once('getIndexOfWord.php');

  $wordIndex = getIndexOfWord($randomWord, $word_list_en);
  if ($wordIndex != -1) {
    return ['spanish', $word_list_es[$wordIndex]];
  } else {
    $wordIndex = getIndexOfWord($randomWord, $word_list_es);
    if ($wordIndex != -1) {
      return ['english', $word_list_en[$wordIndex]];
    }
  }

  return null;
}
