<?php

    // numbers arrays
    $numbers = [];

    // Loop while $numbers count is less than 5
    while ( count(  $numbers ) < 5 ) {
        
        // Generate random number between 0 and 1
        $num = rand( 0 * 10, 1 * 10 ) / 10;

        // Check if the $num is in $numbers array
        // If not, push it to $numbers array
        if ( ! in_array( $num, $numbers ) ) {
            // Push generated $num to $numbers array
            array_push($numbers, $num);
        }
    }

    // Display generated numbers
    echo 'Numbers Generated <br>';
    foreach ( $numbers as $key => $number ) {
        echo $key + 1 . '. ' . $number . '<br>';
    }
    echo '<br>';

    foreach ( $numbers as $number ) {
        // Create random number
        $theValue = rand( 10000, 100000 );
        $bottom = 1;
        $pi = 0;
        
        for ( $i = 1; $i < $theValue; $i++ ) {
            if ( $i % 2 == 1 ) {
                $pi += 4 / $bottom;

            } else {
                $pi -= 4 / $bottom;
            }
            
            $bottom += 2;
        }
        echo '<br>---' . $pi . '---';   
    }
    