<?php
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip
require('RestClient.php');

try {

	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
	$client = new RestClient('https://api.dataforseo.com/', null, 'login', 'password');
    $ad_aclk = "DChcSEwjRxPWhsLnjAhUVHisKHc4YABABGgJzZg";
	$ad_url = $client->get('v2/merchant_google_shopping_shops_ad_url/' . $ad_aclk);
	print_r($ad_url);

	//do something with results

} catch (RestClientException $e) {
	echo "\n";
	print "HTTP code: {$e->getHttpCode()}\n";
	print "Error code: {$e->getCode()}\n";
	print "Message: {$e->getMessage()}\n";
	print  $e->getTraceAsString();
	echo "\n";
	exit();
}

$client = null;
?>