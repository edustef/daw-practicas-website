<?php

function getIndexOfWord($word, $dictionary)
{
  for ($i = 0; $i < count($dictionary); $i++) {
    if ($dictionary[$i] == $word) {
      return $i;
    }
  }

  return -1;
}
