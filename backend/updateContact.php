<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: *");


$ch = curl_init();



$url = "https://evaluation-technique.lundimatin.biz/api/clients/" . $_GET['id'];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_PASSWORD, "20240111-659fa3d6a6395729481792");

$reponse = curl_exec($ch);

if($e = curl_error($ch)){
  echo $e;
} else {
  print_r($reponse);
}



curl_close($ch);