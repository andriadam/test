<?php

// Ada 2 array of integer yang memiliki panjang yang berbeda, dan tidak berurutan.
// Buatkan program yang dapat menampilkan elemen yang sama dari dua array tersebut.
// Input :
// array_1 = [1, 2, 3, 4, 10, 4]
// array_2 = [3, 15, 5, 6, 8, 9, 11, 12, 13 ,4, 4]
// Output :
// [3 , 4]

// Input arrays
$array_1 = [1, 2, 3, 4, 10, 4];
$array_2 = [3, 15, 5, 6, 8, 9, 11, 12, 13, 4, 4];

// Inisialisasi array untuk menyimpan elemen yang sama
$common_elements = [];

// Loop melalui elemen-elemen array_1
foreach ($array_1 as $elem) {
    // Jika elemen ada di array_2 dan belum ada di common_elements, tambahkan ke common_elements
    if (in_array($elem, $array_2) && !in_array($elem, $common_elements)) {
        $common_elements[] = $elem;
    }
}

// Menampilkan elemen yang sama
echo ("Soal 1:");
echo "</br>";

echo '<pre>';
var_dump($common_elements);


echo "</br>";
echo "</br>";

// Tampilkan output angka dari 1 sampai dengan “n” tanpa menggunakan function looping
// seperti for, while, do while dsb.
// Input :
// Integer of n -> 10
// Output :
// 1 2 3 4 5 6 7 8 9 10
function printNumbers($n)
{
    if ($n > 0) {
        printNumbers($n - 1);
        echo $n . " ";
    }
}

$n = 10;
echo ("Soal 2:");
echo "</br>";
$n = 10;
echo printNumbers($n);


echo "</br>";
echo "</br>";


// Buatkan sebuah class Store dengan attribute/property sebagai berikut:
// String name
// String area
// Buatkan beberapa instance dari class Store diatas dengan masing2 area memiliki
// beberapa store. Lalu olah dan tampilkan data store diatas menjadi collections seperti
// gambar dibawah.
// Contoh Output :
// {
// 	"total_stores" : 3,
// 	"areas" :{
// 		"jakarta" : {
// 			"total_stores":2
// 			"stores" : ["Store 1", "Store 2"]
// 		},
// 		"bandung" : {
// 			"total_stores":1
// 			"stores" : ["Store 3"]
// 		},
// 	}
// }

class Store
{
    public $name;
    public $area;

    public function __construct($name, $area)
    {
        $this->name = $name;
        $this->area = $area;
    }
}

// Membuat beberapa instance dari class Store
$store1 = new Store("Store 1", "jakarta");
$store2 = new Store("Store 2", "jakarta");
$store3 = new Store("Store 3", "bandung");

$store_data = [];
foreach ([$store1, $store2, $store3] as $store) {
    $store_data[$store->area]["total_stores"] = ($store_data[$store->area]["total_stores"] ?? 0) + 1;
    $store_data[$store->area]["stores"][] = $store->name;
}

$total_stores = array_sum(array_column($store_data, "total_stores"));

$output = [
    "total_stores" => $total_stores,
    "areas" => $store_data,
];

echo ("Soal 3:");
echo "</br>";
echo '<pre>';
var_dump($output);
die;
