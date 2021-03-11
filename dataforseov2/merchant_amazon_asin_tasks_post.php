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

try {
    // POST /v2/merchant_amazon_asin_tasks_post/$data
    $my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
    $post_array = array();
    $post_array[$my_unq_id] = array(
    "priority" => 1,
    "se_id" => 2897,
    "product_id" => "B07F9M8CG3"
    );
    $task_post_result = $client->post('v2/merchant_amazon_asin_tasks_post', array('data' => $post_array));
    print_r($task_post_result);

    //do something with post results

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