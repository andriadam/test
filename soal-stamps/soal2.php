<?php

$url = "https://api.openweathermap.org/data/2.5/forecast?q=Jakarta&units=metric&appid=5729362662542593672a76b937c7a37f";

$response = file_get_contents($url);

if ($response === false) {
    echo "Error saat melakukan panggilan API";
    return;
}
$weatherData = json_decode($response);

$averageTemperatures = [];

// foreach ($weatherData->list as $data) {
//     $dt = DateTime::createFromFormat("Y-m-d H:i:s", $data->dt_txt);

//     $date = $dt->format("D, d M Y");

//     if (!isset($averageTemperatures[$date])) {
//         $averageTemperatures[$date] = 0;
//     }

//     $averageTemperatures[$date] += $data->main->temp;
// }

// // Hitung suhu rata-rata per tanggal
// foreach ($averageTemperatures as $date => &$temperature) {
//     $count = count($weatherData->list) / 8; // Ada 8 data suhu per hari
//     $temperature /= $count;
// }

// echo "Weather Forecast:";
// echo "<br>";
// foreach ($averageTemperatures as $date => $temperature) {
//     echo ("{$date}: {$temperature}°C");
//     echo "<br>";
// }


$currentDate = null;
$currentTemperatureSum = 0;
$currentTemperatureCount = 0;

foreach ($weatherData->list as $data) {
    $dt = DateTime::createFromFormat("Y-m-d H:i:s", $data->dt_txt);
    $date = $dt->format("D, d M Y");

    // Cek apakah tanggal berbeda
    if ($date !== $currentDate) {
        // Jika tanggal berbeda, hitung rata-rata suhu untuk hari sebelumnya
        if ($currentDate !== null) {
            $averageTemperature = $currentTemperatureSum / $currentTemperatureCount;
            $averageTemperatures[$currentDate] = $averageTemperature;
        }

        // Reset variabel untuk tanggal baru
        $currentDate = $date;
        $currentTemperatureSum = 0;
        $currentTemperatureCount = 0;
    }

    // Tambahkan suhu saat ini ke total suhu hari ini
    $currentTemperatureSum += $data->main->temp;
    $currentTemperatureCount++;

    // Jika data ini adalah salah satu data suhu hari berikutnya, tambahkan ke rata-rata
    if ($currentTemperatureCount > count($weatherData->list) / 8) {
        $averageTemperature = $data->main->temp;
        $averageTemperatures[$date] = $averageTemperature;
    }
}

echo "Weather Forecast:";
echo "<br>";
foreach ($averageTemperatures as $date => $temperature) {
    echo ("{$date}: {$temperature}°C");
    echo "<br>";
}
