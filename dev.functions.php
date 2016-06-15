<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function debug($var)
{
    print_r('<pre>');
    print_r($var);
    print_r('</pre>');
}

function json($var)
{
    echo json_encode($var);
}
