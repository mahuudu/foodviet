<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Access-Control-Allow-Credentials: true');


if (!empty($_POST['address'])) {
	$address = $_POST['address'];

}else if(!empty($_GET['address'])){
	$address = $_GET['address'];

}else{
	$address = 0;
}

$text_replace = preg_replace('/\s+/', '+', $address);


// $lat = 20.971619783956154;
// $lng = 105.86195915606768;

$ch = curl_init();
$curlConfig = array(
	CURLOPT_URL=> "https://maps.googleapis.com/maps/api/geocode/json?address=$text_replace&key=xx",
	CURLOPT_POST           => true,
	CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);

echo ($result);

?>
