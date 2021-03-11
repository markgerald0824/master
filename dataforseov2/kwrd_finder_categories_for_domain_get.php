<?php
require('RestClient.php');
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip

try {
	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
	$client = new RestClient('https://api.dataforseo.com/', null, 'login', 'password');
   
	$post_array = array();	
    $my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
    
	$post_array[$my_unq_id] = array(
		"domain" => "hide.co.uk",
		"country_code" => "GB",
		"language" => "en",
		"limit" => 10,
		"orderby" => "organic_count,desc"
	);
	
	$get_result = $client->post("v2/kwrd_finder_domain_categories_get", array('data' => $post_array));
	print_r($get_result);

	//do something with result

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