<?php

// 1 .Diketahui 
// A = 8
// B = 9
// Tukar nilai dari A dan B tanpa menambah variable baru.

// 2. Diketahui sebuah string, "https://www.kompas.com/category/read/yyyy/mm/dd/some_id/this_is_a_title"
// Ekstrak : yyyy/mm/dd/some_id

// Contoh : https://www.kompas.com/sports/read/2021/03/22/09400048/gm-irene-sukandar-vs-dewa-kipas-pembuktian-status-jin-atau-jenius.
// Hasil : 2021/03/22/09400048


// 3. Buatlah function/pseudocode untuk mengubah dari angka ke text.
// Misal 204.780 : dua ratus empat ribu tujuh ratus delapan puluh

// 4. Diberikan bilangan N (1 <= N <= 100), yang mengembalikan array berjumlah N yang "berbeda" dan jika dijumlah hasilnya 0. Buatlah function/pseudocode nya.
// Misal 
// N = 4 => [2,5,1,-8]
// N = 3 => [1,3,-4]
// 5. Jika saya mendapatkan 10%, lalu hilang 10%. Apakah saya untung atau rugi atau tidak keduanya? Jelaskan


// 1. 
$A = 8;
$B = 9;
$A = $A + $B;
$B = $A - $B;
$A = $A - $B;

echo $A;
echo "<br>";
echo $B;
echo "<br>";

// 2. 
$txt = "https://www.kompas.com/sports/read/2021/03/22/09400048/gm-irene-sukandar-vs-dewa-kipas-pembuktian-status-jin-atau-jenius";
echo substr($txt, 35, 19);

// 3.
function terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return terbilang($x / 10) . " puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return "seratus" . terbilang($x - 100);
  elseif ($x < 1000)
    return terbilang($x / 100) . " ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return "seribu" . terbilang($x - 1000);
  elseif ($x < 1000000)
    return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
}

echo terbilang(204.780);

echo "<br>";
// 4. 
function test($n)
{
  $arr = [];
  for ($i = 0; $i < $n; $i++) {
    $arr[$i] = $i;
  }
  $arr[$n] = - array_sum($arr);

  return $arr;
}
// $n = 4;
$result = test(4);
print_r($result);

// 5. Rugi karena ketika mendapatkan 10% dari sebelum dan sesudah mendapatkan keuntungan maka 10% kedua akan lebih besar dari 10% keuntungan sebelumnya
?>

<script>



</script>