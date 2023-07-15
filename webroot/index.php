<?php
require  __DIR__ .'/../vendor/autoload.php';

// Config for Slim App
$config = require_once __DIR__ . '/../src_back/config.php';

// Slim App instance
$app = new \Slim\App($config);

// Dependencies 
require_once __DIR__ . '/../src_back/dependencies.php';

// Routes
require_once __DIR__ . '/../src_back/route.php';


// Run app
$app->run();