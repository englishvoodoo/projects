<?php
$topic = $_GET['topic'];


//$service_url = 'http://api.bbcnews.appengine.co.uk/topics';
$service_url = 'http://api.bbcnews.appengine.co.uk/stories/'.$topic;
$curl = curl_init($service_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$curl_response = curl_exec($curl);

if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);

//var_dump($curl_response);exit();

echo $curl_response;
exit();

$decoded = json_decode($curl_response);

var_dump($decoded);

exit();
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}


var_dump($decoded->response);