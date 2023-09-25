<?php

$url = "https://api.openweathermap.org/data/2.5/forecast?q=Jakarta&units=metric&appid=5729362662542593672a76b937c7a37f";

$response = file_get_contents($url);

if ($response === false) {
    echo "Error saat melakukan panggilan API";
    return;
}
$weatherData = json_decode($response);

$averageTemperatures = [];

foreach ($weatherData->list as $data) {
    $dt = DateTime::createFromFormat("Y-m-d H:i:s", $data->dt_txt);

    $date = $dt->format("D, d M Y");

    if (!isset($averageTemperatures[$date])) {
        $averageTemperatures[$date] = 0;
    }

    $averageTemperatures[$date] += $data->main->temp;
}

// Hitung suhu rata-rata per tanggal
foreach ($averageTemperatures as $date => &$temperature) {
    $count = count($weatherData->list) / 8; // Ada 8 data suhu per hari
    $temperature /= $count;
}

echo "Weather Forecast:";
echo "<br>";
foreach ($averageTemperatures as $date => $temperature) {
    echo ("{$date}: {$temperature}°C");
    echo "<br>";
}
