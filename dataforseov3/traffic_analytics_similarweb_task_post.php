<?php
// You can download this file from here https://cdn.dataforseo.com/v3/examples/php/php_RestClient.zip
require('RestClient.php');
$api_url = 'https://api.dataforseo.com/';
// Instead of 'login' and 'password' use your credentials from https://app.dataforseo.com/api-dashboard
$client = new RestClient($api_url, null, 'login', 'password');

$post_array = array();
// example #1 - a simple way to set a task
$post_array[] = array(
	"target" => "dataforseo.com"
);
// example #2 - a way to set a task with additional parameters
// this way you need to specify a domain of the website in the field "target".
// after a task is completed, we will send a GET request to the address you specify. Instead of $id and $tag, you will receive actual values that are relevant to this task.
$post_array[] = array(
	"target" => "dataforseo.com",
	"tag" => "some_string_123",
	"pingback_url" => 'https://your-server.com/pingscript?id=$id&tag=$tag'
);
try {
	// POST /v3/traffic_analytics/similarweb/task_post
	$result = $client->post('/v3/traffic_analytics/similarweb/task_post', $post_array);
	print_r($result);
	// do something with post result
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
