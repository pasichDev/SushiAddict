<?php
require  __DIR__ . '/../vendor/autoload.php';

// Create a new instance of the autoloader
$autoloader = new \Composer\Autoload\ClassLoader();


// Enable debug mode for the autoloader
$autoloader->register();

// Add a debug function to display the class mapping
function debugAutoloader($autoloader)
{
    $classMap = $autoloader->getClassMap();

    var_dump($classMap);
}

// Call the debug function to display the class mapping
debugAutoloader($autoloader);




// Config for Slim App
$config = require_once __DIR__ . '/../backend/src/config.php';

// Slim App instance
$app = new \Slim\App($config);

// Dependencies 
require_once __DIR__ . '/../backend/src/dependencies.php';

// Routes
require_once __DIR__ . '/../backend/src/route.php';


// Run app
$app->run();
