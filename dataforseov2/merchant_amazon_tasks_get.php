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
	// #1 - get task_id list of ALL ready results
	//GET /v2/merchant_amazon_tasks_get
	$tasks_get_result = $client->get('v2/merchant_amazon_tasks_get');
	print_r($tasks_get_result);
	if ($tasks_get_result["status"] == "ok") {
		foreach($tasks_get_result["results"] as $tasks_get_row) {
			// #2 - get result by task_id
			//GET /v2/merchant_amazon_tasks_get/$task_id
			$result = $client->get('v2/merchant_amazon_tasks_get/'.$tasks_get_row["task_id"]);
			print_r($result);

			//do something with results
		}
	}
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