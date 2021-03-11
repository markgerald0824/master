<?php
require('RestClient.php');
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip

$api_url = 'https://api.dataforseo.com/';
try {
	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
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

$post_array = array();

// example #1 - simplest
// you set only a website URL and a search engine URL.
// This search engine URL string will be searched, compared to our internal parameters
// and used as:
// "se_id", "loc_id", "key_id" ( actual and fresh list can be found here: "se_id":
// https://api.dataforseo.com/v2/cmn_se , "loc_id": https://api.dataforseo.com/v2/cmn_locations ) (see example #3 for details)
// If a task was set successfully, this *_id will be returned in results: 'v2/srp_extra_tasks_post' so you can use it.
// The setting of a task can fail, if you set not-existent search engine, for example.
// Disadvantages: You cannot work with "map pack", "maps", "mobile"
$my_unq_id = mt_rand(0, 30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
$post_array[$my_unq_id] = array(
	"priority" => 1,
	"url" => "https://www.google.co.uk/search?q=online%20rank%20checker&hl=en&gl=GB&uule=w+CAIQIFISCXXeIa8LoNhHEZkq1d1aOpZS"
);

// example #2 - will return results faster than #1, but is simpler than example #3
// All parameters should be set in the text format.
// All data will be will be searched, compared to our internal parameters
// and used as:
// "se_id", "loc_id", "key_id" ( actual and
// fresh list can be found here: "se_id": https://api.dataforseo.com/v2/cmn_se ,
// "loc_id": https://api.dataforseo.com/v2/cmn_locations )
// If a task was set successfully, this *_id will be returned in results: 'v2/srp_extra_tasks_post' so you can use it.
// The setting of a task can fail, if you set not-existent search engine, for example.
// Disadvantages: The process of search and comparison of provided data to our internal parameters may take some time.
$my_unq_id = mt_rand(0, 30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
$post_array[$my_unq_id] = array(
	"priority" => 1,
	"se_name" => "google.co.uk",
	"se_language" => "English",
	"loc_name_canonical" => "London,England,United Kingdom",
	"key" => mb_convert_encoding("online rank checker", "UTF-8")
);

// example #3 - the fastest one. All parameters should be set in our internal format.
// Actual and fresh list can be found here: "se_id": https://api.dataforseo.com/v2/cmn_se ,
// "loc_id": https://api.dataforseo.com/v2/cmn_locations
$my_unq_id = mt_rand(0, 30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
$post_array[$my_unq_id] = array(
	"priority" => 1,
	"se_id" => 22,
	"loc_id" => 1006886,
	"key_id" => 1095202
);

// This example has a 3 elements, but in the case of large number of tasks - send up to 100 elements per POST request
if (count($post_array) > 0) {
	try {
		// POST /v2/srp_extra_tasks_post/$tasks_data
		// $tasks_data must by array with key 'data'
		$task_post_result = $client->post('v2/srp_extra_tasks_post', array('data' => $post_array));
		print_r($task_post_result);
		
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
}

$client = null;
?>