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

//for example, some data selection cycle for tasks
for ($i = 0; $i < 3; $i++) {
	
	// example #1 - simplest
	// you set only a website URL and a search engine URL.
	// This search engine URL string will be searched, compared to our internal parameters
	// and used as:
	// "se_id", "key_id" ( actual and fresh list can be found here: "se_id":
	// https://api.dataforseo.com/v2/cmn_se) (see example #3 for details)
	// If a task was set successfully, this *_id will be returned in results: 'v2/merchant_amazon_html_tasks_post' so you can use it.
	// The setting of a task can fail, if you set not-existent search engine, for example.
	$my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
	$post_array[$my_unq_id] = array(
	"priority" => 1,
	"url" => "https://www.amazon.com/s/?field-keywords=shoes&language=en_US"
	);

	// example #2 - will return results faster than #1, but is simpler than example #3
	// All parameters should be set in the text format.
	// All data will be will be searched, compared to our internal parameters
	// and used as:
	// "se_id", "key_id" ( actual and
	// fresh list can be found here: "se_id": https://api.dataforseo.com/v2/cmn_se 
	// You must choose a search engine with the word "amazon" included into the "se_name" field
	// If a task was set successfully, this *_id will be returned in results: 'v2/merchant_amazon_html_tasks_post' so you can use it.
	// The setting of a task can fail, if you set not-existent search engine, for example.
	// Disadvantages: The process of search and comparison of provided data to our internal parameters may take some time.
	$my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
	$post_array[$my_unq_id] = array(
	"priority" => 1,
	"se_name" => "amazon.com",
	"se_language" => "English",
	"key" =>  mb_convert_encoding("shoes", "UTF-8")
	);

	// example #3 - the fastest one. All parameters should be set in our internal format.
	// Actual and fresh list can be found here: "se_id": https://api.dataforseo.com/v2/cmn_se ,
	// You must choose a search engine with the word "amazon" included into the "se_name" field
	$my_unq_id = mt_rand(0,30000000); //your unique ID. we will return it with all results. you can set your database ID, string, etc.
	$post_array[$my_unq_id] = array(
	"priority" => 1,
	"se_id" => 2897,
	"key_id" => 68415
	);

	//This example has a cycle of up to 3 elements, but in the case of large number of tasks - send up to 100 elements per POST request
	if (count($post_array) > 99) {
		try {
			// POST /v2/merchant_amazon_tasks_post/$data
			// $tasks_data must by array with key 'data'
			$task_post_result = $client->post('v2/merchant_amazon_html_tasks_post', array('data' => $post_array));
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
}

if (count($post_array) > 0) {
	try {
		// POST /v2/merchant_amazon_html_tasks_post/$data
		// $tasks_data must by array with key 'data'
		$task_post_result = $client->post('v2/merchant_amazon_html_tasks_post', array('data' => $post_array));
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
}
$client = null;
?>