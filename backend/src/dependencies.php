<?php

$container = $app->getContainer();

$container['notAllowedHandler'] = function ($container) {
    return function ($request, $response) use ($container) {

        return $response->withHeader('Location', '/')->withStatus(302);
    };
};


$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {

        return $response->withHeader('Location', '/')->withStatus(302);
    };
};


$container['POST'] = function ($container) {
    return $container->request->getParsedBody();
};

$container['db'] = function ($container) {
    $settings = $container->get('settings')['db'];
    $host = $settings['Host'];
    $database = $settings['Database'];
    $username = $settings['Username'];
    $password = $settings['Password'];

    $Base = "mysql:host=$host;dbname=$database";
    try {
        return new PDO($Base, $username, $password);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
};



/**
 * Request settings faucet from the database
 */
$container['AppSettings'] = function ($container) {
    $Set = $container->get('db')->prepare("SELECT * FROM `settings`");
    $Set->execute();

    return $Set->fetch(\PDO::FETCH_ASSOC);
};


/*
$container['AuthController'] = function ($container) {
    return new \App\Controllers\ApiFrontend($container);
};
*/

$container['ApiFrontend'] = function ($container) {
    return new \App\Controller\ApiFrontend($container);
};
