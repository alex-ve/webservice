<?php
require_once "ws/lib/nusoap.php";

//$client = new nusoap_client("food.wsdl", true);
$client = new nusoap_client("http://test-gecko.alwaysdata.net/api/wsdl/food.php?wsdl", true);
$error  = $client->getError();
 
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
 
$arr['login'] = "GoPro";
$arr['password'] = "245"; 
 
$resultFood = $client->call("food.getFood", array("type" => "Main"));
$resultDrink = $client->call("food.getDrink", array("type" => 2));
$resultData = $client->call("food.getData", array("type" => "string"));
$sendArray = $client->call("food.setData", array($arr));
 
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($resultFood . " - ". $resultDrink. " - " .$resultData['password'] . " - " . $sendArray );
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Main</h2>";
        echo "method: food.getFood - input:string => Main | return output: string => ".$resultFood 
		 ."<br/>method: food.getDrink - input:integer => 2 | return output: string => ".$resultDrink  
		 ."<br/>method: food.getData - input:string => Main | return output: array [password] => ".$resultData['password'] 
		 ."<br/>method: food.setData - input:array => Main | return output: string => ".$sendArray ;
    }
}

 
// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
