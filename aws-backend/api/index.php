<?php

if( !session_id() ) session_start();


try {
    require_once '../app/init.php';
    $app = new App;
} catch (Exception $e) {
    echo "Error 404 <br>" . $e;
}