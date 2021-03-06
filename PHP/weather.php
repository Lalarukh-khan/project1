<?php

$url = 'http://api.geonames.org/findNearByWeatherJSON?formatted=true&lat=' . $_REQUEST['postlat'] . '&lng=' . $_REQUEST['postlng'] .  '&username=malaika&style=full';

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);

$result=curl_exec($ch);

curl_close($ch);

$decode = json_decode($result,true);

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['data']['Date and Time'] = $decode['weatherObservation']['datetime'];
$output['data']['Clouds'] = $decode['weatherObservation']['clouds'];
$output['data']['Humidity'] = $decode['weatherObservation']['humidity'];
$output['data']['Temperature'] = $decode['weatherObservation']['temperature'];
$output['data']['Wind Speed'] = $decode['weatherObservation']['windSpeed'];

echo json_encode($output);

?>