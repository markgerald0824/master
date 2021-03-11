<?php
// You can download this file from here https://cdn.dataforseo.com/v3/examples/php/php_RestClient.zip
require('RestClient.php');
$api_url = 'https://api.dataforseo.com/';
// Instead of 'login' and 'password' use your credentials from https://app.dataforseo.com/api-dashboard
$client = new RestClient($api_url, null, 'login', 'password');

$post_array = array();
// simple way to set a task
$post_array[] = array(
	"category_codes" => [
		12191,
		12193
	],
	"language_name" => "English",
	"location_code" => 2840,
	"filters" => [
		["impressions_info.daily_impressions_average", "in", [ 0, 1000 ]],
		"and",
		["impressions_info.ad_position_average", "<", 3]
	]
);
try {
	// POST /v3/dataforseo_labs/keywords_for_categories/live
	$result = $client->post('/v3/dataforseo_labs/keywords_for_categories/live', $post_array);
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
