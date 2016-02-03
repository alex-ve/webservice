<?php
require_once "ws/lib/nusoap.php";
  
class food {
 
    public function getFood($type) {
        switch ($type) {
            case 'starter':
                return 'Soup';
                break;
            case 'Main':
                return 'Curry';
                break;
            case 'Desert':
                return 'Ice Cream';
                break;
            default:
                break;
        }
    }
	
	public function getDrink($type) {
        switch ($type) {
            case 1:
                return 'Coke'. $type;
                break;
            case 2:
                return 'Tea' . $type;
                break;
            case 3:
                return 'Water'. $type;
                break;
            default:
                break;
        }
    }
	
	public function getData($type) {
		return Array('login' => 'cipollino','password' => 'oioi');
		//return array('login' => 'cipollino','password' => 'oioi');
    }	

	public function setData($type) {
		return 'ciao: '.$type['login'] ;
		//return array('login' => 'cipollino','password' => 'oioi');
    }
}
 
$server = new soap_server();

$server->configureWSDL("foodservice", "http://test-gecko.alwaysdata.net/foodservice");
    
$server->wsdl->addComplexType(
    'testArray', // the type's name
    'complexType',
    'struct',
    'all',
    '',
    array(
        'login' => array('name'=>'login','type'=>'xsd:string'),
        'password' => array('name'=>'password','type'=>'xsd:string'),
    )
);

$server->register("food.getFood",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://test-gecko.alwaysdata.net/foodservice",
    "http://test-gecko.alwaysdata.net/foodservice#getFood",
    "rpc",
    "encoded",
    "Get food by string");
	
$server->register("food.getDrink",
    array("type" => "xsd:integer"),
    array("return" => "xsd:string"),
    "http://test-gecko.alwaysdata.net/foodservice",
    "http://test-gecko.alwaysdata.net/foodservice#getDrink",
    "rpc",
    "encoded",
    "Get drink by Integer");	
 
 $server->register("food.getData",
    array("type" => "xsd:string"),
    array("return" => "tns:testArray"),
    "http://test-gecko.alwaysdata.net/foodservice",
    "http://test-gecko.alwaysdata.net/foodservice#getData");	
 
 $server->register("food.setData",
    array("type" => "tns:testArray"),
    array("return" => "xsd:string"),
    "http://test-gecko.alwaysdata.net/foodservice",
    "http://test-gecko.alwaysdata.net/foodservice#setData",
	"rpc",
    "encoded",
	"set Data");	

$server->service($HTTP_RAW_POST_DATA);
