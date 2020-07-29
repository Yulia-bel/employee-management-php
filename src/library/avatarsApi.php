<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://uifaces.co/api?limit=5&emotion[]=happiness",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: A3095975-FD6D4674-AC08E354-A7AC3961'
  ),
));
$response = curl_exec($curl);
echo $response;

curl_close($curl);