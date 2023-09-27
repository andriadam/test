<?php
// 1 .Diketahui 
// A = 8
// B = 9
// Tukar nilai dari A dan B tanpa menambah variable baru.
$A = 8;
$B = 9;
$A = $A + $B;
$B = $A - $B;
$A = $A - $B;

echo $A;
echo "<br>";
echo $B;
echo "<br>";


echo "</br>";
echo "</br>";

// 2. Diketahui sebuah string, "https://www.kompas.com/category/read/yyyy/mm/dd/some_id/this_is_a_title"
// Ekstrak : yyyy/mm/dd/some_id
// Contoh : https://www.kompas.com/sports/read/2021/03/22/09400048/gm-irene-sukandar-vs-dewa-kipas-pembuktian-status-jin-atau-jenius.
// Hasil : 2021/03/22/09400048


// $txt = "https://www.kompas.com/sports/read/2021/03/22/09400048/gm-irene-sukandar-vs-dewa-kipas-pembuktian-status-jin-atau-jenius";
// echo substr($txt, 35, 19);

$url = "https://www.kompas.com/sports/read/2021/03/22/09400048/gm-irene-sukandar-vs-dewa-kipas-pembuktian-status-jin-atau-jenius.";

// Menghapus bagian awal URL yang tidak diperlukan
$cleaned_url = str_replace("https://www.kompas.com/", "", $url);

// Menggunakan explode untuk memecah URL berdasarkan '/'
$parts = explode('/', $cleaned_url);


// echo '<pre>';
// var_dump($parts);

// echo '<pre>';
// var_dump(array_slice($parts, 2, 4));
// die;

// Mengambil bagian yang sesuai
$date_and_id = implode('/', array_slice($parts, 2, 4));

echo $date_and_id;

echo "</br>";
echo "</br>";

// 3. Buatlah function/pseudocode untuk mengubah dari angka ke text.
// Misal 204.780 : dua ratus empat ribu tujuh ratus delapan puluh
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
$n = 2047817;
echo $n;
echo "<br>";
echo ucwords(terbilang(2047817));

echo "</br>";
echo "</br>";

// 4. Diberikan bilangan N (1 <= N <= 100), yang mengembalikan array berjumlah N yang "berbeda" dan jika dijumlah hasilnya 0. Buatlah function/pseudocode nya.
// Misal 
// N = 4 => [2,5,1,-8]
// N = 3 => [1,3,-4]
function generateArray($N)
{
  if ($N < 2) {
    return null;
  }

  $array = array();
  $total = 0;

  for ($i = 1; $i < $N; $i++) {
    $random_number = rand(1, 100);
    $array[] = $random_number;
    $total += $random_number;
  }

  $array[] = -$total;

  return $array;
}
$n = 4;
echo '<pre>';
var_dump(generateArray($n));
die;

// 5. Jika saya mendapatkan 10%, lalu hilang 10%. Apakah saya untung atau rugi atau tidak keduanya? Jelaskan
// Rugi karena ketika mendapatkan 10% dari sebelum dan sesudah mendapatkan keuntungan maka 10% kedua akan 
// lebih besar dari 10% keuntungan sebelumnya
