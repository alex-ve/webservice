<?php
//$data = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
//$data = array( 'sites' => array ( 'sitename' => 'JQUERY4U', 'domainName' => 'http://www.jquery4u.com', 'description' => '#1 jQuery Blog for your Daily News, Plugins, Tuts/Tips & Code Snippets.'));
//$json = json_encode($data);  
//echo $json;
 /*jsonCallback(
	{
		"sites":
		[
			{
				"siteName": "JQUERY4U",
				"domainName": "http://www.jquery4u.com",
				"description": "#1 jQuery Blog for your Daily News, Plugins, Tuts/Tips & Code Snippets."
			},
			{
				"siteName": "BLOGOOLA",
				"domainName": "http://www.blogoola.com",
				"description": "Expose your blog to millions and increase your audience."
			},
			{
				"siteName": "PHPSCRIPTS4U",
				"domainName": "http://www.phpscripts4u.com",
				"description": "The Blog of Enthusiastic PHP Scripters"
			}
		]
	}
);
*/
?>


<?php header('content-type: application/json; charset=utf-8');

$data = array(11, 21, 31, 41, 51, 6, 7, 8, 9);

echo $_GET['callback'] . '('.json_encode($data).')';