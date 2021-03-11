<?php
require('RestClient.php');
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip

try {
	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
	$client = new RestClient('https://api.dataforseo.com/', null, 'login', 'password');
} catch (RestClientException $e) {
	echo "\n";
	print "HTTP code: {$e->getHttpCode()}\n";
	print "Error code: {$e->getCode()}\n";
	print "Message: {$e->getMessage()}\n";
	print  $e->getTraceAsString();
	echo "\n";
	exit();
}

$post_array = array();

$my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
$post_array[$my_unq_id] = array(
    "se_name" => "google.co.uk",
    "se_language" => "English",
    "loc_name_canonical"=> "London,England,United Kingdom",
    "key" =>  mb_convert_encoding("online rank checker", "UTF-8")
);

try {
    // POST /v2/live/srp_tasks_post/$data
    // $tasks_data must by array with key 'data'
    $result = $client->post('v2/live/srp_tasks_post', array('data' => $post_array));
    print_r($result);

    //do something with post results

    $post_array = array();
} catch (RestClientException $e) {
    echo "\n";
    print "HTTP code: {$e->getHttpCode()}\n";
    print "Error code: {$e->getCode()}\n";
    print "Message: {$e->getMessage()}\n";
    print  $e->getTraceAsString();
    echo "\n";
}

$client = null;
?>