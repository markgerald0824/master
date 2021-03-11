<?php
require('RestClient.php');
//You can download this file from here https://api.dataforseo.com/_examples/php/_php_RestClient.zip

try {

	//Instead of 'login' and 'password' use your credentials from https://my.dataforseo.com/login
	$client = new RestClient('https://api.dataforseo.com/', null, 'login', 'password');

	$post_array[] = array(
		"loc_name_canonical"=> "United States",
		"keys" => array(
			"average page rpm adsense",
			"adsense blank ads how long",
			"leads and prospects"
		)
	);


	$sv_post_result = $client->post('v2/kwrd_sv_batch_clickstream', array('data' => $post_array));
	print_r($sv_post_result);

	//do something with results

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