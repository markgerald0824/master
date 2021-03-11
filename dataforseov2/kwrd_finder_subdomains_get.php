<?php
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip
require('RestClient.php');

$api_url = 'https://api.dataforseo.com/';
try {
	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/
	$client = new RestClient($api_url, null, 'login', 'password');
} catch (RestClientException $e) {
	echo "\n";
	print "HTTP code: {$e->getHttpCode()}\n";
	print "Error code: {$e->getCode()}\n";
	print "Message: {$e->getMessage()}\n";
	print  $e->getTraceAsString();
	echo "\n";
	exit();
}

try {
    $post_array = array();    
    $my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
	
	$post_array[$my_unq_id] = array(
		"domain" => "dataforseo.com",
		"country_code" => "US",
		"language" => "en",
		"limit" => 3
	);
	
	$get_result = $client->post("v2/kwrd_finder_subdomains_get", array('data' => $post_array));
	print_r($get_result);
	
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