<?php

function __autoload($_class) {
    $class = realpath(__DIR__ . '/' . str_replace('\\', '/', $_class) . '.php');
    if ($class) {
        require_once $class;
    } else {
        error_log("Class $_class");
    }
}

?>