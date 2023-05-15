<?php
function findLargestNumber($arr)
{
  if (empty($arr)) {
    return 0;
  }

  $largest = $arr[0];
  for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $largest) {
      $largest = $arr[$i];
    }
  }

  return $largest;
}

function findSmallestNumber($arr)
{
  if (empty($arr)) {
    return PHP_INT_MAX;
  }

  $smallest = $arr[0];
  for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] < $smallest) {
      $smallest = $arr[$i];
    }
  }

  return $smallest;
}

function findAverage($arr)
{
  if (empty($arr)) {
    return 0;
  }

  $sum = 0;
  for ($i = 0; $i < count($arr); $i++) {
    $sum += $arr[$i];
  }

  return $sum / count($arr);
}

function findLongestString($arr)
{
  if (empty($arr)) {
    return '';
  }

  $longest = $arr[0];
  for ($i = 1; $i < count($arr); $i++) {
    if (strlen($arr[$i]) > strlen($longest)) {
      $longest = $arr[$i];
    }
  }

  return $longest;
}

function findShortestString($arr)
{
  if (empty($arr)) {
    return '';
  }

  $shortest = $arr[0];
  for ($i = 1; $i < count($arr); $i++) {
    if (strlen($arr[$i]) < strlen($shortest)) {
      $shortest = $arr[$i];
    }
  }

  return $shortest;
}


function countVowels($str)
{
  if (empty($str)) {
    return 0;
  }

  $vowels = ['a', 'e', 'i', 'o', 'u'];
  $count = 0;
  for ($i = 0; $i < strlen($str); $i++) {
    if (in_array(strtolower($str[$i]), $vowels)) {
      $count++;
    }
  }

  return $count;
}


function reverseString($str)
{
  if (empty($str)) {
    return '';
  }

  $reversed = '';
  for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $reversed .= $str[$i];
  }

  return $reversed;
}


function sortNumbers($arr)
{
  if (empty($arr)) {
    return [];
  }

  usort($arr, function ($a, $b) {
    return $a - $b;
  });

  return $arr;
}


function sortStrings($arr)
{
  if (empty($arr)) {
    return [];
  }

  usort($arr, function ($a, $b) {
    return strlen($b) - strlen($a);
  });

  return $arr;
}


function findDuplicates($arr)
{
  if (empty($arr)) {
    return [];
  }

  $duplicates = [];
  $counts = array_count_values($arr);
  foreach ($counts as $key => $value) {
    if ($value > 1) {
      $duplicates[] = $key;
    }
  }

  return $duplicates;
}


function removeDuplicates($arr)
{
  if (empty($arr)) {
    return [];
  }

  return array_unique($arr);
}


function sumOfSquares($arr)
{
  if (empty($arr)) {
    return 0;
  }

  $sum = 0;
  for ($i = 0; $i < count($arr); $i++) {
    $sum += $arr[$i] ** 2;
  }

  return $sum;
}


function groupAnagrams($arr) {
  if (empty($arr)) {
    return [];
  }

  $anagrams = [];
  foreach ($arr as $word) {
    $sortedWord = str_split($word);
    sort($sortedWord);
    $sortedWord = implode('', $sortedWord);
    if (!
    array_key_exists($sortedWord, $anagrams)) {
      $anagrams[$sortedWord] = [$word];
    } else {
      $anagrams[$sortedWord][] = $word;
    }
  }

  return array_values($anagrams);
}


function findMedian($arr)
{
  if (empty($arr)) {
    return 0;
  }

  sort($arr);
  $length = count($arr);
  if ($length % 2 == 0) {
    return ($arr[$length / 2 - 1] + $arr[$length / 2]) / 2;
  } else {
    return $arr[($length - 1) / 2];
  }
}


function findPalindromes($arr)
{
  if (empty($arr)) {
    return [];
  }

  $palindromes = [];
  foreach ($arr as $word) {
    if ($word == strrev($word)) {
      $palindromes[] = $word;
    }
  }

  return $palindromes;
}






?>