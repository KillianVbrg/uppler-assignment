<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");


$ch = curl_init();

$preparedUrl = (isset($_GET['nom']) ? ",nom" : "") . (isset($_GET['email']) ? ",email" : "") . (isset($_GET['tel']) ? ",tel" : "") . (isset($_GET['adresse']) ? ",adresse" : "") . (isset($_GET['ville']) ? ",ville" : "") . (isset($_GET['code_postal']) ? ",code_postal" : "");
if(substr($preparedUrl, 0, 1) == ',') {
  $preparedUrl = substr($preparedUrl, 1);
}

$url = "https://evaluation-technique.lundimatin.biz/api/clients?sort=id&fields=" . $preparedUrl;

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