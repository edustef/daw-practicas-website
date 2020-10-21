<?php

/**
 * Finds a word in the whole dictionary
 * 
 */
function findWord($word, $dict)
{
  $englishDict = array_keys($dict);
  $spanishDict = array_values($dict);

  $wordIndex = getIndexOfWord($word, $englishDict);
  if ($wordIndex != -1) {
    return ["english", $englishDict[$wordIndex]];
  } else {
    $wordIndex = getIndexOfWord($word, $spanishDict);
    if ($wordIndex != -1) {
      return ["spanish", $spanishDict[$wordIndex]];
    }
  }

  return null;
}
