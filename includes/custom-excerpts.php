<?php
/**
* -----------------------------------------------------------------------------------
* 12.0 - limit the word count in excerpts
* -----------------------------------------------------------------------------------
*/
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}