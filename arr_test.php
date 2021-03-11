<?php

	$data = array();
	$emails = array();

	$result = [
		[ 'pos_email' => 'hehe', 'update_at' => '1212' ],
		[ 'pos_email' => 'haha', 'update_at' => '232' ],
		[ 'pos_email' => 'ggege', 'update_at' => '44' ],
		[ 'pos_email' => 'bbbb', 'update_at' => '121' ],
		[ 'pos_email' => 'fff', 'update_at' => '55' ],
		[ 'pos_email' => 'hhhhh', 'update_at' => '1214' ]
	];

	foreach( $result as $res ) {
		if ( ! in_array( $res['pos_email'], $emails ) ) {
			array_push( $data, [ 'pos_email' => $res['pos_email'], 'update_at' => $res['update_at'] ] );
		}
	}

	print_r( $data, true );