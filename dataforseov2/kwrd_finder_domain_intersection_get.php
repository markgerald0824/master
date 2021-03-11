<?php
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip
require('RestClient.php');

try {
	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
	$client = new RestClient('https://api.dataforseo.com/', null, 'login', 'password');
   
	$post_array = array();
	$my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
	
	$post_array[$my_unq_id] = array(
        "country_code" => "US",
        "language" => "en",
        "domain1" => "similarweb.com",
        "domain2" => "dataforseo.com",
        "limit" => 3,
        "filters" => array(
            array("domain_1_pos", "<", 10), 
            "and",
            array("relative_url_2", "like", "/pricing%")
        )		
	);

	$get_result = $client->post("v2/kwrd_finder_domain_intersection_get", array('data' => $post_array));
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