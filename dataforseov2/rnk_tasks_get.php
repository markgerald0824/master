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

/*
#1 - get ALL ready results
recommended use of getting results:
run this script by cron with 10-60 streams, every minute with random delay 0-30 sec.
usleep(mt_rand(0,30000000));
*/
try {
	//GET /v2/rnk_tasks_get
	$task_get_result = $client->get('v2/rnk_tasks_get');
	print_r($task_get_result);

	//do something with results

} catch (RestClientException $e) {
	echo "\n";
	print "HTTP code: {$e->getHttpCode()}\n";
	print "Error code: {$e->getCode()}\n";
	print "Message: {$e->getMessage()}\n";
	print  $e->getTraceAsString();
	echo "\n";
}


/*
#2 - get one result by task_id
*/
try {

	// GET /api/v1/tasks_get/$task_id
	$task_get_result = $client->get('v2/rnk_tasks_get/123456789');
	print_r($task_get_result);

	//do something with result

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