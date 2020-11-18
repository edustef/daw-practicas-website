<?php

/**
 * Finds a word in the whole dictionary
 * Returns the word and which dictionary it was found
 * 
 */
function findWord($word, $dict)
{
  if (isset($dict[$word])) {
    return ["english", $dict[$word]];
  } else {
    $key = array_search($word, $dict);
    if ($key != false) {
      return ["spanish", $key];
    }
  }

  return null;
}
