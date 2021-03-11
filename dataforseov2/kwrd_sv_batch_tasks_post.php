<?php
require('RestClient.php');
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip
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

$post_array = array();
$post_array["your post_id parameter here"] = array(
	"language" => "en",
	"loc_name_canonical" => "United States",
	"keys" => array(
		"repeat customers",
		"best sleeping wireless earbuds",
		"staniel cay day trip",
		"iota hoodie",
		"monero hat"
	),
	"pingback_url" => 'https://your-server.com/your_pingback_url.php?task_id=$task_id&post_id=$post_id'
);

if (count($post_array) > 0) {
	try {
		$task_post_result = $client->post('/v2/kwrd_sv_batch_tasks_post', array('data' => $post_array));
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