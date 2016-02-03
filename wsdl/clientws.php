<?php
require_once "ws/lib/nusoap.php";
 
//$client = new nusoap_client("food.wsdl", true);
$client = new nusoap_client("http://test-gecko.alwaysdata.net/food.php?wsdl", true);
$error  = $client->getError();
 
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
 
$resultFood = $client->call("food.getFood", array("type" => "Main"));
$resultDrink = $client->call("food.getDrink", array("type" => "2"));
$resultData = $client->call("food.getData", array("login" => "login1", "password" => "pwd1"));
 
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($resultFood . " - ". $resultDrink . " - ". $resultData);
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Main</h2>";
        echo $resultFood ." - ". $resultDrink . " - ". $resultData;
    }
}

 
// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";