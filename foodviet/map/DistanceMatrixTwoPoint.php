<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');


if (!empty($_POST['lat1']) || !empty($_POST['lat2'])) {
	$lat = $_POST['lat1'];
	$lng = $_POST['lng1'];
	$lat2 = $_POST['lat2'];
	$lng2 = $_POST['lng2'];
}


$ch = curl_init();
$curlConfig = array(
	CURLOPT_URL=> "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$lat,$lng&destinations=$lat2,$lng2&key=xx",
	CURLOPT_POST           => true,
	CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);

echo ($result);

?>
