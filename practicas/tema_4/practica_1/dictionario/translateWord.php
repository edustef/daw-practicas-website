<?php

/**
 * returns an array where index[0] => language(english or spanish) and index[1] => the word translated
 * if the word is not found it will return null;
 */
function translateWord($word, $dict)
{

  if (isset($dict[$word])) {
    return ['english', $dict[$word]];
  } else {
    $spanishWord = array_search($word, $dict);
    if ($spanishWord !== false) {
      return ['spanish', $spanishWord];
    }
  }

  return null;
}
