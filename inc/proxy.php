<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$url = "https://teamtreehouse.com/kieronoates2.json";
$json = file_get_contents($url);

echo $json;
?>
