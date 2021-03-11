<?php

    $slugs = [ 1, 2, 3, 4, 5, 6 ];

    foreach ($slugs as $slug) {
        if ( $slug == 1) {
            echo $slug;
            break;
        }
    }