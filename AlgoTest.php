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

function removeDuplicates2($arr)
{
  $uniqueArray = [];
  foreach ($arr as $element) {
    if (!in_array($element, $uniqueArray)) {
      $uniqueArray[] = $element;
    }
  }
  return $uniqueArray;
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


function groupAnagrams($arr)
{
  if (empty($arr)) {
    return [];
  }

  $anagrams = [];
  foreach ($arr as $word) {
    $sortedWord = str_split($word);
    sort($sortedWord);
    $sortedWord = implode('', $sortedWord);
    if (!array_key_exists($sortedWord, $anagrams)) {
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


function generateArrayWithSumZero($N)
{
  $array = [];
  $sum = 0;

  for ($i = 1; $i < $N; $i++) {
    // Menghasilkan bilangan positif acak dan tambahkan ke array
    $bilangan = rand(1, 100);
    $array[] = $bilangan;
    $sum += $bilangan;
  }

  // Jika N > 1, tambahkan nilai negatif dari jumlah elemen positif ke dalam array
  if ($N > 1) {
    $array[] = -$sum;
  }

  return $array;
}

function faktorial($n)
{
  if ($n == 0 || $n == 1) {
    return 1;
  } else {
    return $n * faktorial($n - 1);
  }
}

function cariPrimaTerbesar($n)
{
  for ($i = $n; $i >= 2; $i--) {
    if (isPrime($i)) {
      return $i;
    }
  }
  return null;
}

function maksimumSubarray($arr)
{
  $n = count($arr);
  if ($n == 0) {
    return 0;
  }

  $maksimum_global = $maksimum_lokal = $arr[0];

  for ($i = 1; $i < $n; $i++) {
    $maksimum_lokal = max($arr[$i], $maksimum_lokal + $arr[$i]);
    $maksimum_global = max($maksimum_global, $maksimum_lokal);
  }

  return $maksimum_global;
}

function tanggalTerdekat($awal, $daftarTanggal)
{
  $tanggalTerdekat = null;

  foreach ($daftarTanggal as $tanggal) {
    if ($tanggal >= $awal && ($tanggalTerdekat === null || $tanggal < $tanggalTerdekat)) {
      $tanggalTerdekat = $tanggal;
    }
  }

  return $tanggalTerdekat;
}

function forLoop($n)
{
  if ($n > 0) {
    forLoop($n - 1);
    echo $n . " ";
  }
}

function cariAngkaSamaArr($arr, $arr2)
{
  $angkaSama = [];

  foreach ($arr as $elem) {
    if (in_array($elem, $arr2) && !in_array($elem, $angkaSama)) {
      $angkaSama[] = $elem;
    }
  }
  return $angkaSama;
}

function mapStoreData($stores)
{
  $store_data = [];

  foreach ($stores as $store) {
    $store_data[$store->area]["total_stores"] = ($store_data[$store->area]["total_stores"] ?? 0) + 1;
    $store_data[$store->area]["stores"][] = $store->name;
  }

  $total_stores = array_sum(array_column($store_data, "total_stores"));

  $output = [
    "total_stores" => $total_stores,
    "areas" => $store_data,
  ];

  return $output;
}

function terbilang($number)
{
  $text = [
    "", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"
  ];
  if ($number < 10) {
    return $text[$number];
  } elseif ($number < 20) {
    return $text[$number - 10] . " belas";
  } elseif ($number < 100) {
    $puluhan = floor($number / 10);
    $sisa = $number % 10;
    return $text[$puluhan] . " puluh" . ($sisa > 0 ? " " . $text[$sisa] : "");
  } elseif ($number < 1000) {
    $ratusan = floor($number / 100);
    $sisa = $number % 100;
    return $text[$ratusan] . " ratus" . ($sisa > 0 ? " " . terbilang($sisa) : "");
  } elseif ($number < 1000000) {
    $ribuan = floor($number / 1000);
    $sisa = $number % 1000;
    return terbilang($ribuan) . " ribu" . ($sisa > 0 ? " " . terbilang($sisa) : "");
  } elseif ($number < 1000000000) {
    $jutaan = floor($number / 1000000);
    $sisa = $number % 1000000;
    return terbilang($jutaan) . " juta" . ($sisa > 0 ? " " . terbilang($sisa) : "");
  } else {
    return "Angka terlalu besar";
  }
}

function swapValues(&$A, &$B)
{
  $A = $A + $B;
  $B = $A - $B;
  $A = $A - $B;
}

function extractPartFromURL($url, $delimiter, $start, $length)
{
  $parts = explode($delimiter, $url);
  $result = implode($delimiter, array_slice($parts, $start, $length));
  return $result;
}
